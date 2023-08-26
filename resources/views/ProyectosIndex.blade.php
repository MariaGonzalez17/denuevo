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

         .pagination {
             display: flex;
             justify-content: center;
             align-items: center;
             margin-top: 20px;
         }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            color: #333;
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

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            color: #333;
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

        

        <h3>Tabla de Proyectos</h3>
    <td><u><a class="btn btn-secondary btn-lg round" href="{{route('proyecto.crear')}}" >Crear </a></u></td>


    <table class="table table-bordered border-info" class="pagination">
        <thead class="table table-bordered border-info ">
        <tr>

            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Finalizacion</th>

        </tr>
        </thead>
        <tbody>
        @forelse($proyectos as $proyecto)
            <tr>
                <th scope="row">{{$proyecto->id}}</th>
                <td>{{$proyecto->nombre}}</td>
                <td>{{$proyecto->descripcion}}</td>
                <td>{{$proyecto->fecha_inicio}}</td>
                <td>{{$proyecto->fecha_fin}}</td>
                <td><a class= "btn btn-secondary btn-lg round" href="{{route('proyectos.show',['id'=>$proyecto->id])}}">Ver</a></td>
                <td><a class="btn btn-secondary btn-lg round" href="{{route('proyectos.edit',['id'=>$proyecto->id])}}">Editar</a></td>
                <td>

                <td>
                    <form  method="post" action="{{route('proyectos.borrar',['id'=>$proyecto->id])}}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Eliminar" class="btn btn-secondary btn-lg round">
                    </form>
                </td>

            </tr>
        @empty
            <tr><td colspan="3">No hay Proyectos</td></tr>
        @endforelse

        </tbody>
    </table>
    {{ $proyectos->render('pagination::bootstrap-4') }}
@endsection
