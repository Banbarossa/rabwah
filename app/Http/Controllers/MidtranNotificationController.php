<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\MidtranNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtranNotificationController extends Controller
{
    public function handleNotification(Request $request)
    {

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');


        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $time =$notif->transaction_time;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $serverKey = Config::$serverKey;
        $calculatedSignature = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($calculatedSignature !== $request->signature_key) {
            Log::warning('Invalid signature key for order_id: ' . $request->order_id);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $order = Donation::where('order_id', $order_id)->first();
        if (!$order) {
            Log::warning('Order not found for order_id: ' . $order_id);
            return response()->json(['message' => 'Order not found'], 404);
        }

        try {
            $order->update([
                'payment_method'=>$type,
                'paid_at'=>$time,
//            'midtrans_response'=>$request->all();
            ]);

            switch ($transaction) {
                case 'capture':
                    if ($type == 'credit_card') {
                        if ($fraud == 'challenge') {
                            $order->update(['status' => 'challenge']);
                        } else {
                            $order->update(['status' => 'success']);
                        }
                    }
                    break;

                case 'settlement':
                    $order->update(['status' => 'settlement']);
                    break;

                case 'pending':
                    $order->update(['status' => 'pending']);
                    break;

                case 'deny':
                    $order->update(['status' => 'denied']);
                    break;

                case 'expire':
                    $order->update(['status' => 'expired']);
                    break;

                case 'cancel':
                    $order->update(['status' => 'canceled']);
                    break;

                default:
                    $order->update(['status' => 'unknown']);
                    break;
            }


            MidtranNotification::create([
                'donation_id' => $order->id,
                'transaction_status' => $transaction,
                'fraud_status'=>$fraud,
                'payload' => $request->all(),
            ]);
            Log::info('Midtrans notification received for order_id: ' . $order->id);
        }catch (\Exception $exception){
            Log::warning('Satus Pembayaran gagal diupdate oleh midtran pada order_id: ' . $order_id.'karena '.$exception->getMessage());
        }


    }
}
