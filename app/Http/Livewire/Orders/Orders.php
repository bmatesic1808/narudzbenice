<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $searchTerm;
    public $orderId;
    public $isDestroyModalVisible = false;

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';
        return view('livewire.orders.orders', [
            'orders' => Order::where('order_number', 'like', $searchString)
                ->orWhere('seller_name', 'like', $searchString)
                ->orWhere('seller_address', 'like', $searchString)
                ->with('user')
                ->with('orderItems')
                ->orderBy('order_year', 'DESC')
                ->orderBy('order_number', 'DESC')
                ->paginate(50)
        ]);
    }

    public function showDestroyModal($id): void
    {
        $this->orderId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function deleteOrder(): void
    {
        Order::find($this->orderId)->delete();
        $this->isDestroyModalVisible = false;

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Uspjeh! Narudžbenica je obrisana',
            'style' => 'success'
        ]);
    }
}
