<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class OrderForm extends Component
{
    public $order;
    public $orderDate;
    public $sellerName;
    public $sellerAddress;
    public $sellerPhone;
    public $sellerOib;
    public $sellerIban;
    public $paymentDue;
    public $deliveryDue;
    public $shippingType;
    public $orderItems = [];

    protected $rules = [
        'orderDate' => 'required',
        'sellerName' => 'required|string',
        'sellerAddress' => 'string',
        'sellerOib' => 'string',
        'sellerIban' => 'required|string',
        'paymentDue' => 'string',
        'deliveryDue' => 'string',
        'shippingType' => 'string',
    ];

    public function mount(): void
    {
        if ($this->order) {
            $this->loadOrderModel($this->order);
            $this->loadOrderItems($this->order);

            return;
        }

        $this->orderItems = [
            [
                'orderId' => '',
                'name' => '',
                'quantity' => 1,
                'unit' => '',
                'unit_price_no_vat' => '',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.orders.order-form', [
            'totalCostNoVat' => $this->calculateTotalCostNoVat(),
            'orderNumber' => $this->generateOrderNumber($this->order),
            'orderYear' => $this->generateOrderYear($this->order)
        ]);
    }

    public function createOrUpdateOrder()
    {
        $this->validate();
        $orderNumber = $this->generateOrderNumber($this->order);
        $orderYear = $this->generateOrderYear($this->order);

        if ($this->order) {
            Order::find($this->order->id)->delete();
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => $orderNumber,
            'order_year' => $orderYear,
            'order_date' => $this->orderDate,
            'seller_name' => $this->sellerName,
            'seller_address' => $this->sellerAddress,
            'seller_phone' => $this->sellerPhone,
            'seller_oib' => $this->sellerOib,
            'seller_iban' => $this->sellerIban,
            'delivery_due' => $this->deliveryDue,
            'shipping_type' => $this->shippingType,
            'payment_due' => $this->paymentDue
        ]);

        $this->spreadOrderItems($order);

        session()->flash('message', 'Uspjeh! Kreirana je nova narudžbenica.');

        return redirect(route('orders.index'));
    }

    public function spreadOrderItems(Order $order): void
    {
        foreach ($this->orderItems as $item) {
            OrderItem::create([
               'order_id' => $order->id,
               'name' => $item['name'],
               'quantity' => $item['quantity'],
               'unit' => $item['unit'],
               'unit_price_no_vat' => $item['unit_price_no_vat'],
               'total_price_no_vat' => round($item['quantity'], 2) * round($item['unit_price_no_vat'], 2)
            ]);
        }
    }

    public function addNewItem(): void
    {
        $this->orderItems[] = [
                'orderId' => '',
                'name' => '',
                'quantity' => 1,
                'unit' => '',
                'unit_price_no_vat' => '',
            ];
    }

    public function removeItem($index): void
    {
        unset($this->orderItems[$index]);
        array_values($this->orderItems);
    }

    public function calculateTotalCostNoVat()
    {
        return collect($this->orderItems)->reduce(function ($total, $item) {
            return $total + (round($item['quantity'], 2) * round($item['unit_price_no_vat'], 2));
        });
    }

    public function generateOrderNumber(?Order $order): int
    {
        if ($order) {
            return $order->order_number;
        }

        $lastOrder = Order::where('order_year', today()->year)->orderBy('order_number', 'DESC')->first();

        if (!$lastOrder || $lastOrder->order_year < today()->year) {
            return 1;
        }

        return $lastOrder->order_number + 1;
    }

    public function generateOrderYear(?Order $order): int
    {
        return $order->order_year ?? today()->year;
    }

    public function loadOrderModel(Order $order): void
    {
         $this->orderDate = $order->order_date;
         $this->sellerName = $order->seller_name;
         $this->sellerAddress = $order->seller_address;
         $this->sellerPhone = $order->seller_phone;
         $this->sellerOib = $order->seller_oib;
         $this->sellerIban = $order->seller_iban;
         $this->paymentDue = $order->payment_due;
         $this->deliveryDue = $order->delivery_due;
         $this->shippingType = $order->shipping_type;
    }

    public function loadOrderItems(Order $order): void
    {
        foreach ($order->orderItems as $orderItem) {
            $this->orderItems[] = $orderItem->toArray();
        }
    }
}
