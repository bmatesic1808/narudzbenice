<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

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

    public function showExportsPage() 
    {
        $order_years = Order::select('order_year')->distinct()->orderBy('order_year', 'DESC')->pluck('order_year');
        
        return view('orders.exports', compact('order_years'));
    }

    public function exportToExcel(Request $request) 
    {
        $year = $request->input('year');
    
        if (!$year) {
            return redirect()->back()->with('error', 'Molimo odaberite godinu za izvoz.');
        }
    
        return Excel::download(new OrdersExport($year), 'narudzbenice_'.$year.'.xlsx');
    }
}
