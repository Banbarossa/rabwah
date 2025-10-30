<div>
    <div class="flex">
        <div>
            <x-search-input/>
        </div>
        <flux:spacer/>
        <flux:button variant="primary" wire:navigate href="{{route('fundraising.program.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column class="w-16">No</x-table.column>
                <x-table.column>Nama</x-table.column>
                <x-table.column>Program</x-table.column>
                <x-table.column>Jumlah</x-table.column>
                <x-table.column>Status</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->histories() as $index => $his)
                    <x-table.row variant="hovered">
                        <x-table.cell>{{$index + 1}}</x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$his->donor?->name}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$his->program?->title}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{format_rupiah($his->amount)}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap capitalize">
                            {{$his->payment?->status}}
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
