<div>
    <div class="flex">
        <div>
            <x-search-input/>
        </div>
        <flux:spacer/>
        <flux:button variant="primary" wire:navigate href="{{route('user.form')}}">Tambah
        </flux:button>
    </div>
    <div class="mt-8">
        <x-table.container>
            <x-table.columns>
                <x-table.column class="w-14">No</x-table.column>
                <x-table.column>Nama</x-table.column>
                <x-table.column>Email</x-table.column>
                <x-table.column>Aksi</x-table.column>
            </x-table.columns>
            <x-table.rows>
                @forelse($this->data as $index=>$user)
                    <x-table.row variant="hovered" class="group">
                        <x-table.cell class=" truncate text-wrap ">
                            {{$index+1}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            {{$user->name}}
                        </x-table.cell>

                        <x-table.cell class=" truncate text-wrap">
                            {{$user->email}}
                        </x-table.cell>
                        <x-table.cell class=" truncate text-wrap">
                            <flux:button icon="eye" size="sm" :href="route('user.form',$user)"
                                         wire:navigate></flux:button>
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
