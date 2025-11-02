<div>
    <div class="flex gap-4">
        <div>
            <x-search-input/>
        </div>
        <div>
            <flux:select wire:model.live.debounce.300ms="categorySelected">
                <flux:select.option value="">Seluruh Kategori</flux:select.option>
                @foreach($this->categories as $cat)
                    <flux:select.option value="{{$cat->id}}">{{$cat->name}}</flux:select.option>
                @endforeach
            </flux:select>
        </div>
        <flux:spacer/>
        <flux:button variant="primary"  wire:navigate href="{{route('fundraising.program.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column class="w-16">No</x-table.column>
                <x-table.column>Category</x-table.column>
                <x-table.column>Nama</x-table.column>
                <x-table.column>Target</x-table.column>
                <x-table.column>Capaian</x-table.column>
                <x-table.column>Status</x-table.column>
                <x-table.column align="right">Aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->programs as $index => $prog)
                    <x-table.row variant="hovered">
                        <x-table.cell>{{$index + 1}}</x-table.cell>
                        <x-table.cell>{{$prog->category?->name}}</x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$prog->title}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$prog->target_amount ? format_rupiah($prog->target_amount) :'' }}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$prog->total_received ? format_rupiah($prog->total_received):format_rupiah(0)}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap capitalize">
                            {{$prog->status}}
                        </x-table.cell>

                        <x-table.cell align="right">
                            <flux:button icon="eye" size="sm" :href="route('fundraising.program.form',['program'=>$prog->id])"
                                         wire:navigate></flux:button>
                            <flux:button icon="trash" size="sm" variant="danger"
                                         wire:click="confirmDestroy({{$prog->id}})"></flux:button>
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
