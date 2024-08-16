<div class="mt-4 flex flex-col items-center">
    <p class="text-secondary-900 font-semibold mb-2">¿Te gustó esta receta? ¡Califícala!</p>
    <div class="flex items-center">
        @for ($i = 1; $i <= 5; $i++)
            <button wire:click="rate({{ $i }})" class="focus:outline-none">
                @if ($i <= $rating)
                    <x-bytesize-star class="w-8 h-8 text-yellow-500 fill-current" />
                @else
                    <x-bytesize-star class="w-8 h-8 text-gray-400" />
                @endif
            </button>
        @endfor
    </div>
    @if ($userRating)
        <span class="mt-2 text-secondary-900">Tu calificación: {{ $userRating }} / 5</span>
    @endif
</div>
