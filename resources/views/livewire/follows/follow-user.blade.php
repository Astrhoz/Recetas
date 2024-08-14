<!-- Botón de Seguir/Dejar -->
<div>
    @if ($following)
        <!-- Si el usuario ya sigue, mostrar el botón "Dejar de seguir" -->
        <button wire:key="unfollow-{{$userId}}-{{$toFollowUserId}}" wire:click="unfollow"
            class="text-red-500 border border-red-500/90 focus:outline-none focus:ring-1 focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2 transition-all duration-300 ease-in-out transform hover:bg-red-700/80 hover:text-white/90">
            Dejar de seguir
        </button>
    @else
        <!-- Si el usuario no sigue, mostrar el botón "Seguir" -->
        <button wire:key="follow-{{$userId}}-{{$toFollowUserId}}" wire:click="follow"
            class="text-white bg-secondary-400 hover:bg-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-200 font-medium rounded-lg text-xs px-4 py-2 transition-all duration-300 ease-in-out transform hover:scale-105">
            Seguir
        </button>
    @endif
</div>
