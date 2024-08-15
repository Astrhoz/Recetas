<div class="mt-6">
    <h2 class="text-2xl font-semibold mb-4 text-secondary-900">Comentarios</h2>

    <!-- Formulario para agregar un nuevo comentario -->
    <div class="mb-4">
        <textarea wire:model="newComment" class="w-full p-3 border border-secondary-300 rounded-lg focus:outline-none focus:ring focus:border-purple-300" rows="2" placeholder="Escribe tu comentario aquí..."></textarea>
        <div class="flex justify-end">
            <button wire:click="addComment" class="mt-2 px-4 py-2 bg-secondary-800 text-white rounded-lg hover:bg-secondary-900">Agregar Comentario</button>
        </div>
        @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Lista de comentarios -->
    <div class="space-y-4">
        @forelse($comments as $comment)
            <div class="p-4 bg-secondary-50 shadow rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        @if($comment->users->profile_photo_path)
                            <img src="{{ asset('storage/' . $comment->users->profile_photo_path) }}" alt="{{ $comment->users->name }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <!-- Mostrar las iniciales en un círculo -->
                            <div class="w-10 h-10 rounded-full bg-purple-200 flex items-center justify-center text-secondary-800 text-lg font-semibold">
                                {{ strtoupper(substr($comment->users->name, 0, 1)) }}{{ strtoupper(substr($comment->users->name, strpos($comment->users->name, ' ') + 1, 1)) }}
                            </div>
                        @endif
                        <div>
                            <p class="text-secondary-900 font-semibold">{{ $comment->users->name }}</p>
                            <p class="text-sm text-secondary-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if ($comment->user_id === Auth::id())
                        <div class="flex space-x-2">
                            <button wire:click="startEditing({{ $comment->id }})" class="text-secondary-800 hover:text-secondary-900">
                                <x-bytesize-edit class="w-6 h-6"/>
                            </button>
                            <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 hover:text-red-700">
                                <x-bytesize-trash class="w-6 h-6"/>
                            </button>
                        </div>
                    @endif
                </div>
                @if($editingCommentId === $comment->id)
                    <div class="mt-2">
                        <textarea wire:model="editingCommentContent" class="w-full p-3 border border-secondary-300 rounded-lg focus:outline-none focus:ring focus:border-purple-300" rows="2"></textarea>
                        <div class="mt-2 flex space-x-2">
                            <button wire:click="updateComment" class="px-4 py-2 bg-secondary-800 text-white rounded-lg hover:bg-secondary-900">Guardar</button>
                            <button wire:click="cancelEditing" class="px-4 py-2 bg-secondary-500 text-white rounded-lg hover:bg-secondary-600">Cancelar</button>
                        </div>
                        @error('editingCommentContent') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                @else
                    <p class="mt-2 text-secondary-900">{{ $comment->content }}</p>
                @endif
            </div>
        @empty
            <p class="text-secondary-900">No hay comentarios aún. ¡Sé el primero en comentar!</p>
        @endforelse
    </div>
</div>
