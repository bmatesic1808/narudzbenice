<x-jet-action-section>
    <x-slot name="title">
        {{ __('Deaktivacija korisničkog računa') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Deaktivirajte svoj korsnički račun') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Nakon što ste deaktivirali svoj korisnički račun, više nećete moći pristupiti ovoj aplikaciji. Ukoliko želite ponovno dobiti pristup, molimo kontaktirajte administratora.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Deaktiviraj') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Deaktiviraj') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Jeste li sigurni da želite deaktivirati svoj korisnički račun? Nakon što ste deaktivirali svoj korisnički račun, više nećete moći pristupiti ovoj aplikaciji. Ukoliko želite ponovno dobiti pristup, molimo kontaktirajte administratora.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Lozinka') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Odustani') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Deaktiviraj') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
