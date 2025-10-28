@props(['thumbnail'=>null])
<div>
    <div class="">
        <h2 class="text-sm font-semibold mb-2">Gambar Utama</h2>

        @if ($thumbnail)
            <img src="{{ $thumbnail }}" class="rounded-md mb-2 w-full h-auto" alt="tumbnail"/>
        @endif

        <div class="flex items-center space-x-2">
            <flux:button type="button"
                    onclick="openFileManager()"
                    variant="primary" color="blue" size="sm">
                Pilih dari File Manager
            </flux:button>

            @if($thumbnail)
                <flux:button type="button"
                        wire:click="$set('thumbnail', null)"
                         size="sm">
                    Hapus
                </flux:button>
            @endif
        </div>

        @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    @push('script')
        <script>
            function openFileManager() {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    const filePath = items[0].url;
                    @this.set('thumbnail', filePath);
                };
            }
        </script>

    @endpush
</div>
