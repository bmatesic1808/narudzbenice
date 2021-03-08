<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderForm extends Component
{
    public $orderDate;
    public $sellerName;
    public $sellerAddress;
    public $sellerPhone;
    public $sellerOib;
    public $paymentDue;
    public $name = [];

    protected $rules = [
        'orderDate' => 'required',
        'sellerName' => 'required|string',
        'sellerAddress' => 'required|string',
        'sellerOib' => 'string',
        'paymentDue' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.orders.order-form');
    }

    public function createNewOrder()
    {
        dd($this->name);
        $this->validate();

        Order::create([
            'user_id' => 1,
            'order_number' => '1/2021',
            'order_date' => $this->orderDate,
            'seller_name' => $this->sellerName,
            'seller_address' => $this->sellerAddress,
            'seller_phone' => $this->sellerPhone,
            'seller_oib' => $this->sellerOib,
            'payment_due' => $this->paymentDue

        ]);

        $this->spreadOrderItems();

        session()->flash('message', 'Uspjeh! Kreirana je nova narudžbenica.');

        return redirect(route('orders.index'));
    }

    public function spreadOrderItems(): void
    {

    }
}
