<div class="container mx-auto flex align-center justify-between h-16" wire:sortable="updateGroupOrder" wire:sortable-group="updateLinkOrder">
    @foreach ($menuLinks as $rootLink)
        <div parent-id="{{ $rootLink->id }}" class="relative mt-4" x-data="{ open: true }"  @close.stop="open = false">
            <div @click="open = ! open" class="text-white">
                {{ $rootLink->name }}
            </div>
            <div x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute z-50 mt-2 w-48 rounded-md shadow-lg bg-white "
                    style="display: none;"
                    @click="open = false">
                <div wire:sortable-group.item-group="{{ $rootLink->id }}" class="rounded-md ring-1 ring-black ring-opacity-5">
                    @foreach ($rootLink->children->sortBy('order') as $link)
                        <a draggable="true" wire:key="link-{{ $link->id }}" wire:sortable-group.item="{{ $link->id }}" href="{{ route('menu-links', ['imageUrl' => "$rootLink->url"]) }}" class='block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300  transition duration-150 ease-in-out'>
                            {{ $link->name }}
                        </a>
                    @endforeach

                    @if ($rootLink->children->isEmpty())
                        <div>No links found</div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

</div>
