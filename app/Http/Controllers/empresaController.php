<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Empresa;

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
            abort(404); // Si no encuentra la empresa, devuelve un error 404.
        }

        //dd($empresa);

        return view('empresas.show', ['empresa' => $empresa]);
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresas,cuit',
            'email' => 'required|email|unique:empresas'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empresa = Empresa::create([
            'razon_social' => $request->razon_social,
            'nombre_fantasia' => $request->nombre_fantasia,
            'cuit' => $request->cuit,
            "email" => $request->email,
            'provincia' => $request->provincia,
            'ciudad' => $request->ciudad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
            'estado' => $request->estado
        ]);

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

        return view('empresas.edit', ['empresa' => $empresa]);
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
            'estado' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empresa->update([
            'razon_social' => $request->razon_social,
            'nombre_fantasia' => $request->nombre_fantasia,
            'cuit' => $request->cuit,
            'email' => $request->email,
            'provincia' => $request->provincia,
            'ciudad' => $request->ciudad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
        ]);

        return redirect()->route('empresas.index')->with('message', 'La empresa fue actualizada con éxito');
    }

    public function updatePartial(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('empresas.index')->with('message', 'Empresa no encontrada.');
        }

        \Log::info('Updating empresa ID: ' . $id);

        $validator = Validator::make($request->all(), [
            'cuit' => 'sometimes|numeric|digits:11|unique:empresas,cuit,' . $id,
            'email' => 'sometimes|email|unique:empresas,email,' . $id
        ]);

        if ($validator->fails()) {
            \Log::error('Validation failed: ', $validator->errors()->toArray());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only([
            'razon_social',
            'nombre_fantasia',
            'cuit',
            'email',
            'provincia',
            'ciudad',
            'domicilio',
            'telefono',
            'estado'
        ]);

        \Log::info('Data to update: ', $data);

        $empresa->update($data);

        return redirect()->route('empresas.index')->with('message', 'La empresa fue actualizada con éxito');
    }


    public function delete($id)
    {
        $empresa = Empresa::find($id);

    if (!$empresa) {
        return redirect()->route('empresas.index')->with('message', 'Empresa no encontrada.');
    }

    $empresa->delete();

    return redirect()->route('empresas.index')->with('message', 'La empresa fue eliminada con éxito.');
    }
}
