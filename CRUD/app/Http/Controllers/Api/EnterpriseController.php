<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enterprises;
use Illuminate\Support\Facades\Http;

class EnterpriseController extends Controller
{
    // Listar todas las empresas
    public function list()
    {
        $enterprises = enterprises::all();
        return response()->json($enterprises);
    }

    // Mostrar formulario para crear una nueva empresa
    public function create()
    {
        return view('enterprises.create');
    }

    // Guardar una nueva empresa en la base de datos
    public function store(Request $request)
    {
        // Valida los datos del formulario aquí si es necesario

        $enterprise = new enterprises();
        $enterprise->nombre_empresa = $request->input('nombre_empresa');
        $enterprise->descripcion = $request->input('descripcion');
        $enterprise->ubicacion = $request->input('ubicacion');
        $enterprise->telefono = $request->input('telefono');
        $enterprise->correo_electronico = $request->input('correo_electronico');
        $enterprise->save();

        return response()->json($enterprise, 201);
    }

    // Mostrar formulario para editar una empresa existente
   // Mostrar formulario para editar una empresa existente
// Mostrar formulario para editar una empresa existente
public function update(Request $request, $id)
{
    // Valida los datos del formulario aquí si es necesario
    $data = $request->validate([
        'nombre_empresa' => 'required|min:3',
        'descripcion' => 'required|min:3',
        'ubicacion' => 'required|min:3',
        'telefono' => 'required|min:3',
        'correo_electronico' => 'required|min:3',
    ]);

    // Busca el modelo por el ID
    $enterprise = enterprises::find($id);

    if (!$enterprise) {
        return response()->json(['response' => 'Error: Empresa no encontrada'], 404);
    }

    // Actualiza los datos del modelo
    $enterprise->nombre_empresa = $data['nombre_empresa'];
    $enterprise->descripcion = $data['descripcion'];
    $enterprise->ubicacion = $data['ubicacion'];
    $enterprise->telefono = $data['telefono'];
    $enterprise->correo_electronico = $data['correo_electronico'];

    if ($enterprise->save()) {
        $object = [
            "response" => 'Success. Empresa actualizada correctamente.',
            "data" => $enterprise,
        ];
        return response()->json($object);
    } else {
        $object = [
            "response" => 'Error: Algo salió mal, por favor inténtalo de nuevo.',
        ];
        return response()->json($object, 500);
    }
}


public function show($_id)
{
    $enterprise = enterprises::find($_id);

    if (!$enterprise) {
        return response()->json(['error' => 'Empresa no encontrada'], 404);
    }

    return response()->json($enterprise);
}

    // Eliminar una empresa de la base de datos
    public function delete($_id){
        $enterprise = enterprises::find($_id);
        
        if(!$enterprise) {
            return response()->json(['response' => 'Error: Empresa no encontrada'], 404);
        }
        
        $enterprise->delete();
    
        return response()->json(['response' => 'Empresa eliminada correctamente']);
    }
}