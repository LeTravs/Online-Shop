<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
{
    $orders = Order::all(); 

    $customers = Customer::all();
    return view('deliveries.create', ['customers' => $customers, 'orders' => $orders]);
}
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'   => 'required|numeric',
            'items_ordered' => 'required',
            'total_amount'  => 'required|numeric',
            'phone'         => 'required',
        ]);

        Delivery::create([
            'customer_id'   => $request->customer_id,
            'items_ordered' => $request->items_ordered,
            'total_amount'  => $request->total_amount,
            'phone'         => $request->phone,
        ]);

        return Redirect::route('deliveries')->with('message', 'A new Delivery has been added.');
    }
    public function edit(Delivery $delivery)
{
    return view('deliveries.edit', compact('delivery'));
}


public function update(Delivery $delivery, Request $request)
{
    $request->validate([
        'customer_name'   => 'required',
        'items_ordered' => 'required',
        'total_amount'  => 'required|numeric',
        'phone'         => 'required',
    ]);

    $delivery->update([
        'customer_name' => $request->input('customer_name'),
        'items_ordered' => $request->input('items_ordered'),
        'total_amount'  => $request->input('total_amount'),
        'phone'         => $request->input('phone'),
    ]);

    return redirect('/deliveries')->with('message', "Delivery #$delivery->id has been updated");
}


    public function destroy(Delivery $delivery)
    {
    $delivery->delete();
    return redirect('/deliveries')->with('message', "Delivery #$delivery->id has been deleted successfully");
    }
}
