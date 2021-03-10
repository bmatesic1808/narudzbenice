<x-jet-dialog-modal wire:model="isDestroyModalVisible">
    <x-slot name="title">
        {{ __('Obriši narudžbenicu') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Jeste li sigurni da želite nastaviti? Narudžbenica će biti nepovratno obrisana!') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('isDestroyModalVisible')" wire:loading.attr="disabled">
            {{ __('Odustani') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteOrder" wire:loading.attr="disabled">
            {{ __('Izbriši') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
