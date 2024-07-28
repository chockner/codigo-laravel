@extends('layout')

@section('title', 'Editar Servicio')


@section('content')
    <table cellpadding="3" cellspaceing="5">
        @auth
            <tr>
                <th colspan="4">Editar Servicio</th>
            </tr>
        @endauth


        <form action="{{ route('servicios.update', $servicio->id) }}" method="post" enctype="multipart/form-data">
            @include('partials.form', ['btnText' => 'Actualizar'])>
            @csrf @method('PUT')
            <tr>
                <th>Titulo</th>
                <td><input type="text" name="titulo" value="{{ old('titulo', $servicio->titulo) }}"></td>
                @error('titulo')
                    {{ $message }}<br>
                @enderror
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><input type="text" name="descripcion" value="{{ old('descripcion', $servicio->descripcion) }}"></td>
                @error('descripcion')
                    {{ $message }}
                @enderror
            </tr>
            <tr>
                <td colspan="2" align="center"><button>Actualizar</button></td>
            </tr>
        </form>
    </table>
@endsection
