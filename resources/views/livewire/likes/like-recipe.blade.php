<div class="absolute top-0 right-0 mt-2 mr-2">
    <button wire:click="toggleLike" class="flex items-center px-3 py-2 bg-secondary-100 border border-secondary-100 rounded-lg shadow focus:outline-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        @if ($isLiked)
            <x-bytesize-heart class="w-6 h-6 text-purple-700 fill-current" />
        @else
            <x-bytesize-heart class="w-6 h-6 text-purple-700" />
        @endif
        <span class="ml-2 text-purple-700 font-semibold text-sm">
            {{ $likesCount }}
        </span>
    </button>
</div>
