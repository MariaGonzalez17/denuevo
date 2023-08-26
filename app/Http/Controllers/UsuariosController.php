<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuario = Usuarios::paginate(10);
        return view('UsuariosIndex')->with('usuarios',$usuario);
    }

    public function create()
    {
        return view('UsuariosCreate');
    }

    public function store(Request $request)
    {
        $validados = $request->validate(
            [

                'nombre'=>'required|regex:/[A-Z][a-z]+/i',
                'correo_electronico'=>'required|unique:usuarios|Email',
            ]
        );

        $nuevoUsuario = new  Usuarios();
        $nuevoUsuario->nombre = $request->input('nombre');
        $nuevoUsuario->correo_electronico=$request->input('correo_electronico');

        if($nuevoUsuario->save()){
            $mensaje = " El Usuario se creo exitosamente";
        }else {
            $mensaje = "No se pudo crear el usuario, Intente nuevamente mas tarde";
        }

        return redirect()->route('usuario.index')->with('mensaje', $mensaje);
    }

    public function show(string $id)
    {
        $usuario = Usuarios::findOrfail($id);
        return view('UsuariosShow', compact('usuario'));
    }


    public function edit(string $id)
    {
        $usuario = Usuarios::findOrfail($id);
        return view('UsuariosEdit')->with('usuario',$usuario);
    }


    public function update(Request $request, string $id)
    {
        $usuario = Usuarios::findOrfail($id);

        $validados = $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',Rule::unique('usuarios')->ignore( $usuario->id),
            'correo_electronico'=>'required|unique:usuarios|Email',
        ]);

        $usuario->nombre = $request->input('nombre');
        $usuario->correo_electronico=$request->input('correo_electronico');



        if($usuario->save()){
            $mensaje = " El Usuario ". $usuario->nombre. " se edito exitosamente";
        }else {
            $mensaje = " No se pudo editar el Usuario ". $usuario->nombre ." Intente nuevamente mas tarde";
        }

        // Redirigir con mensaje de que se edito correctamente
        return redirect()->route('usuario.index')->with('mensaje', $mensaje);


    }

    public function destroy(string $id){
        Usuarios::destroy($id);

        return redirect('/usuarios')
            ->with('mensaje', 'Usuario Eliminado completamente');


    }
}
