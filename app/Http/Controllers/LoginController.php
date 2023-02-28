<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $usuario = DB::SELECT('SELECT * FROM users WHERE user_email = ? limit 1', [$request->user_email]);

        if ($usuario) {
            // if ($usuario[0]->user_password == $request->user_password) {
            if (password_verify($request->user_password, $usuario[0]->user_password)) {
                $user_api_token = Str::random($length = 150);
                $actualizar = DB::UPDATE('UPDATE users SET user_api_token = ? WHERE user_email = ?', [$user_api_token, $request->user_email]);
                
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Usuario autenticado',
                    'user' => $usuario[0],
                ]);

                // return response()->json($usuario, 200);
            } else {
                return response()->json(['error' => 'Contraseña incorrecta'], 401);
            }
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

   
    }
}
