<!-- resources/views/livewire/follows/following.blade.php -->
<div class="p-4">
    @if($followingUsers->isEmpty())
        <!-- Mensaje para cuando el usuario no sigue a nadie -->
        <div class="text-center text-secondary-500">
            <p class="text-lg font-medium">No sigues a ningún usuario.</p>
            <p class="text-sm mt-2">Empieza a seguir a otros usuarios para ver sus actualizaciones aquí.</p>
        </div>
    @else
        <!-- Lista de usuarios seguidos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($followingUsers as $user)
                <div class="flex flex-col bg-secondary-200/60 rounded-md shadow p-4">
                    <div class="flex items-center gap-4 mb-3">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <!-- Foto de perfil del usuario -->
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                            </div>
                        @else    
                            <!-- Nombre del usuario en lugar de foto de perfil -->
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-secondary-500 bg-white">
                                    {{ $user->name }}
                                </span>
                            </div>
                        @endif
                        <div class="flex-grow">
                            <h4 class="text-lg font-semibold text-secondary-900">{{ $user->name }}</h4>
                            <p class="text-sm text-muted-foreground text-secondary-900/70">@<span>{{ $user->name }}</span></p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        @livewire('follows.follow-user', ['toFollowUserId' => $user->id])
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
