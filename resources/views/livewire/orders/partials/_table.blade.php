<div class="max-w-7xl mx-auto pb-2 pt-2 sm:px-6 lg:px-8">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Izdao') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Broj') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Isporučitelj') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Datum') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Akcije') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ $order->user->profile_photo_url }}" alt="{{ $order->user->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $order->user->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $order->user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('orders.show', $order->id) }}" target="_blank" class="tracking-widest">
                                            <div class="bg-indigo-50 text-indigo-500 py-1 px-3 font-semibold text-sm rounded-full text-center hover:text-indigo-600 hover:bg-indigo-100 cursor-pointer">
                                                {{ $order->order_number }}/{{ $order->order_year }}
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $order->seller_name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $order->seller_address }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-500 text-sm">
                                            {{ $order->created_at->format('d/m/Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                                            <div class="-ml-5 absolute">
                                                <x-jet-dropdown align="right" width="60">
                                                    <x-slot name="trigger">
                                                        <span class="inline-flex rounded-md">
                                                            <button type="button" class="inline-flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-800 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                                <svg class="h-4 w-4"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 20 20"
                                                                     fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                          d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                          clip-rule="evenodd"/>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </x-slot>

                                                    <x-slot name="content">
                                                        @include('livewire.orders.partials._actions')
                                                    </x-slot>
                                                </x-jet-dropdown>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
