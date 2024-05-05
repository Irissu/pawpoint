<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        //validacion:
        $rules =  [
            'id' => 'required|regex:/[0-9]{8}[A-Za-z]{1}/',
            'name' => 'required|min:3|max:50',
            'lastname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8', 
        ];
        $error_messages = [
            'id.required' => 'El id es obligatorio',
            'name.required' => 'el nombre es obligatorio',
            'name.min' => 'el nombre debe tener al menos 3 letras',
            'name.max' => 'el nombre debe tener máximo 50 letras',
            'email.required' => 'el email es obligatorio',
            'email.email' => 'el formato del email no es correcto',
            'email.unique' => 'el email ya pertenece a otro usuario',
            'password.required' => 'el password es obligatorio',
            'password.min' => 'el password debe tener al menos 8 caracteres'
        ];
        // se validan los datos del formulario, si no son correctos, validate lanza una excepcion y se redirige a la pagina anterior con los errores almacenados en la variable $errors
        $request->validate($rules, $error_messages);
         
        // si ha pasado la validacion, se crea el usuario
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user); //me loguea automaticamente tras el registro, si este ha sido correcto
        return redirect(route('home')); //podria redirigir al perfil privado del usuario "privada"
    }

    public function login (Request $request){

        $rules =  [
            'email' => 'required|email',
            'password' => 'required', 
        ];

        $error_messages = [
            'email.required' => 'el email es obligatorio',
            'email.email' => 'el formato del email no es correcto',
            'password.required' => 'el password es obligatorio',
        ];

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //rellenar validacion
        $validator = Validator::make($request->all(), $rules, $error_messages);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors());
        }
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        // si falla autenticacion redirijo con mensaje
        return redirect()->back()->withErrors(['email' => 'credenciales incorrectas']);

            
    }

    public function logout(Request $request) {
        Auth::logout();

        //recomendabler resetear la sesion para evitar que quede algun dato guardado:
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
