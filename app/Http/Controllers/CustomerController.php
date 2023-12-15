<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function createOrderForCustomer()
    {
        $customers = Customer::all(); 

        return view('customers.create_order', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $customer = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    return redirect('/customers')->with('message', "$customer->name has been added.");
    }



    

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $customer->update($request->all());
        return redirect('/customers')->with('message', "$customer->name has been updated");
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers')->with('message', "$customer->name has been deleted successfully");
    }
}