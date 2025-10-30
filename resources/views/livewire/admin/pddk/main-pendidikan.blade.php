<div>

    <div class="flex gap-4">
        <div>
            <x-search-input/>
        </div>

        <flux:spacer/>
        <flux:button variant="primary" wire:navigate href="{{route('pendidikan.jenjang.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column>Title</x-table.column>
                <x-table.column>Author</x-table.column>
                <x-table.column>Tanggal</x-table.column>
                <x-table.column align="right">Aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->pendidikans as $post)
                    <x-table.row variant="hovered" class="group">
                        <x-table.cell class=" truncate text-wrap ">
                            <div class="line-clamp-2 max-w-sm font-bold">
                                {{$post->title}}
                            </div>
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-150 mt-1.5">
                                <a href="{{route('pendidikan.jenjang.form',['pendidikan'=>$post->id])}}" wire:navigate class="text-blue-600/80 hover:underline text-sm">Sunting</a>
                                <a href="{{route('pendidikan.jenjang.form',['pendidikan'=>$post->id])}}" wire:navigate class="text-green-600/80 hover:underline text-sm">Lihat</a>
                                <button class="text-red-600/80 hover:underline text-sm" wire:click="destroy({{$post->id}})">Hapus</button>
                            </div>
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$post->author?->name}}
                        </x-table.cell>


                        <x-table.cell class=" truncate text-wrap">
                            {{$post->published_at ? $post->published_at:$post->created_at}}
                        </x-table.cell>

                        <x-table.cell align="right">
                            <flux:dropdown>
                                @php
                                    $statusColors = [
                                        'draft' => 'gray',
                                        'published' => 'green',
                                        'archived' => 'yellow',
                                    ];

                                    $statusColor = $statusColors[$post->status] ?? 'gray';
                                @endphp
                                <flux:button icon:trailing="chevron-down" variant="primary" color="{{$statusColor}}" class="capitalize">{{$post->status}}</flux:button>
                                <flux:menu>
                                    @if($post->status != 'draft')
                                        <flux:menu.item wire:click="updateStatus({{ $post->id }}, 'draft')">Draft</flux:menu.item>
                                    @endif
                                    @if($post->status != 'published')
                                        <flux:menu.item  wire:click="updateStatus({{ $post->id }}, 'published')">Publish</flux:menu.item>
                                    @endif
                                    @if($post->status != 'archived')
                                        <flux:menu.item  wire:click="updateStatus({{ $post->id }}, 'archived')">Archive</flux:menu.item>
                                    @endif


                                </flux:menu>
                            </flux:dropdown>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="5">
                            <div class="flex items-center gap-2">
                                <flux:icon.information-circle></flux:icon.information-circle>
                                <span>
                                    Tidak ada data yang ditemukan
                                </span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-table.rows>
        </x-table.container>
    </div>
</div>
