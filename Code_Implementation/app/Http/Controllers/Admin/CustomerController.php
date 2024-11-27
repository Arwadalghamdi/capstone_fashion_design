<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $customers = Customer::paginate(30);
        return view('admin.customers.index', compact('customers'));
    }

    // Display the specified resource.
    public function show(Customer $customer)
    {
        $item = $customer;
        return view('admin.customers.show', compact('customer', 'item'));
    }

    // Remove the specified resource from storage.
    public function destroy(Customer $customer)
    {
        return redirect()->route('admin.customers.index')->with('success', 'You have delete successfully.');
    }
}
