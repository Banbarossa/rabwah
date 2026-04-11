<div>
    <form wire:submit.prevent="submit">
        <div class="flex flex-col md:flex-row gap-6">


            <div class="flex-1">
                <div class="border rounded p-4 border-neutral-300 bg-white  dark:bg-neutral-800 space-y-6">

                    <flux:input type="text" wire:model="title" name="title" label="Judul/Nama"
                                placeholder="Nama/Judul Gambar"/>
                    <flux:input type="text" wire:model="url_target" name="url_target" label="Link target"
                                placeholder="Link Target"/>

                </div>
            </div>


            <div class="w-full md:w-80 space-y-4">
                <div class="border rounded p-4 border-neutral-300 bg-white dark:bg-neutral-800 space-y-6">
                    <flux:button type="submit" variant="primary" color="blue" size="sm">Simpan</flux:button>
                </div>
                <div class="border rounded p-4 border-neutral-300 bg-white dark:bg-neutral-800 space-y-6">
                    <flux:input type="number" wire:model="order" name="order" label="Urutan Tampil"/>

                    <x-thumbnail-selector :thumbnail="$thumbnail"/>
                </div>
            </div>
        </div>
    </form>

</div>
