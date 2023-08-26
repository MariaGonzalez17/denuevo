@extends('plantillas.plantilla')

@section('titulo','index')

@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .pagination a:hover,
        .pagination a:focus {
            background-color: #f5f5f5;
        }

        .pagination .active a {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .pagination .disabled a {
            opacity: .5;
            pointer-events: none;
        }
    </style>


    <body>
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col text-right">

                    </div>
                </div>
            </div>
        </div>

    <h3>Tabla de Usuarios</h3>
    <td><u><a class="btn btn-outline-Info btn-lg" href="{{route('usuario.crear')}}" >Crear </a></u></td>

    <table class="table table-bordered border-info" class="pagination">
        <thead class= "table table-bordered border-info">
        <tr>

            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electronico</th>
        </tr>
        </thead>
        <tbody>
        @forelse($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->correo_electronico}}</td>
                <td><a class="btn btn-secondary btn-lg round" href="{{route('usuarios.show',['id'=>$usuario->id])}}">Ver</a></td>
                <td><a class="btn btn-secondary btn-lg round" href="{{route('usuarios.edit',['id'=>$usuario->id])}}">Editar</a></td>
                <td>

                <td>
                    <form  method="post" action="{{route('usuario.borrar',['id'=>$usuario->id])}}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Eliminar" class="btn btn-secondary btn-lg round">
                    </form>
                </td>

            </tr>
        @empty
            <tr><td colspan="3">No hay Usuarios</td></tr>
        @endforelse

        </tbody>
    </table>
    {{ $usuarios->render('pagination::bootstrap-4') }}
@endsection
