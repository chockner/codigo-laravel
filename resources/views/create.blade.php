@extends('layout')

@section('title', 'Crear Servicio')

@section('content')
    <table cellpadding="3" cellspaceing=#5>
        <tr>
            <th colspan="4">Crear nuevo servicio</th>
        </tr>
        {{-- @include('partials.validation-errors') --}}
        <form action="{{ route('servicios.store') }}" method="post" enctype="multipart/form-data">
            @include('partials.form', ['btnTextl' => 'Guardar'])
            @csrf
            <tr>
                <th>Titulo</th>
                <td><input type="text" name="titulo"></td>
                @error('titulo')
                    {{ $message }}<br>
                @enderror
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><input type="text" name="descripcion"></td>
                @error('descripcion')
                    {{ $message }}
                @enderror
            </tr>
            <tr>
                <td colspan="2" align="center"><button>Guardar</button></td>
            </tr>
        </form>
    </table>
@endsection
