<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderListController extends Controller
{
    public function indexA()
    {
        // Retrieve orders with associated order details where store_id is 1
        $orders = Order::with('orderDetails')
            ->whereHas('orderDetails', function ($query) {
                $query->where('store_id', 1); // Filter by store_id = 1
            })
            ->get();

        return view('orders.orderlistA', compact('orders'));
    }

    public function indexB()
    {
        // Retrieve orders with associated order details where store_id is 2
        $orders = Order::with('orderDetails')
            ->whereHas('orderDetails', function ($query) {
                $query->where('store_id', 2); // Filter by store_id = 2
            })
            ->get();

        return view('orders.orderlistB', compact('orders'));
    }


}
