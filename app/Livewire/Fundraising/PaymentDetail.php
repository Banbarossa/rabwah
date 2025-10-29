<?php

namespace App\Livewire\Fundraising;

use App\Models\Donation;
use App\Models\Donor;
use App\Services\MidtranService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Livewire;

class PaymentDetail extends Component
{
    #[Layout('layouts.app')]
    #[Title('Pesantren Ar-Rabwah - Tahfidz & Bahasa Arab')]
    public $program;
    public $slug;

    public $name;
    public $email;
    public $phone;
    public $address;
    public $hidden_name = false;
    public $amount;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->detail($slug);
    }

    public function render()
    {
        return view('livewire.fundraising.payment-detail');
    }

    public function amountSelected($amount){
        $this->amount = $amount;
    }

    public function detail($slug){
        $program =\App\Models\Program::with('category')->withCount(['donations as total_donors' => function ($query) {
            $query->whereIn('status', ['settlement', 'success']);
        }])->
        withSum(['donations as total_received'=>function ($query) {
            $query->whereIn('status', ['settlement', 'success']);
        }],'amount')->where('slug',$slug)->firstOrFail();

        if ($program->category?->slug == 'prioritas') {
            $program = \App\Models\Program::with('category')->withCount([
                'donations as total_donors' => function ($query) {
                    $query->whereIn('status', ['settlement', 'success'])
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year);
                }
            ])
                ->withSum([
                    'donations as total_received' => function ($query) {
                        $query->whereIn('status', ['settlement', 'success'])
                            ->whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year);
                    }
                ], 'amount')
                ->where('slug', $slug)
                ->firstOrFail();
        }


        $received = $program->total_received ?? 0;
        $target = $program->target_amount == 0 ? 1 : $program->target_amount;


        $percentage = ($target > 0) ? min(($received / $target) * 100, 100) : 0;
        $data = [
            'id' => $program->id,
            'slug' => $program->slug,
            'total_received' => $program->total_received,
            'total_donors' => $program->total_donors,
            'target' => $program->target_amount,
            'percentage' => $percentage,
            'title' => $program->title,
            'thumbnail' => $program->thumbnail,
            'content' => $program->content,
            'excerpt' => $program->excerpt,
        ];


        $this->program = $data;
    }

    public function generateSnapToken(){

        $this->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'amount' => ['required', 'regex:/^[0-9.]+$/'],
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.email' => 'Format email salah',
            'amount.required' => 'Jumlah tidak boleh kosong',
            'amount.regex'=>'Tidak menerima selain angka dan desimal',
            'amount.min' => 'Jumlah tidak boleh kurang dari 10000',
        ]);

        $sanitize = str_replace('.','',$this->amount);
        $amount = (int) $sanitize;
        if ($amount < 5000) {
            $this->addError('amount', 'Jumlah Minimal Rp 5.000');
            return;
        }
        $midtrans = new MidtranService();

        $order_id= $this->program['id'] . '-donation-' . Str::orderedUuid();


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
                'program_id' => $this->program['id'],
                'donor_id' => $donor->id,
                'order_id' => $order_id,
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
