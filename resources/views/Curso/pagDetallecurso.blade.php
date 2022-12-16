@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página Detalle de Curso </h1>
@endsection

@section('seccion')
    <h3> Detalles </h3>
    <p> Denominación de curso :        {{ $xDetCurso -> denCur}} </p>
    <p> Horas del curso :              {{ $xDetCurso -> hrsCur}} </p>
    <p> Créditos de cruso :            {{ $xDetCurso -> creCur}} </p>
    <p> Año de plan de Estudios :      {{ $xDetCurso -> plaCur}} </p>
    <p> Tipo de Curso :                {{ $xDetCurso -> tipCur}} </p>
    <p> Estado del curso:              {{ $xDetCurso -> estCur}} </p>
   
@endsection