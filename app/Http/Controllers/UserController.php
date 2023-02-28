<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{


public function store(Request $request){

    // User::create($request->all());
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