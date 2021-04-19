<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1>{{ $product->title }}</h1>
                            <p> {{ $product->price }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
