<div class="flex flex-wrap overflow-hidden text-center items-center">
    <div class="w-full">
        <table class="table-fixed shadow-sm">
            <thead class="bg-yellow-300 text-gray-900 font-bold">
                <tr class="h-16">
                    <th class="w-5/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Trgovački naziv dobra – usluge') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Jed. mj.') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Količina') }}</th>
                    <th class="w-2/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Cijena (bez PDV-a)') }}</th>
                    <th class="w-2/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Iznos (bez PDV-a)') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Ukloni') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $index => $item)
                    <tr class="bg-white">
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.debounce.500ms="orderItems.{{ $index }}.name" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.debounce.500ms="orderItems.{{ $index }}.unit" />
                            <x-jet-input-error for="unit" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input type="number" min="1" class="mt-1 block w-full" wire:model.debounce.500ms="orderItems.{{ $index }}.quantity" />
                            <x-jet-input-error for="quantity" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input type="text" class="mt-1 block w-full" wire:model.debounce.500ms="orderItems.{{ $index }}.unit_price_no_vat" />
                            <x-jet-input-error for="unit_price_no_vat" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium text-sm text-grey border-b border-grey-light">
                            <div class="bg-gray-100 text-gray-700 font-bold text-lg rounded-lg p-1.5">
                                {{ number_format(round($item['quantity'], 2) * round($item['unit_price_no_vat'], 2), 2) }}&nbsp;EUR
                            </div>
                        </td>
                        <td class="py-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <button type="button" class="bg-pink-100 text-pink-600 rounded-lg p-2 font-bold hover:bg-pink-200 hover:text-pink-700" wire:click.prevent="removeItem({{ $index }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="bg-gray-200 text-gray-900 font-semibold text-lg p-3 flex justify-between">
            <div class="tracking-widest">{{ __('UKUPNO (bez PDV-a):') }}</div>
            <div class="tracking-wide">{{ number_format($totalCostNoVat, 2) }}&nbsp;EUR</div>
        </div>

        <div class="flex justify-end mt-5">
            <x-jet-secondary-button wire:click.prevent="addNewItem">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('Dodaj') }}
            </x-jet-secondary-button>
        </div>
    </div>
</div>
