@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página  Cursos </h1>
@endsection

@section('seccion')

@if(session('msj'))
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Curso.xRegistrarCurso') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('denCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Denominacion del curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('hrsCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Horas del curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('creCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Creditos del curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Años del curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Tipos de curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('plaCur')
            <div class="alert alert-dark alert-dismissible fade show" role="alert"">
                Estados  del curso es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <input type="text" name="denCur" placeholder="Denominación de Curso" value="{{ old('denCur')}}" class="form-control mb-1">
        <input type="number" name="hrsCur" placeholder="Horas" value="{{ old('hrsCur')}}" class="form-control mb-1">
        <input type="number" name="creCur" placeholder="Créditos" value="{{ old('creCur')}}" class="form-control mb-1">
        <input type="number" name="plaCur" placeholder="Año de plan de estudios" value="{{ old('plaCur')}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="transversal">Transversal</option>
            <option value="especialidad">Especialidad</option>
        </select>
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-warning mb-5" type="submit">Agregar</button>
    </form>

    
   

    <h3 class="btn btn-dark d-grid fs-5 mb-2 bt-2"> Lista de Cursos  </h3>
   
    <table class="table">
    <thead class="table-dark fs-9 mb-4 bt-2">
        <tr>
            <th scope="col">Id </th>
            <th scope="col">          </th>
            <th scope="col">Denominación</th>

            <th scope="col">Editar</th>

        </tr>
    </thead>
    <tbody class="table table-secondary table-striped">
        @foreach ($xCursos as $item) 
        <tr>
            <th scope="row">{{ $item->id}}</th>
            <td>{{ $item->codEst}}</td>
            <td>
                <a href="{{ route('Curso.xDetalleCurso' , $item->id)}}">
                {{ $item->denCur}}           
                </a>
            </td>
            <td>


                <form action="{{ route('Curso.xEliminarCurso', $item->id)}} "  method="post" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
                </form>

                <a class="btn btn-warning btn-sm" href="{{ route('Curso.xActualizarCurso' , $item->id)}}">
                Actualizar
                </a> 
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

@endsection