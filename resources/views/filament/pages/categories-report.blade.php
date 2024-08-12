<x-filament::page>
    <div class="flex flex-col items-start space-y-4">
        <div class="w-full max-w-sm">
            {{ $this->form }}
        </div>

        @if ($categoryStats)
            <x-filament::button
                tag="a"
                href="{{ route('categories-report.pdf', ['categoryId' => $categoryId]) }}"
                color="primary"
                class="whitespace-nowrap mt-4">
                Descargar PDF
            </x-filament::button>

            <div class="w-full mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-filament::card>
                    <div>
                        <h2 class="text-xl font-bold">Recetas</h2>
                        <p class="text-2xl">{{ $categoryStats->recipes_count }}</p>
                    </div>
                </x-filament::card>
                <x-filament::card>
                    <div>
                        <h2 class="text-xl font-bold">Likes</h2>
                        <p class="text-2xl">{{ $categoryStats->likes_count }}</p>
                    </div>
                </x-filament::card>
                <x-filament::card>
                    <div>
                        <h2 class="text-xl font-bold">Comentarios</h2>
                        <p class="text-2xl">{{ $categoryStats->comments_count }}</p>
                    </div>
                </x-filament::card>
                <x-filament::card>
                    <div>
                        <h2 class="text-xl font-bold">Calificaciones</h2>
                        <p class="text-2xl">{{ $categoryStats->ratings_count }}</p>
                    </div>
                </x-filament::card>
            </div>

            <div class="w-full mt-8">
                <x-filament::card>
                    <div class="text-center">
                        <h2 class="text-xl font-bold">Recetas en la categoría {{ DB::table('categories')->where('id', $categoryId)->value('name') }}</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Título</th>
                                    <th class="px-4 py-2">Usuario</th>
                                    <th class="px-4 py-2">Fecha de creación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recipes as $index => $recipe)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $recipe->recipe_title }}</td>
                                        <td class="border px-4 py-2">{{ $recipe->user_name }}</td>
                                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($recipe->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-filament::card>
            </div>
        @else
        @endif
    </div>
</x-filament::page>
