<div>

    <div class="flex flex-col md:flex-row gap-6">


        <div class="flex-1 space-y-4">

            <input type="text"
                   wire:model.live.debounce.250ms="title"
                   placeholder="Tambahkan judul"
                   class="w-full text-2xl font-semibold  border border-gray-300 focus:ring-0 focus:border-gray-400 p-2"
            />
            <flux:error name="title"></flux:error>
            <x-quill-editor :content="$content" :message="$errors->first('content')"/>

        </div>


        <div class="w-full md:w-80 space-y-4">
            <div class="border rounded p-4 border-neutral-300 bg-white ">
                <h2 class="text-sm font-semibold mb-2">Status</h2>
                <div class="space-y-2 text-sm">
                    <div>Status: <strong>{{ $status ?? 'Draft' }}</strong></div>
                    <div>Diperbarui: <strong>{{ now()->format('d M Y H:i') }}</strong></div>
                    <div class="flex gap-2 mt-3">
                        <button wire:click="saveDraft" class="px-3 py-1 bg-gray-200 rounded-md text-sm">Simpan Draft
                        </button>
                        <button wire:click="publish" class="px-3 py-1 bg-blue-600 text-white rounded-md text-sm">
                            Terbitkan
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-4 border rounded border-neutral-300 bg-white">
                <div>
                    <label class="block text-sm font-semibold mb-1">Slug</label>
                    <textarea wire:model.defer="slug" rows="1"
                              class="w-full border rounded-md p-2 text-sm"></textarea>
                    <flux:error name="slug"></flux:error>

                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Meta Description</label>
                    <textarea wire:model.defer="meta_description" rows="3"
                              class="w-full border rounded-md p-2 text-sm"></textarea>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ strlen($meta_description) }} / 160 karakter
                    </p>
                    <flux:error name="meta_description"></flux:error>
                </div>
            </div>


            <div class="border rounded border-neutral-300 p-4 ">
                <h2 class="text-sm font-semibold  mb-2">Urutan</h2>
                <flux:input type="number" wire:model="order" name="order" label="Urutan Tampil"></flux:input>

            </div>





            {{-- Kategori --}}


            {{-- Gambar Utama --}}
            <div class="border rounded p-4 border-neutral-300 bg-white">
                <x-thumbnail-selector :thumbnail="$thumbnail"/>

            </div>
        </div>
    </div>


</div>
