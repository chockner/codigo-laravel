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
        <div class="container">
            <div class="row">
                @foreach ($servicios as $servicio)
                    <div class="col-md-3 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="storage/{{ $servicio->image }}" class="card-img-top" alt="{{ $servicio->titulo }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $servicio->titulo }}</h5>
                                <p class="card-text">{{ $servicio->descripcion }}</p>
                                <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <li>No existe ningun servicios</li>
    @endif




@endsection
