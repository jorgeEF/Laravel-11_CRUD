<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresa;
use App\Models\Rubro;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', ['empresas' => $empresas]);
    }

    public function show($id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            abort(404);
        }

        return view('empresas.show', ['empresa' => $empresa]);
    }

    public function create()
    {
        $rubros = Rubro::all();
        return view('empresas.create', compact('rubros'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresas,cuit',
            'email' => 'required|email|unique:empresas',
            'rubros' => 'array',
            'rubros.*' => 'exists:rubros,id'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empresa = Empresa::create($request->only(['razon_social', 'nombre_fantasia', 'cuit', 'email', 'estado']));

        if ($request->has('rubros')) {
            $empresa->rubros()->sync($request->input('rubros'));
        }

        if (!$empresa) {
            redirect()->route('empresas.index')->with('message', 'Error al crear la empresa');
        }
        return redirect()->route('empresas.index')->with('message', 'La empresa fue creada con éxito');
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('empresas.index')->with('message', 'Empresa no encontrada.');
        }

        $rubros = Rubro::all();

        return view('empresas.edit', ['empresa' => $empresa, 'rubros' => $rubros]);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('empresas.index')->with('message', 'Empresa no encontrada.');
        }

        $validator = Validator::make($request->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresas,cuit,' . $id,
            'email' => 'required|email|unique:empresas,email,' . $id,
            'estado' => 'required',
            'rubros' => 'array',
            'rubros.*' => 'exists:rubros,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empresa->update($request->only(['razon_social', 'nombre_fantasia', 'cuit', 'email', 'estado']));

        if ($request->has('rubros')) {
            $empresa->rubros()->sync($request->input('rubros'));
        }

        return redirect()->route('empresas.index')->with('message', 'La empresa fue actualizada con éxito');
    }

    public function destroy($id)
    {
        $empresa = Empresa::find($id);

    if (!$empresa) {
        return redirect()->route('empresas.index')->with('message', 'Empresa no encontrada.');
    }

    $empresa->delete();

    return redirect()->route('empresas.index')->with('message', 'La empresa fue eliminada con éxito.');
    }
}
