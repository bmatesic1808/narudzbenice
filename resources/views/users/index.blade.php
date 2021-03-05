<x-app-layout>
    <x-slot name="header">
        <h2 class="font-light tracking-wide text-lg text-gray-800 leading-tight">
            {{ __('Korisnici aplikacije') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <livewire:users.users />
    </div>
</x-app-layout>
