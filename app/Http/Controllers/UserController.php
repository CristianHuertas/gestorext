<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function store(Request $request)
    {

        // User::create($request->all());

        /* if ($request->user_password != $request->user_password_confirm) {
            return response()->json([
                'res' => false,
                'message' => 'Las contraseñas no coinciden'
            ], 201);
        } */

        $user = DB::SELECT('SELECT * FROM users WHERE user_email = ?', [$request->user_email]);
        if ($user) {
            return response()->json([
                'res' => false,
                'message' => 'El correo ya existe'
            ], 201);
        }

        $user = DB::SELECT('SELECT * FROM users WHERE user_documento = ?', [$request->user_documento]);
        if ($user) {
            return response()->json([
                'res' => false,
                'message' => 'El documento ya existe'
            ], 201);
        }


        if ($user == null) {
            User::create([
                'user_documento' => $request->user_documento,
                'user_email' => $request->user_email,
                'user_name' => $request->user_name,
                'esus_id' => $request->esus_id,
                'tius_id' => $request->tius_id,
                'user_api_token' => $request->user_api_token,
                'user_password' => Hash::make($request->user_password)
            ]);

            return response()->json([
                'res' => true,
                'message' => 'Usuario creado correctamente'
            ], 201);
        }
    }

    public function index()
    {
        // $empleado = DB::select('SELECT * FROM empleados WHERE empl_id = ?', [$id]);
        // $users = User::all(); 

        $users = DB::SELECT('SELECT * FROM users WHERE esus_id = 1');


        return response()->json($users);
    }
}
