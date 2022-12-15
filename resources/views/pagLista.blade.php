@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Lista</h1>
@endsection

@section('seccion')
    <h3>Lista</h3>


    <table class="table">
    <thead class= "table-dark">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Codigo</th>
        <th scope="col">Nombres y Apellidos</th>
        <th scope="col">Editar</th>
        </tr>
    </thead>


    <tbody>

        @foreach ($xAlumnos as $item)
        <tr>
            <th scope="row">{{ $item->id}}</th>
            <td>{{ $item->codEst}}</td>
            <td>{{ $item->nomEst}}, {{ $item->apeEst}}</td>
            <td>@mdo</td>
        </tr>
        @endforeach

    </tbody>
    </table>

     
@endsection