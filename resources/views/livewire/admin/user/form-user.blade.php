<div>
    <form wire:submit.prevent="save" class="space-y-6 max-w-md">
        <flux:input type="text" placeholder="Name" label="Name" wire:model.defer="name" name="name"/>
        <flux:input type="email" placeholder="email@gmail.com" label="email" wire:model.defer="email" name="email"/>
        @if(!$user)
        <flux:input type="password" viewable  wire:model.defer="password" label="Password" name="password"/>
        <flux:input type="password" viewable  wire:model.defer="password_confirmation" label="Password Confirmation" name="password_confirmation"/>
        @endif

        <flux:button variant="primary" type="submit">Simpan</flux:button>
    </form>
</div>
