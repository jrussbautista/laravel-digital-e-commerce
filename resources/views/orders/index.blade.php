<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($orders->count())
                @foreach($orders as $order)
                    <div class="p-6 bg-white border-b border-gray-200 mb-3">
                        <p> Order #: {{ $order->id }}</p>
                        <p> Items </p>
                    @foreach($order->products as $product)
                        <div class="mb-2">
                            <p>{{ $product->title }}</p>
                            <p>@money($product->price)</p>
                            <a href="{{ route('products.downloads.show', $product) }}" class="text-indigo-500"> Download </a>
                        </div>
                    @endforeach
                        <div>
                            Total: @money($order->total())
                        </div>
                    </div>
                @endforeach
            @else
                <div> Your orders is empty </div>
            @endif
        </div>
    </div>
</x-app-layout>
