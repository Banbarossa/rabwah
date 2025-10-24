<div>
    <div class="flex">
        <div>
            <x-search-input/>
        </div>
        <flux:spacer/>
        <flux:button variant="primary"  wire:navigate href="{{route('post.category.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column class="w-16">No</x-table.column>
                <x-table.column>Nama</x-table.column>
                <x-table.column>Slug</x-table.column>
                <x-table.column align="right">Aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($categories as $index => $cat)
                    <x-table.row variant="hovered">
                        <x-table.cell>{{$index + 1}}</x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$cat->name}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$cat->slug}}
                        </x-table.cell>

                        <x-table.cell align="right">
                            <flux:button icon="eye" size="sm" :href="route('post.category.form',['category'=>$cat->id])"
                                         wire:navigate></flux:button>
                            <flux:button icon="trash" size="sm" variant="danger"
                                         wire:click="confirmDestroy({{$cat->id}})"></flux:button>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="4">
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
