<x-app-layout>
    <x-slot name="header">
        <h2 class="font-light tracking-wide text-lg text-gray-800 leading-tight">
            {{ __('Izvoz narudžbenica') }}
        </h2>
    </x-slot>

    <div class="py-10 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
                    Izvoz podataka u Excel
                </h2>
        
                <p class="text-gray-600 sm:mt-4 sm:block">
                    Odaberite godinu za koju želite izvesti podatke i kliknite na gumb. Tablica s podacima 
                    bit će spremljena na vaše računalo u Excel formatu.
                </p>
            </div>
        
            <div class="mx-auto mt-8 max-w-xl">
                <form action="{{ route('orders.excel.export') }}" method="GET" class="sm:flex sm:flex-col sm:gap-4">
                    <div class="sm:flex-1">
                        <label for="year" class="sr-only">Godina</label>
                        <select id="year" name="year" class="w-full rounded-md border-gray-200 bg-white p-3 text-gray-700 shadow-xs transition focus:border-white focus:ring-3 focus:ring-yellow-400 focus:outline-hidden">
                            <option value="" disabled selected>Odaberite godinu</option>
                            @foreach($order_years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="group flex w-full items-center justify-center gap-2 rounded-md bg-green-500 px-5 py-3 text-white transition focus:ring-3 focus:ring-yellow-400 focus:outline-hidden">
                        <span class="text-medium font-medium"> Izvezi podatke </span>
                    </button>
                </form>
            </div>
            

        </div>
    </div>
</x-app-layout>
