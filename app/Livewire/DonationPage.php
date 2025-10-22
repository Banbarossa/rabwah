<?php

namespace App\Livewire;

use App\Models\Donation;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Midtrans\Config;
use Midtrans\Snap;

#[Layout('layouts.app')]
#[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
class DonationPage extends Component
{
    public $donor_name;
    public $donor_email;
    public $donation_type = 'scholarship';
    public $amount;

    protected $rules = [
        'donor_name' => 'required|string|max:255',
        'donor_email' => 'required|email|max:255',
        'donation_type' => 'required|in:scholarship,operational',
        'amount' => 'required|numeric|min:10000',
    ];

    public function mount()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function processDonation()
    {
        $this->validate();

        $orderId = 'DONATION-' . strtoupper(Str::random(10));

        $donation = Donation::create([
            'order_id' => $orderId,
            'donor_name' => $this->donor_name,
            'donor_email' => $this->donor_email,
            'donation_type' => $this->donation_type,
            'amount' => $this->amount,
            'status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $this->amount,
            ],
            'customer_details' => [
                'first_name' => $this->donor_name,
                'email' => $this->donor_email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $donation->update(['snap_token' => $snapToken]);

            $this->dispatch('snap-pay', $snapToken);

        } catch (\Exception $e) {
            dd($e->getMessage());
            // Handle exception, maybe show an error message
            session()->flash('error', 'Terjadi kesalahan saat memproses donasi. Silakan coba lagi.');
        }
    }


    public function render()
    {
        return view('livewire.donation-page');
    }
}
