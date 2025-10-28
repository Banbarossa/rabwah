<div>

    <div class="flex gap-4">
        <div>
            <x-search-input/>
        </div>


    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column>Title</x-table.column>
                <x-table.column>Author</x-table.column>
                <x-table.column>Category</x-table.column>
                <x-table.column>Tag</x-table.column>
                <x-table.column>Tanggal</x-table.column>
                <x-table.column align="right">Aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->posts as $post)
                    <x-table.row variant="hovered" class="group">
                        <x-table.cell class=" truncate text-wrap ">
                            <div class="line-clamp-2 max-w-sm font-bold">
                                {{$post->title}}
                            </div>
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$post->author?->name}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$post->category?->name}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            @foreach($post->tags as $tag)
                                {{$tag?->name}}@if (! $loop->last)
                                    ,
                                @endif
                            @endforeach
                        </x-table.cell>

                        <x-table.cell class=" truncate text-wrap">
                            {{$post->published_at ? $post->published_at:$post->created_at}}
                        </x-table.cell>

                        <x-table.cell align="right">

                            <flux:button  size="sm"
                                         wire:click="restore({{$post->id}})">Pulihkan</flux:button>
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
        <div class="mt-2">
            {{$this->posts->links()}}
        </div>
    </div>
</div>
