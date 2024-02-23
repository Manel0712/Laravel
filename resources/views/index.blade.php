<!DOCTYPE html>
<html>
<head>
    <title>Llista de Productes</title>
</head>
<body>
    <h1>Llista de Productes</h1>
    <ul>
        @foreach ($productes as $producte)
            @if ($producte->estoc > 0)
                <li>{{ $producte->nom }} - Estoc: {{ $producte->estoc }}
                    <form action="{{ route('productes.edit', ['id' => $producte->id]) }}" method="GET">
                        @csrf
                        <button type="submit">Editar Producto</button>
                    </form>
                    <form method="POST" action="{{ route('productes.incrementStock', ['id' => $producte->id]) }}">
                        @csrf
                        <button type="submit">Incrementar Estoc</button>
                    </form>
                    <form method="POST" action="{{ route('productes.decrementStock', ['id' => $producte->id]) }}">
                        @csrf
                        <button type="submit">Disminuir Estoc</button>
                    </form>
                    <form action="{{ route('productes.destroy', ['id' => $producte->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar Producto</button>
                    </form>
                </li>
            @endif
        @endforeach
        <form action="{{ route('productes.create') }}" method="GET">
            @csrf
            <button type="submit">Crear Producto</button>
        </form>
    </ul>
</body>
</html>
https://github.com/Manel0712/Laravel.git