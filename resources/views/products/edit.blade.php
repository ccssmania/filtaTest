<x-app-layout>
    <div class="h-full w-full flex justify-center items-center">
        <div class="container">
            @include('products.form', [ 'edit' => true])
        </div>
    </div>
</x-app-layout>