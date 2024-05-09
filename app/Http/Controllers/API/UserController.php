<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'id' => 'required|regex:/[0-9]{8}[A-Za-z]{1}/',
            'name' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ];
        
        $messages = [
            'id.required' => 'El id es obligatorio',
            'id.regex' => 'El formato del DNI es inválido',
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 3 letras',
            'name.max' => 'El nombre debe tener máximo 50 letras',
            'lastname.required' => 'El apellido es obligatorio',
            'lastname.min' => 'El apellido debe tener al menos 3 letras',
            'lastname.max' => 'El apellido debe tener máximo 50 letras',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida',
            'email.unique' => 'Este correo electrónico ya está registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres'
        ];

        $validator = Validator::make($data, $rules, $messages); // + optimizado que en login

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'email_verified_at' => now(),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json((['data' => $user]), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        /* no necesitas especificar explícitamente que estás pasando un ID
         porque Laravel se encarga de eso por ti. 
        */
        $response = ['data' => $user];
        return response()->json($response, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $requestedData = $request->all();

        $rules = [
            'id' => 'required|regex:/[0-9]{8}[A-Za-z]{1}/',
            'name' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ];
        
        $messages = [
            'id.required' => 'El id es obligatorio',
            'id.regex' => 'El formato del DNI es inválido',
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 3 letras',
            'name.max' => 'El nombre debe tener máximo 50 letras',
            'lastname.required' => 'El apellido es obligatorio',
            'lastname.min' => 'El apellido debe tener al menos 3 letras',
            'lastname.max' => 'El apellido debe tener máximo 50 letras',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida',
            'email.unique' => 'Este correo electrónico ya está registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres'
        ];

        $validator = Validator::make($requestedData, $rules, $messages);

        if($validator->fails()) {
            return response()->json(['error'=> $validator->errors()], 400);
        }

        $user->update($requestedData);

        
        return response()->json(['data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
