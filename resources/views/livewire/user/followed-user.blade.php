<div class="flex items-center gap-4">
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <!-- Foto de perfil del usuario -->
        <div class="flex text-sm border-2 border-transparent rounded-full bg-secondary-300 transition">
            <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
        </div>
    @else    
        <!-- Nombre del usuario en lugar de foto de perfil -->
        <span class="inline-flex rounded-md">
            <div class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-secondary-500 bg-white">
                {{ $user->name }}
            </div>
        </span>
    @endif
    <div>
        <h4 class="text-xl font-semibold text-secondary-900">{{ $user->name }}</h4>
        <p class="text-sm text-muted-foreground text-secondary-900/70">@<span>{{ $user->name }}</span></p>
    </div>

    <!-- Botón para seguir/dejar de seguir al usuario -->
    <div>
        @if($isFollowing)
            <button wire:click="unfollowUser" class="text-white bg-secondary-600 hover:bg-secondary-700 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                Siguiendo
            </button>
        @else
            <button wire:click="followUser" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                Seguir
            </button>
        @endif
    </div>
</div>
