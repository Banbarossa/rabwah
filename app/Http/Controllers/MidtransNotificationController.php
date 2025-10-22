<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransNotificationController extends Controller
{
    public function handle(Request $request)
    {
        // Set konfiguras Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');

        try {
            $notification = new Notification();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        $donation = Donation::where('order_id', $orderId)->first();

        if (!$donation) {
            return response()->json(['message' => 'Donation not found.'], 404);
        }

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'challenge'
                    $donation->setStatus('challenge');
                } else {
                    // TODO set payment status in merchant's database to 'success'
                    $donation->update(['status' => 'success']);
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'success'
            $donation->update(['status' => 'success']);
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'pending'
            $donation->update(['status' => 'pending']);
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'denied'
            $donation->update(['status' => 'denied']);
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $donation->update(['status' => 'expire']);
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'cancelled'
            $donation->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'Notification handled successfully.']);
    }
}