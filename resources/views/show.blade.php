@extends('layout')

@section('title', 'Servicio | ' . $servicio->titulo)

@section('content')

<tr>
    <td colspan="4">{{$servicio->titulo}}</td>
</tr>
<tr>
    <td colspan="4">{{$servicio->descripcion}}</td>
</tr>


@endsection