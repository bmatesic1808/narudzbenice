<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
        <x-jet-input id="searchTerm" type="text" wire:model="searchTerm" placeholder="Pretraži..." />

        <a href="{{ route('orders.create') }}">
            <x-jet-button class="font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-2">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                          clip-rule="evenodd"/>
                </svg>
                {{ __('Nova narudžbenica') }}
            </x-jet-button>
        </a>
    </div>

    @include('livewire.orders.partials._table')
</div>

