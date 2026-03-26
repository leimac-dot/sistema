<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Muestra la lista de todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Guarda el nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|unique:usuarios,email',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', '¡Usuario creado correctamente!');
    }

    // Muestra los detalles de un usuario específico
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Muestra el formulario para editar un usuario existente
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualiza los datos en la base de datos
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|unique:usuarios,email,' . $usuario->id,
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', '¡Usuario actualizado correctamente!');
    }

    // Elimina un usuario de la base de datos
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', '¡Usuario eliminado correctamente!');
    }
}