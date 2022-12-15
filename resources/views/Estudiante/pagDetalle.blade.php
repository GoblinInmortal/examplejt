@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Detalle</h1>
@endsection

@section('seccion')
    
    <h3>Detalle</h3>
    <p> Id: {{$xDetAlumnos -> id }} </p>
    <p> Código  : {{$xDetAlumnos -> codEst }} </p>
    <p> Apellidos y nombres  : {{$xDetAlumnos -> apeEst }},{{$xDetAlumnos -> nomEst }}  </p>
    <p> Fecha Nacimiento   : {{$xDetAlumnos -> fnaEst }} </p>
    <p> Turno  : {{$xDetAlumnos -> turMat }} </p>
    <p> Semestre  : {{$xDetAlumnos -> semMat }} </p>
    <p> Estado de Matricula   : {{$xDetAlumnos -> estMat }} </p>

@endsection