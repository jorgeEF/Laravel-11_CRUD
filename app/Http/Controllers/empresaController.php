<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class empresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        if(!$empresas){
            return "No hay empresas registradas";
        }
        return $empresas;
    }

    public function show($id)
    {
        $empresa = Empresa::find($id);
        if(!$empresa){
            return "Empresa no encontrada";
        }
        return $empresa;
    }

    public function store(Empresa $empresa)
    {
        $validator = Validator::make($empresa->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresa,cuit',
            'email' => 'required|email|unique:empresa'
        ]);

        if ($validator->fails()){
            return $validator->errors();
        }

        $empresa = Empresa::create([
            'razon_social' => $empresa->razon_social,
            'nombre_fantasia' => $empresa->nombre_fantasia,
            'cuit' => $empresa->cuit,
            "email" => $empresa->email,
            'provincia' => $empresa->provincia,
            'ciudad' => $empresa->ciudad,
            'domicilio' => $empresa->domicilio,
            'telefono' => $empresa->telefono,
            'estado' => $empresa->estado
        ]);

        if (!$empresa) {
            return "Error al crear la empresa";
        }
        return "La empresa fue creada";
    }

    public function update(Empresa $empresaActualizada, $id)
    {
        $empresaOriginal = Empresa::find($id);

        if (!$empresaOriginal) {
            return 'Empresa no encontrada.';
        }

        $validator = Validator::make($empresaActualizada->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresa,cuit',
            'email' => 'required|email|unique:empresa'
        ]);

        if ($validator->fails()){
            return $validator->errors();
        }

        $empresaOriginal->razon_social = $empresaActualizada->razon_social;
        $empresaOriginal->nombre_fantasia = $empresaActualizada->nombre_fantasia;
        $empresaOriginal->cuit = $empresaActualizada->cuit;
        $empresaOriginal->email = $empresaActualizada->email;
        $empresaOriginal->provincia = $empresaActualizada->provincia;
        $empresaOriginal->ciudad = $empresaActualizada->ciudad;
        $empresaOriginal->domicilio = $empresaActualizada->domicilio;
        $empresaOriginal->telefono = $empresaActualizada->telefono;
        $empresaOriginal->estado = $empresaActualizada->estado;

        $empresaOriginal->save();

        return 'La empresa fue actualizada';

    }

    public function updatePartial(Empresa $empresaActualizada, $id)
    {
        $empresaOriginal = Empresa::find($id);

        if (!$empresaOriginal) {
            return 'Empresa no encontrada.';
        }

        $validator = Validator::make($empresaActualizada->all(), [
            'cuit' => 'numeric|digits:11|unique:empresa,cuit',
            'email' => 'email|unique:empresa'
        ]);

        if ($validator->fails()){
            return $validator->errors();
        }

        if ($empresaActualizada->has('razon_social')){
            $empresaOriginal->razon_social = $empresaActualizada->razon_social;
        }

        if ($empresaActualizada->has('nombre_fantasia')){
            $empresaOriginal->nombre_fantasia = $empresaActualizada->nombre_fantasia;
        }

        if ($empresaActualizada->has('cuit')){
            $empresaOriginal->cuit = $empresaActualizada->cuit;
        }

        if ($empresaActualizada->has('email')){
            $empresaOriginal->email = $empresaActualizada->email;
        }

        if ($empresaActualizada->has('provincia')){
            $empresaOriginal->provincia = $empresaActualizada->provincia;
        }

        if ($empresaActualizada->has('ciudad')){
            $empresaOriginal->ciudad = $empresaActualizada->ciudad;
        }

        if ($empresaActualizada->has('domicilio')){
            $empresaOriginal->domicilio = $empresaActualizada->domicilio;
        }

        if ($empresaActualizada->has('telefono')){
            $empresaOriginal->telefono = $empresaActualizada->telefono;
        }

        if ($empresaActualizada->has('estado')){
            $empresaOriginal->estado = $empresaActualizada->estado;
        }

        $empresaOriginal->save();

        return 'La empresa fue actualizada';
    }

    public function delete($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return 'La empresa no fue encontrada.';
        }

        $empresa->delete();

        return 'La empresa fue eliminada.';
    }
}
