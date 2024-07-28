@extends('layout')

@section('title', 'Servicio | ' . $servicio->titulo)

@section('content')

    <tr>
        <td>
            <img src="{{ asset('storage/' . $servicio->image) }}" alt="{{ $servicio->titulo }}" width="100" height="100">
        </td>
    </tr>
    <tr>
        <td colspan="4">{{ $servicio->descripcion }}</td>
    </tr>
    <tr>
        <td colspan="4">{{ $servicio->create_at }}</td>
    </tr>
    <tr>
        <td colspan="4">{{ $servicio->updated_at }}</td>
    </tr>
    @auth
        <tr>
            <td colspan="4">{{ $servicio->titulo }}
                <a href="{{ route('servicios.edit', $servicio) }}">Editar</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <form action="{{ route('servicios.destroy', $servicio) }}", method="POST">
                    @csrf @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
    @endauth

@endsection
