<div>
    <script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <div class="max-w-2xl mx-auto py-12 px-4">
        <h1 class="text-2xl font-bold text-center mb-8">Formulir Donasi Pesantren Arrabawah</h1>

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="processDonation">
            <div class="space-y-6">
                <div>
                    <label for="donor_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" wire:model.defer="donor_name" id="donor_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('donor_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="donor_email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input type="email" wire:model.defer="donor_email" id="donor_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('donor_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="donation_type" class="block text-sm font-medium text-gray-700">Jenis Donasi</label>
                    <select wire:model="donation_type" id="donation_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="scholarship">Beasiswa Yatim & Dhuafa (Orang Tua Asuh)</option>
                        <option value="operational">Operasional & Kebutuhan Pesantren</option>
                    </select>
                    @error('donation_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Donasi (IDR)</label>
                    <input type="number" wire:model.defer="amount" id="amount" placeholder="Minimal Rp 10.000" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="text-right">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span wire:loading.remove>Lanjutkan Pembayaran</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('snap-pay', (snapToken) => {
                window.snap.pay(snapToken, {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        alert("Terima kasih! Pembayaran Anda telah berhasil.");
                        // window.location.href = '/donasi/terima-kasih'; // Optional: Redirect to a thank you page
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        alert("Pembayaran Anda sedang diproses. Mohon selesaikan pembayaran Anda.");
                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        alert("Pembayaran gagal!");
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                    }
                });
            });
        });
    </script>
    @endpush
</div>