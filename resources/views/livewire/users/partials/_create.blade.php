<x-jet-dialog-modal wire:model="isModalVisible" :id="''" :maxWidth="'sm'">
    <div class="px-6 py-4">
        <div class="text-lg">
            <x-slot name="title">
                {{ __('Kreiraj novi korisnički račun') }}
            </x-slot>
        </div>

        <div class="mt-4">
            <x-slot name="content">
                <div>
                    <x-jet-label for="name" value="{{ __('Ime i prezime') }}"/>
                    <x-jet-input wire:model.defer="name" id="name" class="block mt-1 w-full" type="text"
                                 required autofocus autocomplete="name"/>
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input wire:model.defer="email" id="email" class="block mt-1 w-full" type="email"
                                 required/>
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Lozinka') }}"/>
                    <x-jet-input wire:model.defer="password" id="password" class="block mt-1 w-full"
                                 type="password" required autocomplete="new-password"/>
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Potvrda lozinke') }}"/>
                    <x-jet-input wire:model.defer="password_confirmation" id="password_confirmation"
                                 class="block mt-1 w-full" type="password" required autocomplete="new-password"/>
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>
            </x-slot>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalVisible')" wire:loading.attr="disabled">
                {{ __('Odustani') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="createUser" wire:loading.attr="disabled">
                {{ __('Spremi') }}
            </x-jet-button>
        </x-slot>
    </div>
</x-jet-dialog-modal>
