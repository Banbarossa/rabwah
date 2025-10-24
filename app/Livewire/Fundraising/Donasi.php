<?php

namespace App\Livewire\Fundraising;

use App\Services\MidtranService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Donasi extends Component
{
    public $orderId;
    public $amount;
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public function mount()
    {
        $this->orderId = 'ORDER-' . uniqid();
        $this->amount = 50000;
    }

    public function render()
    {
        return view('livewire.fundraising.donasi');
    }
    public function pay()
    {
        $midtrans = new MidtranService();

        $params = [
            'transaction_details' => [
                'order_id' => $this->orderId,
                'gross_amount' => $this->amount,
            ],
            'customer_details' => [
                'first_name' => 'Ahmad',
                'email' => 'ahmad@example.com',
                'phone' => '08123456789',
            ],
        ];

        $snap = $midtrans->createTransaction($params);

        $this->dispatch('midtrans-payment', token: $snap->token);
    }
}
