<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\UserController as APIUserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        $userController = new APIUserController;
        $avatarUrl = $userController->giveMeAnAvatar();

        return view('users.index', compact('users', 'avatarUrl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // esta funcion la tengo realmente en register, ya que es la que se encarga de crear un nuevo usuario
    }

    /**
     * Display the specified resource.
     */

    public function show($id) {
     $user = User::find($id);
     return view('users.show', compact('user'));   
    }

    public function showVets() {
   /*      
            otra forma, con whereHas:
            $vets = User::whereHas('types', function ($query) {
            $query->where('type_id', 2);
        })->get(); */

            $users = User::all();
            $vets = $users->filter(function($user) {
                return $user->types->contains('id', 2);
            });

        return view('users.vets', compact('vets'));
    }

    public function showOwners() {
        $owners = User::with('image')->whereHas('types', function($user) {
            $user->where('type_id', 1);
        })->get();
                /* Otra forma, con filter:
            $users = User::all();
            $owners = $users->filter(function ($user) {
                return $user->types->contains('type_id', 1);
            });  
            */
            
    
        return view('users.owners', compact('owners'));
    }

    public function showMyPets() {
        /*Auth::user() devuelve un objeto de usuario completo, mientras que Auth::id() devuelve solo el ID del usuario autenticado. find necesita
        un id no un objeto  */
        $pets = User::find(Auth::id())->pets; 
        return view('users.mypets', compact('pets'));
        /* 
        $pets = Auth::user()->pets;
        return view('users.mypets', compact('pets'));
        */
    }

/*     public function showMyPets() { Forma un poco mas compleja de hacerlo. 
        User::where('pets', function ($query) {  
            $query->where('type', 2);
        });
    }
 */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $user = User::find($id); //findOrFail es parecido pero devuelve 404 si no encuentra al user
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario borrado correctamente');
    }

}
