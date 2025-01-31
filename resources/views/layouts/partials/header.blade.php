<nav x-data="{ open: false }" class="bg-black ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @livewire('draggable', ['menuLinks' => $menuLinks])
    </div>

</nav>