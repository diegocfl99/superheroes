<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    // Mostrar todos los superhéroes
    public function index()
    {
        $superheroes = Superhero::all();

        return view('superheroes.index', compact('superheroes'));
    }

    // Mostrar formulario de registro
    public function create()
    {
        return view('superheroes.create');
    }

    // Guardar nuevo superhéroe
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_real' => 'required|max:100',
            'nombre_heroe' => 'required|max:100',
            'foto_url' => 'nullable|url',
            'informacion' => 'nullable'
        ]);

        Superhero::create($validatedData);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe registrado correctamente.');
    }

    // Mostrar información de un superhéroe
    public function show($id)
    {
        $superhero = Superhero::findOrFail($id);

        return view('superheroes.show', compact('superhero'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id);

        return view('superheroes.edit', compact('superhero'));
    }

    // Actualizar información
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre_real' => 'required|max:100',
            'nombre_heroe' => 'required|max:100',
            'foto_url' => 'nullable|url',
            'informacion' => 'nullable'
        ]);

        Superhero::whereId($id)->update($validatedData);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado correctamente.');
    }

    // Eliminar superhéroe
    public function destroy($id)
    {
        $superhero = Superhero::findOrFail($id);

        $superhero->delete();

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado correctamente.');
    }
}
