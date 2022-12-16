@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página lista </h1>
@endsection

@section('seccion')

    @if(session('msj'))
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('codEst')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                El código es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Los nombres es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @if($errors -> has('apeEst'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Los apellidos es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors -> has('apeEst'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                fecha de nacimiento  es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors -> has('apeEst'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Turno es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors -> has('apeEst'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Semestre es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors -> has('apeEst'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                Estado de Matricula  es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <input type="text" name="codEst" placeholder="Código" value="{{ old('codEst')}}" class="form-control mb-1">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ old('nomEst')}}" class="form-control mb-1">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ old('apeEst')}}" class="form-control mb-1">
        <input type="text" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ old('fnaEst')}}" class="form-control mb-1">
        <select name="turMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="1">Turno Día</option>
            <option value="2">Turno Noche</option>
            <option value="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-warning mb-2" type="submit">Agregar</button>
    </form>

    
   
    <h3 class="btn btn-secondary d-grid fs-5 mb-2">  Lista </h3>
   
    <table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Código</th>
            <th scope="col">Apellidos y Nombres</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody class="table table-secondary table-striped">
        @foreach ($xAlumnos as $item) 
        <tr>
            <th scope="row">{{ $item->id}}</th>
            <td>{{ $item->codEst}}</td>
            <td>
                <a href="{{ route('Estudiante.xDetalle' , $item->id)}}">
                {{ $item->apeEst}}, {{ $item->nomEst}}
                </a>
            </td>
            <td>


                <form action="{{ route('Estudiante.xEliminar', $item->id)}} "  method="post" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
                </form>

                <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar' , $item->id)}}">
                Actualizar
                </a> 
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
    
@endsection