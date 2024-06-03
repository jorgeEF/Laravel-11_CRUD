<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubro;

class RubroController extends Controller
{
    public function index()
    {
        $rubros = Rubro::all();
        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        return view('rubros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:rubros|max:255',
            'descripcion' => 'max:255',
        ]);

        Rubro::create($validated);

        return redirect()->route('rubros.index')->with('message', 'Rubro creado con éxito');
    }

    public function show(Rubro $rubro)
    {
        return view('rubros.show', compact('rubro'));
    }

    public function edit(Rubro $rubro)
    {
        return view('rubros.edit', compact('rubro'));
    }

    public function update(Request $request, Rubro $rubro)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:rubros,nombre,'.$rubro->id.'|max:255',
            'descripcion' => 'max:255',
        ]);

        $rubro->update($validated);

        return redirect()->route('rubros.index')->with('message', 'Rubro actualizado con éxito');
    }

    public function destroy(Rubro $rubro)
    {
        $rubro->delete();

        return redirect()->route('rubros.index')->with('message', 'Rubro eliminado con éxito');
    }
}
