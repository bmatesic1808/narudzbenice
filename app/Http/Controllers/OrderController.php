<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function edit($id)
    {
        return view('orders.edit', [
            'order' => Order::findOrFail($id)
        ]);
    }
}
