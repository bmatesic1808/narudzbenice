<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderItems')->with('user')->first();
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);

        return $pdf->stream('narudzbenica' . $order->order_number . '/' . $order->order_year . '.pdf');
    }

    public function download($id)
    {
        $order = Order::where('id', $id)->with('orderItems')->with('user')->first();
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);

        return $pdf->download('narudzbenica' . $order->order_number . '/' . $order->order_year . '.pdf');
    }
}
