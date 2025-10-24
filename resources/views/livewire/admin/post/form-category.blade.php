<div>
    <form wire:submit.prevent="save">
        <flux:input type="text" placeholder="Nama Kategori" wire:model="name" name="name" lable="Nama Kategori" class="mb-6 max-w-md"/>
        <flux:button type="submit">Simpan Kategory</flux:button>
    </form>
</div>
