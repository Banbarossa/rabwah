<div>
    <form wire:submit.prevent="save">
        <flux:input type="text" placeholder="Nama Tag" wire:model="name" name="name" lable="Nama Kategori" class="mb-6 max-w-md"/>
        <flux:button type="submit">Simpan Tags</flux:button>
    </form>
</div>
