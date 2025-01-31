<x-guest-layout >

    <div class="h-4/5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full flex justify-center items-center">
            @if ($imageUrl)
                <img src="{{ '/images/' . $imageUrl }}" class="max-h-48" alt="url">
            @endif
        </div>
    </div>

</x-guest-layout> 