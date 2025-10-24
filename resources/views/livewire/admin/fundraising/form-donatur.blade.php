<div>
    <div class="max-w-md">
        <form action="" wire:submit.prevent="save">
            <div class="space-y-6">
                <flux:input type="text" name="name" label="Nama" placeholder="Nama Donatur" wire:model.defer="name"/>
                <flux:input type="email" name="email" label="Email" placeholder="Email Donatur" wire:model.defer="email"/>
                <flux:input type="text" name="phone" label="Nomor Hp/WA" placeholder="No Hp/WA" wire:model.defer="phone"/>
                <flux:textarea rows="3" name="address" label="Alamat" placeholder="Alamat" wire:model.defer="address"/>
                <flux:button type="submit" variant="primary">Simpan Data</flux:button>
            </div>
        </form>
    </div>
</div>
