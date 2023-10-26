<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\books;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $books = books::all();
        return view('orders.orders', compact('customers', 'books'));
    }

    public function indexA()
    {
        $customers = Customer::all();
        $books = books::all();
        return view('orders.ordersA', compact('customers', 'books'));
    }

    public function indexB()
    {
        $customers = Customer::all();
        $books = books::all();
        return view('orders.ordersB', compact('customers', 'books'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'store_id' => 'required',
            
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index');
    }

    public function storeA(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'store_id' => 'required', // Ensure the store_id is provided
        ]);
    
        $validatedData['store_id'] = 1; // Set 'store_id' explicitly to 1
    
        Order::create($validatedData);
    
        return redirect()->route('ordersA.indexA');
    }
    
    public function storeB(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'store_id' => 'required', // Ensure the store_id is provided
        ]);
    
        $validatedData['store_id'] = 2; // Set 'store_id' explicitly to 2
    
        Order::create($validatedData);
    
        return redirect()->route('ordersB.indexB');
    }


    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function showA(Order $order)
    {
        return view('orders.showA', compact('order'));
    }

    public function showB(Order $order)
    {
        return view('orders.showB', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index');
    }

    public function addOrder(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
        ]);

        // Tambahkan data ke tabel 'orders'
        $order = Order::create([
            'customer_id' => $request->input('customer_id'),
            'order_date' => now(),
        ]);

        // Proses detail pesanan
        $orderDetails = $request->input('order_details');

        if ($orderDetails) {
            foreach ($orderDetails as $detail) {
                // Dapatkan harga buku dari database berdasarkan book_id
                $book = books::find($detail['book_id']);
                $bookPrice = $book->book_price;

                // Hitung subtotal berdasarkan harga buku dan jumlah yang dipesan
                $subtotal = $bookPrice * $detail['book_qty'];

                OrderDetail::create([
                    'order_id' => $order->id,
                    'book_id' => $detail['book_id'],
                    'book_qty' => $detail['book_qty'],
                    'subtotal' => $subtotal,
                ]);
            }
        }

        // Redirect atau tindakan lain setelah berhasil menyimpan pesanan
        return redirect()->route('orders.index')->with('success', 'Order added successfully');
    }

    public function addOrderA(Request $request)
    {
        // Validate data as needed
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'store_id' => 'required', // Validate the store_id if needed
        ]);
    
        // Create a new order with 'store_id' taken from the hidden input field
        $order = Order::create([
            'customer_id' => $request->input('customer_id'),
            'order_date' => now(),
            'store_id' => $request->input('store_id'), // Take the value from the hidden input field
        ]);
    
        // Process order details
        $orderDetails = $request->input('order_details');
    
        if ($orderDetails) {
            foreach ($orderDetails as $detail) {
                // Get book price from the database based on book_id
                $book = books::find($detail['book_id']);
                $bookPrice = $book->book_price;
    
                // Calculate subtotal based on book price and quantity ordered
                $subtotal = $bookPrice * $detail['book_qty'];
    
                // Set the store_id for order details to be the same as the order's store_id
                OrderDetail::create([
                    'order_id' => $order->id,
                    'book_id' => $detail['book_id'],
                    'book_qty' => $detail['book_qty'],
                    'subtotal' => $subtotal,
                ]);
            }
        }
    
        return redirect()->route('ordersA.indexA')->with('success', 'Order added successfully');
    }
    
    public function addOrderB(Request $request)
    {
        // Validate data as needed
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'store_id' => 'required', // Validate the store_id if needed
        ]);
    
        // Create a new order with 'store_id' taken from the hidden input field
        $order = Order::create([
            'customer_id' => $request->input('customer_id'),
            'order_date' => now(),
            'store_id' => $request->input('store_id'), // Take the value from the hidden input field
        ]);
    
        // Process order details
        $orderDetails = $request->input('order_details');
    
        if ($orderDetails) {
            foreach ($orderDetails as $detail) {
                // Get book price from the database based on book_id
                $book = books::find($detail['book_id']);
                $bookPrice = $book->book_price;
    
                // Calculate subtotal based on book price and quantity ordered
                $subtotal = $bookPrice * $detail['book_qty'];
    
                // Set the store_id for order details to be the same as the order's store_id
                OrderDetail::create([
                    'order_id' => $order->id,
                    'book_id' => $detail['book_id'],
                    'book_qty' => $detail['book_qty'],
                    'subtotal' => $subtotal,
                ]);
            }
        }
    
        return redirect()->route('ordersB.indexB')->with('success', 'Order added successfully for store B');
    }
    
    
    




}
