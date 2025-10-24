<div>
    <div class="flex flex-col md:flex-row gap-6">
        @push('style')
            <style>
                .ql-container {
                    min-height: 480px;
                    height: auto;
                }

                .ql-editor {
                    min-height: 480px;
                    height: auto;
                }
            </style>
        @endpush

        <div class="flex-1 space-y-4">
            <div class="p-4 border rounded border-neutral-300 bg-white">
                <input type="text"
                       wire:model.live.debounce.250ms="title"
                       placeholder="Tambahkan judul"
                       class="w-full text-2xl font-semibold  border border-neutral-300 focus:ring-0 focus:border-gray-400 p-2 mb-4"
                />
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <div wire:ignore>
                    <div id="content" class="h-[480px] border-t border-gray-200">{{ $content }}</div>
                </div>
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="w-full md:w-80 space-y-4">
            <div class="border rounded p-4 border-neutral-300 bg-white ">
                <h2 class="text-sm font-semibold mb-2">Status</h2>
                <div class="space-y-2 text-sm">
                    <div>Status: <strong class="capitalize">{{ $status ?? 'Draft' }}</strong></div>
                    <div>Diperbarui: <strong>{{ $program?->updated_at ? $program->updated_at->format('d M Y H:i') : now()->format('d M Y H:i') }}</strong></div>
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
                    <input type="text" wire:model="slug" class="w-full border rounded-md p-2 text-sm bg-gray-100" readonly/>
                    @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Kategori --}}
            <div class="border rounded border-neutral-300 p-4 ">
                <h2 class="text-sm font-semibold  mb-2">Kategori</h2>
                <flux:select wire:model="category_program_id" size="sm">
                    <flux:select.option value="">Pilih Kategori</flux:select.option>
                    @foreach($this->categories as $cat)
                        <flux:select.option value="{{$cat->id}}">{{$cat->name}}</flux:select.option>
                    @endforeach
                </flux:select>
                @error('category_program_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Target Amount --}}
            <div class="border rounded border-neutral-300 p-4 ">
                <h2 class="text-sm font-semibold mb-2">Target Donasi</h2>
                <input type="number" wire:model="target_amount" class="w-full border rounded-md p-2 text-sm" placeholder="Contoh: 1000000">
                @error('target_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Gambar Utama --}}
            <div class="border rounded p-4 border-neutral-300 bg-white">
                <h2 class="text-sm font-semibold mb-2">Gambar Utama</h2>
                @if ($thumbnail)
                    <img src="{{ $thumbnail->temporaryUrl() }}" class="rounded-md mb-2 w-full h-auto"/>
                @elseif($thumbnail)
                     <img src="{{ asset('storage/' . $thumbnail) }}" class="rounded-md mb-2 w-full h-auto"/>
                @endif
                <input type="file" wire:model="thumbnail" class="text-sm w-full"/>
                @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.addEventListener('livewire:navigated', () => {
                initQuill();
            });

            function initQuill(){
                let quill;
                let timeout;
                const toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['link', 'formula'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean']
                ];

                if (document.getElementById('content')) {
                    quill = new Quill('#content', {
                        theme: 'snow',
                        modules: {
                            toolbar: toolbarOptions,
                        },
                    });

                    quill.on('text-change', function(delta, oldDelta, source) {
                        if (source === 'user') {
                            clearTimeout(timeout);
                            timeout = setTimeout(() => {
                                @this.set('content', quill.root.innerHTML);
                            }, 500);
                        }
                    });

                    let initialContent = @this.get('content');
                    if (initialContent) {
                        quill.root.innerHTML = initialContent;
                    }

                    document.addEventListener('livewire:navigated', () => {
                        if (quill) {
                            let reloadedContent = @this.get('content');
                            if(reloadedContent){
                                quill.root.innerHTML = reloadedContent;
                            }
                        }
                    });
                }
            }
        </script>
    @endpush
</div>
