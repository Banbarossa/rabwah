<div>

    <div>
        <div class="grid grid-cols-2">
            <div>

                <h2 class="text-xl font-bold mb-4">Pembayaran</h2>
                <p>Order ID: {{ $orderId }}</p>
                <p>Total: Rp {{ number_format($amount, 0, ',', '.') }}</p>

                <button wire:click="pay" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Bayar Sekarang
                </button>
            </div>
            <div>
                <div id="snap-container"></div>
            </div>
        </div>


{{--        @push('script')--}}

        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ config('midtrans.clientKey') }}"></script>

        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('midtrans-payment', ({ token }) => {
                    // window.snap.pay(token, {
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
{{--        @endpush--}}
    </div>

</div>
