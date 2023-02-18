<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = DB::select('SELECT * FROM empleados WHERE empl_estado = 1');
        return response()->json($empleados);
    }

    public function show(Request $request){

        // $empleado = $request->input('empl_id');
        $id = $request->input('empl_id');
        $empleado = DB::select('SELECT * FROM empleados WHERE empl_id = ?', [$id]);
        return response()->json($empleado);
    }
    

}
 /* public function store(Request $request){
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->email = $request->email;
        $empleado->telefono = $request->telefono;
        $empleado->save();
        return response()->json($empleado);
    }

    public function show($id){
        $empleado = Empleado::find($id);
        return response()->json($empleado);
    }

    public function update(Request $request, $id){
        $empleado = Empleado::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->email = $request->email;
        $empleado->telefono = $request->telefono;
        $empleado->save();
        return response()->json($empleado);
    }

    public function destroy($id){
        $empleado = Empleado::find($id);
        $empleado->delete();
        return response()->json('Empleado eliminado');
    }   

    public function search($nombre){
        $empleados = DB::table('empleados')
            ->where('nombre', 'like', '%'.$nombre.'%')
            ->get();
        return response()->json($empleados);
    }  */ 