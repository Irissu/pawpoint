<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
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



// Login and Register Routes

//vista login
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
//vista registro
Route::get('/registro', function () {
    return view('auth.register');
})->name('registro');
// ruta para loguearse
Route::post('/login', [AuthController::class, 'login'])->name('logins');
// ruta para registrarse
Route::post('/registro', [AuthController::class, 'register'])->name('registros');
// ruta para desloguearse
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// Pets Routes
Route::get('/mascotas/perros', [PetController::class, 'showDogs'])->name('pets.dogs');
Route::get('/mascotas/gatos', [PetController::class, 'showCats'])->name('pets.cats');
Route::get('/mascotas', [PetController::class, 'index'])->name('pets.index');
Route::get('/mascotas/{pet}', [PetController::class, 'show'])->name('pets.show');
Route::get('/mascotas/create', [PetController::class, 'create'])->name('pets.create');

// Users Routes
Route::get('users/vets', [UserController::class, 'showVets'])->name('user.vets');
Route::resource('users', UserController::class);

// Appointments Routes
Route::resource('appointments', AppointmentController::class);


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