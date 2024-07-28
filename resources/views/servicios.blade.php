@extends('layout')

@section('title', 'Servicio')

@section('content')
    <tr>
        @auth
            <td colspan="4">
                <a href="{{ route('servicios.create') }}">Nuevo Servicio</a><br>
            </td>
        @endauth

    </tr>
    <tr>
        <th colspan="4">Listado de Servicios</th><br>
    </tr>

    @if ($servicios)
        @foreach ($servicios as $servicio)
            <tr>
                <td>
                    @if ($servicio->image)
                        {{-- <img src="storage/{{ $servicio->image }}" alt="{{ $servicio->titulo }}" width="50" height="50"> --}}
                        <img src="{{ asset('storage/' . $servicio->image) }}" alt="{{ $servicio->titulo }}" width="50"
                            height="50">
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <a href="{{ route('servicios.show', $servicio) }}">{{ $servicio->titulo }}</a>
                </td>
            </tr><br>
        @endforeach
    @else
        <li>No existe ningun servicios</li>
    @endif




@endsection
