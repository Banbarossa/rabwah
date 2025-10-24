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

            <input type="text"
                   wire:model.live.debounce.250ms="title"
                   placeholder="Tambahkan judul"
                   class="w-full text-2xl font-semibold  border border-gray-300 focus:ring-0 focus:border-gray-400 p-2"
            />

            <div wire:ignore>
                <div id="editor" class="h-[480px] border border-t-0 border-gray-200 rounded-b-md"></div>
            </div>
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

                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Meta Description</label>
                    <textarea wire:model.defer="meta_description" rows="3"
                              class="w-full border rounded-md p-2 text-sm"></textarea>
                    <p class="text-xs text-gray-500 mt-1">
                        {{--                    {{ strlen($meta_description) }} / 160 karakter--}}
                    </p>
                </div>
            </div>


            <!-- Tags -->
            <div class="p-4 border rounded border-neutral-300 bg-white">
                <label class="block text-sm font-semibold mb-1">Tag</label>

{{--                @foreach($this->categories as $cat)--}}
{{--                    <label class="flex items-center space-x-2 text-sm">--}}
{{--                        <input type="checkbox" wire:model="selectedCategories" value="{{ $cat->id }}">--}}
{{--                        <span>{{ $cat->name }}</span>--}}
{{--                    </label>--}}
{{--                @endforeach--}}
            </div>


            {{-- Kategori --}}
            <div class="border rounded border-neutral-300 p-4 ">
                <h2 class="text-sm font-semibold  mb-2">Kategori</h2>
                <flux:select wire:model="selectedCategories" size="sm">
                    <flux:select.option>Pilih Kategori</flux:select.option>
                    @foreach($this->categories as $cat)
                        <flux:select.option value="{{$cat->id}}">{{$cat->name}}</flux:select.option>
                    @endforeach
                </flux:select>

            </div>

            {{-- Gambar Utama --}}
            <div class="border rounded p-4 border-neutral-300 bg-white">
                <h2 class="text-sm font-semibold mb-2">Gambar Utama</h2>
                {{--                @if ($thumbnail)--}}
                {{--                    <img src="{{ $thumbnail }}" class="rounded-md mb-2"/>--}}
                {{--                @endif--}}
                <input type="file" wire:model="thumbnailFile" class="text-sm"/>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.addEventListener('livewire:navigated', () => {
                const toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['blockquote', 'code-block'],
                    ['link', 'formula'],

                    [{'header': 1}, {'header': 2}],               // custom button values
                    [{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
                    [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
                    [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
                    [{'direction': 'rtl'}],                         // text direction

                    [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],

                    [{'color': []}, {'background': []}],          // dropdown with defaults from theme
                    [{'font': []}],
                    [{'align': []}],

                    ['clean']                                         // remove formatting button
                ];
                if (window.Quill) {
                    const quill = new window.Quill('#editor', {
                        theme: 'snow',
                        modules: {
                            toolbar: toolbarOptions,

                        },

                    });

                    quill.on('text-change', (delta, oldDelta, source) => {
                        clearTimeout(timeout);
                        timeout = setTimeout(() => {
                            @this.
                            set('content', quill.root.innerHTML);
                        }, 500);
                    });
                } else {
                    console.error('Quill not found in window.');
                }
            });
        </script>
    @endpush
</div>
