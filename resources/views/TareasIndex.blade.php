@extends('plantillas.plantilla')

@section('titulo','index')

@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif



    <h1><center><u>Gestión De Tareas</u></center></h1>
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


    <form method="GET" action="{{ route('tareas.buscar') }}">
        <div class="input-group mb-3">
            <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre">
            <div class="input-group-append">
                <button class="btn btn-secondary btn-lg round" type="submit">Buscar</button>
            </div>
        </div>
    </form>




    <h3>Tabla de Tareas</h3>
    <td><u><a class="btn btn-outline-Info btn-lg" href="{{route('tarea.crear')}}" >Crear </a></u></td>

    <table class="table table-bordered border-info" class="pagination">
        <thead class="table table-bordered border-info">
        <tr>

            <center><th scope="col">id</th></center>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha de Inicio</th>
            <center> <th scope="col">Fecha de Finalizacion</th></center>
            <th scope="col">Id de Proyecto</th>
            <th scope="col">Id de Usuario</th>



        </tr>
        </thead>
        <tbody>
        @forelse($tareas as $tarea)
            <tr>
                <th scope="row">{{$tarea->id}}</th>
                <td>{{$tarea->nombre}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->estado}}</td>
                <td>{{$tarea->fecha_inicio}}</td>
                <td>{{$tarea->fecha_fin}}</td>
                <td>{{$tarea->proyecto_id}}</td>
                <td>{{$tarea->usuario_id}}</td>


                <td><a class="btn btn-secondary btn-lg round" href="{{route('tareas.show', ['id'=>$tarea->id])}}">Ver</a></td>


                <td><a class="btn btn-secondary btn-lg round" href="{{route('tareas.edit', ['id'=>$tarea->id])}}">Editar</a></td>
                <td>

                <td>
                    <form  method="post" action="{{route('tarea.borrar',['id'=>$tarea->id])}}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Eliminar" class="btn btn-secondary btn-lg round">
                    </form>
                </td>

            </tr>
        @empty
            <tr><td colspan="3">No hay Tareas</td></tr>
        @endforelse

        </tbody>
    </table>
    {{ $tareas->render('pagination::bootstrap-4') }}
@endsection
