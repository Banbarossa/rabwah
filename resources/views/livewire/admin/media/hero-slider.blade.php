<div>
    @include('livewire.admin.media.tab-header')
    <div>
        <div class="flex">
            <div>
                <x-search-input/>
            </div>
            <flux:spacer/>
            <flux:button variant="primary"  wire:navigate href="{{route('pengaturan.hero-slider.form')}}">Tambah
            </flux:button>
        </div>
        <div class="mt-8">
            <x-table.container>
                <x-table.columns>
                    <x-table.column class="w-16">No</x-table.column>
                    <x-table.column class="w-16">Gambar</x-table.column>
                    <x-table.column>Nama/Judul</x-table.column>
                    <x-table.column>Urutan</x-table.column>
                    <x-table.column align="right">Aksi</x-table.column>
                </x-table.columns>
                <x-table.rows >
                    @forelse($this->medias as $index => $media)
                        <x-table.row variant="hovered" >
                            <x-table.cell>{{$index + 1}}</x-table.cell>
                            <x-table.cell class=" truncate text-wrap">
                                <div >
                                    <img src="{{$media->thumbnail}}" alt="thumbnail" class="h-8 aspect-video object-cover object-center rounded">
                                </div>
                            </x-table.cell>
                            <x-table.cell class=" truncate text-wrap">
                                {{$media->title}}
                            </x-table.cell>
                            <x-table.cell class=" truncate text-wrap">
                                {{$media->order}}
                            </x-table.cell>

                            <x-table.cell align="right">
                                <flux:button icon="eye" size="sm" :href="route('pengaturan.hero-slider.form',['media_asset'=>$media->id])"
                                             wire:navigate></flux:button>
                                <flux:button icon="trash" size="sm" variant="danger"
                                             wire:click="confirmDestroy({{$media->id}})"></flux:button>
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

</div>
