<x-app-layout>
    <x-slot name="header">
        <h2 class="font-light tracking-wide text-lg text-gray-800 leading-tight">
            {{ __('Kreiranje nove narudžbenice') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <livewire:orders.order-form />
    </div>
</x-app-layout>
