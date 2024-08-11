<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Categoría</title>
    <style>
        /* Estilos básicos para el PDF */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        header {
            margin-bottom: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .logo-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .logo-table td {
            border: none; /* Elimina los bordes de las celdas */
            vertical-align: middle;
        }

        .logo img {
            width: 60px; /* Ajusta el tamaño según sea necesario */
            height: auto;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #444;
            text-align: right; /* Alinea el texto a la derecha */
            padding-right: 15px; /* Espacio entre el texto y el borde derecho */
        }

        .title-container {
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin: 0;
            color: #444;
        }

        h3 {
            font-size: 20px;
            margin: 20px 0 10px;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f8f8f8;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <table class="logo-table">
            <tr>
                <td class="logo">
                    <img src="{{ public_path() . '/logo.png' }}" alt="Logo">
                </td>
                <td class="logo-text">
                    Recetero
                </td>
            </tr>
        </table>
        <div class="title-container">
            <h2>Reporte de Categoría</h2>
        </div>
    </header>

    <!-- Datos de la Categoría -->
    <div>
        <h3>Datos de la categoría</h3>
        <table>
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $categoryName }}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td>{{ $categoryDescription }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Estadísticas de la Categoría -->
    <div>
        <h3>Estadísticas</h3>
        <table>
            <tbody>
                <tr>
                    <th>Recetas</th>
                    <td>{{ $categoryStats->recipes_count }}</td>
                </tr>
                <tr>
                    <th>Likes</th>
                    <td>{{ $categoryStats->likes_count }}</td>
                </tr>
                <tr>
                    <th>Comentarios</th>
                    <td>{{ $categoryStats->comments_count }}</td>
                </tr>
                <tr>
                    <th>Calificaciones</th>
                    <td>{{ $categoryStats->ratings_count }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Recetas de la Categoría -->
    <div style="margin-top: 30px;">
        <h3>Recetas en esta categoría</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Usuario</th>
                    <th>Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $index => $recipe)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $recipe->recipe_title }}</td>
                        <td>{{ $recipe->user_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($recipe->created_at)->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        Reporte generado el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i') }}
    </footer>

</body>
</html>
