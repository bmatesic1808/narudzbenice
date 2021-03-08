<div class="w-full overflow-hidden sm:w-full md:w-full p-5 text-gray-900 tracking-wider border-t border-b border-gray-500 bg-white">
    {{ __('Žiroračun kupca (primatelja): IBAN HR602340009110182170') }}
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 border-r border-gray-500 bg-gray-200 border-b border-gray-500">
    <div class="border-b border-gray-500 p-5">
        {{ __('Naš znak i broj') }}
    </div>
    <div class="p-5">
        {{ __('Nadnevak') }}
        <div>
            <x-jet-input id="orderDate" type="date" class="mt-1 block w-full" wire:model.defer="orderDate" />
            <x-jet-input-error for="orderDate" class="mt-2" />
        </div>
    </div>
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 uppercase text-2xl tracking-widest p-5 font-bold flex justify-center text-center items-center bg-gray-50 border-b border-gray-500">
    <div>
        {{ __('Narudžbenica') }}
    </div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm border-r border-gray-500">
    <div>
        {{ __('NARUČENA DOBRA - USLUGE ISPORUČITE NA NASLOV:') }}
    </div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm border-r border-gray-500">
    <div>
        {{ __('ROK ISPORKE') }}
    </div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm">
    <div>
        {{ __('NAČIN OTPREME') }}
    </div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 font-semibold border-r border-gray-500 border-t">
    <div>{{ __('OPĆINA VELIKA') }}</div>
    <div>  {{ __('ZVONIMIROVA 1a') }}</div>
    <div>{{ __('34 330 VELIKA') }}</div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm border-r border-gray-500 border-t">

</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm border-t border-gray-500">

</div>
