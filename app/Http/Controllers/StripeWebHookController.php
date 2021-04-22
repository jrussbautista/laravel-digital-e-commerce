<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController;

class StripeWebHookController extends WebhookController
{
    public function handleCheckoutSessionCompleted($payload) {
        if($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {


            $cart = $user->cart;

            $order = $user->orders()->create();

            $order->products()->attach($cart->products);

            $cart->fresh()->delete();


        }
    }
}
