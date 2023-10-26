<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    
    public function indexA()
    {
        $customers = Customer::all();
        return view('customer.customersA', compact('customers'));

    }

    public function indexB()
    {
        $customers = Customer::all();
        return view('customer.customersB', compact('customers'));

    }

    

    public function create()
    {
        return view('customer.addcustomers');

    }
    public function createA()
    {
        return view('customer.addcustomersA');

    }
    public function createB()
    {
        return view('customer.addcustomersB');

    }

    public function storeA(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'store_id' => 'required',
            // Add other validation rules as needed
        ]);


        // Create a new customer with the validated data
        Customer::create($validatedData);

        // Redirect back to the customers list page with a success message
        return redirect()->route('customersA.indexA')->with('success', 'Customer added successfully');
    }

    public function storeB(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'store_id' => 'required',
            // Add other validation rules as needed
        ]);
    
       
    
        // Create a new customer with the validated data
        Customer::create($validatedData);
    
        // Redirect back to the customers list page with a success message
        return redirect()->route('customersB.indexB')->with('success', 'Customer added successfully');
    }
    

    public function editcustomers($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        return view('customer.editcustomers', compact('customer'));
    }

    public function editcustomersA($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.indexA')->with('error', 'Customer not found');
        }

        return view('customer.editcustomersA', compact('customer'));
    }

    public function editcustomersB($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.indexB')->with('error', 'Customer not found');
        }

        return view('customer.editcustomersB', compact('customer'));
    }

    public function deletecustomers($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }

    public function deletecustomersA($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customersA.indexA')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customersA.indexA')->with('success', 'Customer deleted successfully');
    }

    public function deletecustomersB($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customersB.indexB')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customersB.indexB')->with('success', 'Customer deleted successfully');
    }

    public function updatecustomers(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the customer by ID
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        // Update the customer's information with the validated data
        $customer->update($validatedData);

        // Redirect back to the customers list page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function updatecustomersA(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the customer by ID
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customersA.indexA')->with('error', 'Customer not found');
        }

        // Update the customer's information with the validated data
        $customer->update($validatedData);

        // Redirect back to the customers list page with a success message
        return redirect()->route('customersA.indexA')->with('success', 'Customer updated successfully');
    }

    public function updatecustomersB(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the customer by ID
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customersB.indexB')->with('error', 'Customer not found');
        }

        // Update the customer's information with the validated data
        $customer->update($validatedData);

        // Redirect back to the customers list page with a success message
        return redirect()->route('customersB.indexB')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        // Deletion logic here
    }
}
