<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\Storelogs;

class PetController extends Controller
{
    use Storelogs;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::with('user')->get();
        return view('pets.index', compact('pets'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'weight' => 'required|numeric|between:0,99',
            'type' => 'required|in:dog,cat',
            'breed' => 'required',
            'age' => 'required|numeric|integer|min:1'
        ];

        $error_messages = [
            'name' => 'El nombre debe tener al  menos 3 letras',
            'weight' => 'El peso debe ser un numero de 0 a 45',
            'type' => 'Debes escoger un tipo de mascota',
            'breed' => 'La raza debe contener al menos 3 letras',
            'age' => 'La edad debe ser un número mayor a 0'

        ];

        $request->validate($rules, $error_messages);
        $pet = new Pet();
        $pet->name = $request->name;
        $pet->weight = $request->weight;
        $pet->type = $request->type;
        $pet->breed = $request->breed;
        $pet->age = $request->age;
        $pet->user_id = Auth::id();
        $pet->save();

        // Utilizo el trait:
        $this->storeLog($request, 'createdUser');

        return redirect(route('pets.show', $pet->id))->with('success', 'mascota registrada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pet = Pet::find($id);
        return view('pets.show', compact('pet'));
    }

    public function showDogs() {
        $dogs = Pet::where('type', 'dog')->get();
        return view('pets.dogs', compact('dogs'));
    }

    public function showCats() {
        $cats = Pet::where('type', 'cat')->get();
        return view('pets.cats', compact('cats'));
    }
    public function showMyPets() {
        $user = Auth::user();
        $pets = $user->pets;
        return view('pets.mypets', compact('pets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $pet = Pet::find($id);
       return view('pets.edit', compact('pet'));
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
        $pet = Pet::find($id);
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'mascota eliminada con éxito');
    }
}
