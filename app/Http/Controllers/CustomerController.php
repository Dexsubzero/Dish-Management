<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer =customer::all();
        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $menu = Customer::create($validate);
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($customer);
    }
     

    /**
     * Display the specified resource.
     */ 
    public function show(Customer $customer)
    {
        return response()->json($customer);
         return view('customer.show', compact('customer'));
         return view('customer.show', ['customer' => $customer]);
         return view('customer.show', compact('customer'));
         return view('customer.show', ['customer' => $customer]);
         return view('customer.show', compact('customer'));
         return view('customer.show', ['customer' => $customer]);
               
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return response()->json($customer);
         return view('customer.edit', compact('customer'));
         return view('customer.edit', ['customer' => $customer]);
                                                                                                                             
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $customer->update($validate);
        return response()->json($customer);
         return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Menu deleted successfully']);
    }
}
