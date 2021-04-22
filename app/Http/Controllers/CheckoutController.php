<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)  {

        $cart = Cart::bySession()->first();

        $checkout = $request->user()->checkout($cart->products->pluck('stripe_id')->toArray(), [
            'cancel_url' => route('cart.index'),
            'success_url' => route('orders.index')
        ]);

        return view('checkout.index', ['checkout' => $checkout]);
    }
}
