<x-app-layout>
    <div class="h-full w-full flex justify-center items-center">
        <div class="container">
            @include('products.form', ['product' => null, 'edit' => false])
        </div>
    </div>
</x-app-layout>