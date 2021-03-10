<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 text-center justify-center p-5 border-r border-gray-500 text-xl font-bold tracking-wider flex items-center bg-gray-50">
    <div>
        <div>{{ __('OPĆINA VELIKA') }}</div>
        <div>{{ __('ZVONIMIROVA 1a') }}</div>
        <div>{{ __('34 330 VELIKA') }}</div>
        <div>{{ __('Tel. 034-233-033, Fax: 034-313-033') }}</div>
        <div>{{ __('OIB: 30966980172') }}</div>
    </div>
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 p-5 bg-gray-50">
    <div>
        <x-jet-input id="sellerName" type="text" class="mt-1 block w-full" wire:model.defer="sellerName" placeholder="Ime i prezime ili naziv tvrtke" />
        <x-jet-input-error for="sellerName" class="mt-2" />
    </div>
    <div>
        <x-jet-input id="sellerAddress" type="text" class="mt-1 block w-full" wire:model.defer="sellerAddress" placeholder="Adresa (mjesto, ulica i kućni broj)" />
        <x-jet-input-error for="sellerAddress" class="mt-2" />
    </div>
    <div>
        <x-jet-input id="sellerPhone" type="text" class="mt-1 block w-full" wire:model.defer="sellerPhone" placeholder="Broj telefona" />
        <x-jet-input-error for="sellerPhone" class="mt-2" />
    </div>
    <div>
        <x-jet-input id="sellerOib" type="text" class="mt-1 block w-full" wire:model.defer="sellerOib" placeholder="OIB" />
        <x-jet-input-error for="sellerOib" class="mt-2" />
    </div>
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 text-gray-900 bg-yellow-300 p-3 text-center font-bold tracking-wider border-r border-t border-gray-500">
    {{ __('(MB/MBG – OIB – POREZNI BROJ)') }}
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 text-white bg-gray-700 p-3 text-center font-bold tracking-wider border-t border-gray-500">
    {{ __('(MB/MBG – OIB – POREZNI BROJ)') }}
</div>
