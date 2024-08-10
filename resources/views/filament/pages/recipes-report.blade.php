<x-filament::page>
    <div class="flex flex-col items-start space-y-4">
        <div class="w-full max-w-sm">
            {{ $this->form }}
        </div>
        <x-filament::button
                tag="a"
                href="{{ route('recipes-report.pdf', ['month' => $month]) }}"
                color="primary"
                class="whitespace-nowrap">
                Descargar PDF
        </x-filament::button>

        <div class="w-full">
            <x-filament::card>
                <div class="text-center">
                    <h2 class="text-xl font-bold">Recetas creadas en {{ Carbon\Carbon::parse($month)->translatedFormat('F Y') }}</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Título</th>
                                <th class="px-4 py-2">Categorías</th>
                                <th class="px-4 py-2">Usuario</th>
                                <th class="px-4 py-2">Likes</th>
                                <th class="px-4 py-2">Comentarios</th>
                                <th class="px-4 py-2">Calificaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recipes as $index => $recipe)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->recipe_title }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->categories }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->user_name }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->likes_count }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->comments_count }}</td>
                                    <td class="border px-4 py-2">{{ $recipe->ratings_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-filament::card>
        </div>
    </div>
</x-filament::page>
