<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailsController extends Controller
{
    public function showA($id)
    {
        $order = Order::find($id);

        if ($order) {
            $totalAmount = $order->orderDetails->sum(function ($detail) {
                return $detail->book_qty * $detail->book->book_price;
            });

            return view('orders.orderdetailsA', compact('order', 'totalAmount'));
        } else {
            // Handle the case where the order doesn't exist
            return redirect()->route('orderdetailsA.indexA')->with('error', 'Order not found.');
        }
    }

    public function showB($id)
    {
        $order = Order::find($id);

        if ($order) {
            $totalAmount = $order->orderDetails->sum(function ($detail) {
                return $detail->book_qty * $detail->book->book_price;
            });

            return view('orders.orderdetailsB', compact('order', 'totalAmount'));
        } else {
            // Handle the case where the order doesn't exist
            return redirect()->route('orderdetailsB.indexB')->with('error', 'Order not found.');
        }
    }
}
