<x-jet-dialog-modal wire:model="isEditModalVisible" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Uredi korisničke informacije') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="name" value="{{ __('Ime i prezime') }}"/>
                    <x-jet-input wire:model.defer="name" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="name"/>
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input wire:model.defer="email" class="block mt-1 w-full" type="email" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isEditModalVisible')" wire:loading.attr="disabled">
                {{ __('Odustani') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="updateUser" wire:loading.attr="disabled">
                {{ __('Spremi') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
