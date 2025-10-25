<?php

namespace App\Http\Controllers;

use App\Models\Donation;
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

        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $order = Donation::where('order_id', $order_id)->first();
        if (!$order) {
            Log::warning('Order not found for order_id: ' . $order_id);
            return response()->json(['message' => 'Order not found'], 404);
        }
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

    }
}
