<div class="bg-gradient-to-b from-white to-brand-cream">
    <div class=" mx-auto w-full [:where(&)]:max-w-2xl p-4 ">
        <div class="mb-10 mt-4">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="/">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{route('donasi')}}">Donasi</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Detail</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <div>
            <div>
                <div class="mb-6">
                    <img src="{{$program->thumbnail}}" alt="{{$program->slug}}"
                         class="w-full h-auto object-cover rounded-lg shadow-md">
                </div>
            </div>

            <div >
                <div class="sticky top-24 bg-white p-6 rounded-lg shadow-lg border">
                    <div class="mb-6 ">
                        <h1 class="text-2xl md:text-2xl font-semibold text-neutral-800 ">
                            {{$program->title}}
                        </h1>
                        <flux:separator class="mb-4"/>
                        <div class="mb-10">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-semibold text-gray-700">Terkumpul</span>
                                <span class="text-lg font-bold text-brand-green">Rp 75.000.000</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="bg-brand-gold h-4 rounded-full" style="width: 75%;"></div>
                            </div>
                            <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                                <span>Target: {{$program->target_amount > 0 ? format_rupiah($program->target_amount) :'-'}}</span>
                            </div>
                        </div>

                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pilih Nominal Donasi</h3>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <button wire:click="amountSelected(50000)"
                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">
                            Rp 50.000
                        </button>
                        <button wire:click="amountSelected(100000)"
                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">
                            Rp 100.000
                        </button>
                        <button wire:click="amountSelected(250000)"
                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">
                            Rp 250.000
                        </button>
                        <button wire:click="amountSelected(500000)"
                            class="border border-gray-300 hover:bg-blue-50 text-gray-700 font-semibold py-3 px-2 rounded-lg text-sm">
                            Rp 500.000
                        </button>
                    </div>

                    <div class="mb-4">
                        <flux:input type="text" name="amount" wire:model="amount" placeholder="Nominal Lainnya" label="Nominal Lainnya"/>
                    </div>

                    <hr class="my-6">

                    <h3 class="text-xl font-bold text-gray-800 mb-4">Data Diri</h3>
                    <div class="space-y-4">
                        <flux:input type="text" name="name" wire:model="name" placeholder="Nama Anda" label="Nama Lengkap"/>
                        <flux:input type="email" name="email" wire:model="email" placeholder="email@anda.com" label="Alamat Email"/>
                        <flux:input type="phone" name="text" wire:model="phone" placeholder="0852########" label="No HP/WA"/>
                        <flux:textarea  rows="2" wire:model="address" placeholder="Alamat Anda" label="Alamat"/>
                        <div class="flex items-center">
                            <input id="anonymous" type="checkbox" wire:model="hidden_name"
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="anonymous" class="ml-2 block text-sm text-gray-900">
                                Sembunyikan nama saya (donasi anonim)
                            </label>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button wire:click="generateSnapToken"
                            class="w-full bg-brand-green/90 hover:bg-brand-green text-white font-bold py-3 px-4 rounded-lg transition duration-300 text-lg">
                            Lanjutkan Pembayaran
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('midtrans-payment', ({ token }) => {
                window.snap.pay(token, {

                    onSuccess: function(result) {
                        console.log('success',result)
                        Livewire.dispatch('paymentSuccess', { result });
                    },
                    onPending: function(result) {
                        console.log('Pending', result);
                    },
                    onError: function(result) {
                        console.error('Error', result);
                    },
                    onClose: function() {
                        alert('Kamu menutup popup tanpa menyelesaikan pembayaran.');
                    }
                });
            });
        });
    </script>
</div>
