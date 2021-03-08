<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';

        return view('livewire.orders.orders', [
            'orders' => Order::where('order_number', 'like', $searchString)->with('user')->get()
        ]);
    }
}
