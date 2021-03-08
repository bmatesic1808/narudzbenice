<div class="flex flex-wrap overflow-hidden shadow-2xl border border-gray-500 rounded-lg text-left items-center my-14">
    <div class="w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 p-5 border-r border-gray-500">
        {{ __('Našu narudžbu platit ćemo u roku:') }}
    </div>

    <div class="w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 px-5 py-2">
        <x-jet-input id="paymentDue" type="text" class="mt-1 block w-1/3" wire:model.defer="paymentDue" placeholder="Broj dana" />
        <x-jet-input-error for="paymentDue" class="mt-2" />
    </div>

    <div class="w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 p-5 border-r border-t border-gray-500">
        {{ __('Način plaćanja') }}
    </div>

    <div class="w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 p-5 border-t border-gray-500">
        {{ __('Po računu') }}
    </div>
</div>

<div class="flex flex-wrap justify-end">
    <x-jet-button class="text-lg">
        {{ __('Spremi narudžbenicu') }}
    </x-jet-button>
</div>

