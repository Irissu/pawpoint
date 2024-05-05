<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function indexVets() {
      

    }

    public function indexOwners() {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
/*     public function show($id)
    {
     $user = User::find($id);
     return view('users.show', compact('user'));   
    } */
    public function show($id) {
     $user = User::find($id);
     return view('users.show', compact('user'));   
    }

    public function showVets() {
        $vets = User::whereHas('types', function ($query) {
            $query->where('type_id', 2);
        })->get();

        return view('users.vets', compact('vets'));
    }

    public function showOwners() {
        $owners = User::whereHas('types', function($query) {
            $query->where('type_id', 1);
        })->get();
        
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

/*     public function showMyPets() {
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
        //
    }
}
