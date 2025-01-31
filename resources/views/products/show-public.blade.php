<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-6">Products</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg p-4">
                    @php
                        $imgUrl = $product->image ? asset('storage/' . $product->image) : '/images/default_product.jpg';
                    @endphp
                    <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md">
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($product->description, 50, '...') }}</p>
                        <p class="text-lg font-bold text-blue-600 mt-4">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>

    @if ($productOfTheDay)
        @php
            $imgUrl = $productOfTheDay->image ? asset('storage/' . $productOfTheDay->image) : '/images/default_product.jpg';
        @endphp
        <script>
            Swal.fire({
                title: "Product Of The Day",
                text: "{{ $productOfTheDay->name }}",
                position: "{{ $productOfTheDay->box_position }}",
                imageUrl: "{{ $imgUrl }}",
                imageWidth: 200,
                imageHeight: 100,
                imageAlt: "{{ $productOfTheDay->description }}"
            });

        </script>
    @endif
</x-app-layout>