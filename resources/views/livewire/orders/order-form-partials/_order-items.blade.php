<div class="flex flex-wrap overflow-hidden text-center items-center">
    <div class="w-full" x-data="{ on: @entangle($attributes->wire('model')), handler() }">
        <table class="table-fixed shadow-sm">
            <thead class="bg-yellow-300 text-gray-900 font-bold">
                <tr class="h-16">
                    <th class="w-1/12 py-4 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Rbr.') }}</th>
                    <th class="w-4/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Trgovački naziv dobra – usluge') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Jed. mj.') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Količina') }}</th>
                    <th class="w-2/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Cijena (bez PDV-a)') }}</th>
                    <th class="w-2/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Iznos (bez PDV-a)') }}</th>
                    <th class="w-1/12 py-4 px-6 bg-grey-lighter font-sans font-medium text-grey border-b border-grey-light">{{ __('Ukloni') }}</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(field, index) in fields" :key="index">
                    <tr class="bg-white">
                        <td x-text="index + 1" class="w-1/12 py-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light"></td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name[]" x-model="field.name" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input id="unit" type="text" class="mt-1 block w-full" wire:model.defer="unit[]" x-model="field.unit" />
                            <x-jet-input-error for="unit" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input id="quantity" type="number" min="1" class="mt-1 block w-full" wire:model.defer="quantity[]" x-model="field.quantity" />
                            <x-jet-input-error for="quantity" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input id="unitPriceNoVat" type="text" class="mt-1 block w-full" wire:model.defer="unitPriceNoVat[]" x-model="field.unitPriceNoVat" />
                            <x-jet-input-error for="unitPriceNoVat" class="mt-2" />
                        </td>
                        <td class="py-3 px-2 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <x-jet-input disabled id="totalPriceNoVat" type="text" class="mt-1 block w-full" wire:model.defer="totalPriceNoVat[]" x-model="field.totalPriceNoVat" />
                            <x-jet-input-error for="totalPriceNoVat" class="mt-2" />
                        </td>
                        <td class="py-3 bg-grey-lighter font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                            <button type="button" class="bg-pink-100 text-pink-600 rounded-lg p-2 font-bold hover:bg-pink-200 hover:text-pink-700" @click="removeField(index)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

        <div class="flex justify-end mt-5">
            <x-jet-secondary-button @click="addNewField()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('Dodaj') }}
            </x-jet-secondary-button>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        function handler() {
            return {
                fields: [],
                addNewField() {
                    this.fields.push({
                        name: '',
                        unit: '',
                        quantity: '',
                        unitPriceNoVat: '',
                        totalPriceNoVat: '',
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
@endpush
