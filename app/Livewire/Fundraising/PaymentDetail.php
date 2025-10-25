<?php

namespace App\Livewire\Fundraising;

use App\Models\Donation;
use App\Models\Donor;
use App\Services\MidtranService;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Livewire;
use Psy\Util\Str;

class PaymentDetail extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $program;

    public $name;
    public $email;
    public $phone;
    public $address;
    public $hidden_name = false;
    public $amount;

    public function mount($slug)
    {
        $this->program =\App\Models\Program::where('slug',$slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.fundraising.payment-detail');
    }

    public function amountSelected($amount){
        $this->amount = $amount;
    }

    public function generateSnapToken(){
        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'amount' => 'required|numeric|min:10000',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.email' => 'Format email salah',
            'amount.required' => 'Jumlah tidak boleh kosong',
            'amount.min' => 'Jumlah tidak boleh kurang dari 10000',
        ]);
        $midtrans = new MidtranService();
        $order_id= $this->program->id . '-donation-' . Str::orderedUuid();


        try {
            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $this->amount,
                ],
                'customer_details' => [
                    'first_name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                ],
            ];

            $snap = $midtrans->createTransaction($params);
            $donor = Donor::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'hidden_name'=>$this->hidden_name,
            ]);
            Donation::create([
                'program_id' => $this->program->id,
                'donor_id' => $donor->id,
                'amount' => $this->amount,
                'status' => 'Pending',
                'snap_token' => $snap->token,
                'payment_via'=>'midtrans'
            ]);


            $this->dispatch('midtrans-payment', token: $snap->token);
        }catch (\Exception $e){
            \Log::error('Gagal membuat transaksi Midtrans: ' . $e->getMessage());
            LivewireAlert::title('Gagal')
                ->text('Gagal memproses pembayaran. Silakan coba lagi.')
                ->position(Position::Center)
                ->error()
                ->show();

        }

    }

}
