<div>
    <div>
        <div class="mb-4">
            <input type="text" wire:model="title" placeholder="Judul menu" class="border p-2 rounded w-full mb-2">
            <input type="text" wire:model="url" placeholder="URL" class="border p-2 rounded w-full mb-2">
            <select wire:model="parent_id" class="border p-2 rounded w-full mb-2">
                <option value="">Tanpa Induk</option>
                @foreach ($menuItems as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
            <button wire:click="addItem" class="bg-blue-500 text-white px-3 py-1 rounded">Tambah</button>
        </div>

        <ul id="menu-list" class="space-y-2">
            @foreach ($menuItems as $item)
                <li data-id="{{ $item->id }}" class="border rounded p-2 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <span>{{ $item->title }}</span>
                        <button wire:click="deleteItem({{ $item->id }})" class="text-red-500">Hapus</button>
                    </div>

                    @if($item->children->count())
                        <ul class="ml-6 mt-2 space-y-1">
                            @foreach ($item->children as $child)
                                <li data-id="{{ $child->id }}" class="border rounded p-2 bg-gray-100">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $child->title }}</span>
                                        <button wire:click="deleteItem({{ $child->id }})" class="text-red-500">Hapus</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        @push('scripts')
            <script>
                // Optional: gunakan SortableJS untuk drag-drop menu
                document.addEventListener('livewire:load', function () {
                    const el = document.getElementById('menu-list');
                    const sortable = new Sortable(el, {
                        group: 'nested',
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        onEnd: function () {
                            const orderedItems = Array.from(el.children).map((li, index) => ({
                                id: li.dataset.id,
                                order: index,
                                parent_id: null
                            }));
                            Livewire.emit('updateMenuOrder', orderedItems);
                        }
                    });
                });
            </script>
        @endpush
    </div>

</div>
