<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\Tareas;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function buscar(Request $request)
    {
        $tareas = Tareas::where('nombre', 'like', '%'.$request->nombre.'%')->paginate(10);
        return view('TareasIndex', compact('tareas'));
    }


}
