<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // Add this line

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('id')->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'   => 'required|numeric',
            'items_ordered' => 'required',
            'total_amount'  => 'required|numeric',
            'order_status'  => 'required',
        ]);

        Order::create([
            'customer_id'   => $request->customer_id,
            'items_ordered' => $request->items_ordered,
            'total_amount'  => $request->total_amount,
            'order_status'  => $request->order_status,
        ]);

        return Redirect::route('orders')->with('message', 'A new order has been added.');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        $request->validate([
            'items_ordered' => 'required',
            'total_amount' => 'required',
            'order_status' => 'required',
        ]);
    
        $order->update([
            'items_ordered' => $request->input('items_ordered'),
            'total_amount' => $request->input('total_amount'),
            'order_status' => $request->input('order_status'),
        ]);
    
        return redirect('/orders')->with('message', "Order #$order->id has been updated");
    }

    public function delete(Order $order)
    {
        $order->delete();
        return redirect('/orders')->with('message', "Order #$order->id has been deleted successfully");
    }

}
