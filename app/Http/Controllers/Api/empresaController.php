<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;

class empresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();

        $data = [
            'empresas' => $empresas,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            $data = [
                'message' => 'Empresa no encontrada.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'empresa' => $empresa,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresa,cuit',
            'email' => 'required|email|unique:empresa'
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
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
            $data = [
                'message' => 'Error al crear la empresa',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => "Empresa creada",
            'empresa' => $empresa,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            $data = [
                'message' => 'Empresa no encontrada.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'razon_social' => 'required',
            'nombre_fantasia' => 'required',
            'cuit' => 'required|numeric|digits:11|unique:empresa,cuit',
            'email' => 'required|email|unique:empresa'
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $empresa->razon_social = $request->razon_social;
        $empresa->nombre_fantasia = $request->nombre_fantasia;
        $empresa->cuit = $request->cuit;
        $empresa->email = $request->email;
        $empresa->provincia = $request->provincia;
        $empresa->ciudad = $request->ciudad;
        $empresa->domicilio = $request->domicilio;
        $empresa->telefono = $request->telefono;
        $empresa->estado = $request->estado;

        $empresa->save();

        $data = [
            'message' => "Empresa actualizada",
            'empresa' => $empresa,
            'status' => 200
        ];
        return response()->json($data, 201);

    }

    public function updatePartial(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            $data = [
                'message' => 'Empresa no encontrada.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'cuit' => 'numeric|digits:11|unique:empresa,cuit',
            'email' => 'email|unique:empresa'
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('razon_social')){
            $empresa->razon_social = $request->razon_social;
        }

        if ($request->has('nombre_fantasia')){
            $empresa->nombre_fantasia = $request->nombre_fantasia;
        }

        if ($request->has('cuit')){
            $empresa->cuit = $request->cuit;
        }

        if ($request->has('email')){
            $empresa->email = $request->email;
        }

        if ($request->has('provincia')){
            $empresa->provincia = $request->provincia;
        }

        if ($request->has('ciudad')){
            $empresa->ciudad = $request->ciudad;
        }

        if ($request->has('domicilio')){
            $empresa->domicilio = $request->domicilio;
        }

        if ($request->has('telefono')){
            $empresa->telefono = $request->telefono;
        }

        if ($request->has('estado')){
            $empresa->estado = $request->estado;
        }

        $empresa->save();

        $data = [
            'message' => "Empresa actualizada",
            'empresa' => $empresa,
            'status' => 200
        ];
        return response()->json($data, 201);

    }

    public function delete($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            $data = [
                'message' => 'Empresa no encontrada.',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $empresa->delete();

        $data = [
            'message' => 'La empresa fue eliminada.',
            'status' => 204
        ];
        return response()->json($data, 204);
    }
}
