<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    public function store(Request $request)
    {   

        $item = $request -> all();

        $insert = Customer::create($item);
        if ($insert) {
            Alert::success('Success', 'Succesfully Add New Customer');
        }

        return Redirect()->route('add.customer');

    }

    public function customersData()
    {
        $customers = Customer::all();
        return view('Admin.all_customers', compact('customers'));
    }

    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        return view('Admin.edit_customer', compact('customers'));
    }
    
    public function update(Request $request,$id)
    {
        $customer = $request->all();
        $customers = Customer::findOrFail($id);
        $customers->update($customer);
        return redirect()->route('all.customers')->with('success', 'Customer Was Successfully Edited');
        
    }

    public function destroy($id) 
    {   
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('all.customers')->withSuccess('User Was Deleted');
    }
    
    
}
