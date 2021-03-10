<div class="w-full overflow-hidden sm:w-full md:w-full p-5 text-gray-900 tracking-wider border-t border-b border-gray-500 bg-white">
    {{ __('Žiroračun kupca (primatelja) - IBAN:') }}
    <div>
        <x-jet-input id="sellerIban" type="text" class="mt-1 block w-1/2" wire:model.defer="sellerIban" placeholder="HR22 4109 0061 0111 1111 6" />
        <x-jet-input-error for="sellerIban" class="mt-2" />
    </div>
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 border-r border-gray-500 bg-gray-200 border-b border-gray-500">
    <div class="p-5">
        {{ __('Nadnevak') }}
        <div>
            <x-jet-input id="orderDate" type="date" class="mt-1 block w-full" wire:model.defer="orderDate" />
            <x-jet-input-error for="orderDate" class="mt-2" />
        </div>
    </div>
</div>

<div class="w-1/2 overflow-hidden sm:w-full md:w-1/2 uppercase text-2xl tracking-widest p-5 font-bold text-center bg-gray-50 border-b border-gray-500">
    <div>
        {{ __('Narudžbenica') }}
    </div>

    <div class="bg-gray-200 py-2 mt-2 rounded-lg">
        {{ $orderNumber }}/{{ $orderYear }}
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
    <div>
        <x-jet-input id="deliveryDue" type="text" class="mt-1 block w-full" wire:model.defer="deliveryDue" placeholder="Rok isporuke" />
        <x-jet-input-error for="deliveryDue" class="mt-2" />
    </div>
</div>

<div class="w-1/3 overflow-hidden sm:w-full md:w-1/3 uppercase text-center tracking-wider p-5 text-sm border-t border-gray-500">
    <div>
        <x-jet-input id="shippingType" type="text" class="mt-1 block w-full" wire:model.defer="shippingType" placeholder="Način otpreme" />
        <x-jet-input-error for="shippingType" class="mt-2" />
    </div>
</div>
