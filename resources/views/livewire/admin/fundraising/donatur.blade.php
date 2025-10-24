<div>

    <div class="flex">
        <div>
            <x-search-input/>
        </div>
        <flux:spacer/>
        <flux:button variant="primary" wire:navigate href="{{route('fundraising.donatur.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column>Nama</x-table.column>
                <x-table.column>Email</x-table.column>
                <x-table.column>Contact</x-table.column>
                <x-table.column >Alamat</x-table.column>
                <x-table.column align="right">aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->donaturs as $dot)
                    <x-table.row variant="hovered">
                        <x-table.cell class=" truncate text-wrap">
                            {{$dot->name}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$dot->email}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$dot->phone}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$dot->address}}
                        </x-table.cell>

                        <x-table.cell align="right">
                            <flux:button icon="eye" size="sm"
                                         :href="route('fundraising.donatur.form',['donor'=>$dot->id])"
                                         wire:navigate></flux:button>
                            <flux:button icon="trash" size="sm" variant="danger"
                                         wire:click="confirmDestroy({{$dot->id}})"></flux:button>
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
