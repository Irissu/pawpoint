<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;

class PetController extends Controller
{
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
