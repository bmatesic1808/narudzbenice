<div>
    <div class="max-w-7xl mx-auto pb-10 pt-2 sm:px-6 lg:px-8">
        <form wire:submit.prevent="createOrUpdateOrder">
            <div class="flex flex-wrap overflow-hidden shadow-2xl border border-gray-500 rounded-lg">
                @include('livewire.orders.order-form-partials._buyer-seller-header')
                @include('livewire.orders.order-form-partials._buyer-seller-info')
                @include('livewire.orders.order-form-partials._order-details')
            </div>

            <div class="leading-10 tracking-widest text-2xl text-gray-900 uppercase font-bold mt-10 py-5">{{ __('Naručujemo:') }}</div>
            @include('livewire.orders.order-form-partials._order-items')
            @include('livewire.orders.order-form-partials._order-footer')
        </form>
    </div>
</div>
