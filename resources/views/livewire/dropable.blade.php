<div>
    @foreach ($items as $link)
        <a draggable="true" drag-order={{ $link->order }} drag-item="{{ $link->id }}" class='block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300  transition duration-150 ease-in-out'>
            {{ $link->name }}
        </a>
    @endforeach
</div>
