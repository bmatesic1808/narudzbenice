<div class="w-52 z-50">
    <x-jet-dropdown-link href="#" class="cursor-pointer flex justify-between" wire:click="showEditModal({{ $user->id }})">
        <span>{{ __('Uredi') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </x-jet-dropdown-link>
    <hr>
    <x-jet-dropdown-link class="cursor-pointer flex justify-between" wire:click="showDestroyModal({{ $user->id }})">
        <span>{{ __('Obriši') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-pink-500">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </x-jet-dropdown-link>
</div>
