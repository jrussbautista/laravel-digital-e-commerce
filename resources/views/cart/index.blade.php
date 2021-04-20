<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($cart && $cart->products->count())
                @foreach($cart->products as $product)
                    <div class="p-6 bg-white border-b border-gray-200 mb-3">
                        <p>{{ $product->title }}</p>
                        <p>{{ $product->price }}</p>
                        <form action="{{ route('cart.products.destroy',  $product) }}" method="post" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </div>
                @endforeach
                <div class="mt-3">
                    <p>Total: {{ $cart->total() }}</p>
                    <x-button class="mt-3">
                        {{ __('Check Out') }}
                    </x-button>
                </div>
            @else
                <div> Your cart is empty </div>
            @endif
        </div>
    </div>
</x-app-layout>
