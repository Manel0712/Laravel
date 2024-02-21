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
    </ul>
</body>
</html>