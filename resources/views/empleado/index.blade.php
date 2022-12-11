@extends('layouts.app')
@section('content')
<div class="container">

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            {{--  No me pincha   --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" data-bs-target="#my-alert" aria-label="Close">
            <span aria-hidden="true" >  </span>
            </button>
        </div>
    @endif
    



<a href="{{ url('empleado/create') }}" class="btn btn-success"> Registrar nuevo empleado </a>
<br>
<br>
<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($empleados as $empleado )
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>
            <img class="img-thumbnail img-fluid border border-5" src="{{ asset('storage').'/'.$empleado->Foto }}" width="150" alt="">    
            {{ $empleado->Foto }}
            </td>

            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>
            
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                        Editar
                </a>
                 |
            {{--  Boton de Borrado  --}}
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="POST" class="d-inline">
                    @csrf
                  {{--  Se utiliza esta linea de codigo para convertir el metodo de post a delete  --}}
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection