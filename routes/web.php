<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Pet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', function () {
    return view('layouts.home');
});


Route::get('/mascotas', [PetController::class, 'index'])->name('pets.index');
Route::get('/mascotas/{pet}', [PetController::class, 'show'])->name('pets.show');
Route::get('/mascotas/create', [PetController::class, 'create'])->name('pets.create');

// Users Routes
Route::resource('users', UserController::class);


/*  es posible usar resource y aún así aplicar middleware a rutas específicas,
En este ejemplo, las rutas index y show están disponibles para todos los usuarios,
 mientras que las rutas create, store, edit, update y destroy solo están disponibles 
 para usuarios autenticados.
 
Route::resource('mascotas', PetController::class)->only([
    'index', 'show'
]);

Route::resource('mascotas', PetController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy'
])->middleware('auth');
 */