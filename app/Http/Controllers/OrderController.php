<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request) {

        $orders = $request->user()->orders()->with('products')->get();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }
}
