<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsumeController;
use App\Models\Appointment;
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

Route::get('/notauthorized', function () {
    return view('users.notauthorized');
})->name('notauthorized');

// ruta para loguearse
Route::post('/login', [AuthController::class, 'login'])->name('logins');
// ruta para registrarse
Route::post('/registro', [AuthController::class, 'register'])->name('registros');
// ruta para desloguearse
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// Pets Routes


Route::get('pets/create/', [PetController::class, 'create'])->name('pets.create')->middleware('checkowner');
Route::get('/mascotas/perros', [PetController::class, 'showDogs'])->name('pets.dogs');
Route::get('/mascotas/gatos', [PetController::class, 'showCats'])->name('pets.cats');
Route::get('/mismascotas', [PetController::class, 'showMyPets'])->name('pets.mypets')->middleware('checkowner');
Route::get('pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
Route::resource('pets', PetController::class)->except('create');


/* Route::get('/mascotas', [PetController::class, 'index'])->name('pets.index');
Route::get('/mascotas/{pet}', [PetController::class, 'show'])->name('pets.show');
Route::get('/mascotas/create', [PetController::class, 'create'])->name('pets.create');
Route::post('/mascotas', [PetController::class, 'store'])->name('pets.store'); */

// Users Routes
Route::get('users/vets', [UserController::class, 'showVets'])->name('user.vets');
Route::get('users/owners', [UserController::class, 'showOwners'])->name('user.owners');
Route::resource('users', UserController::class);

// Appointments Routes
// Rutas que solo pueden ser accedidas por dueños de mascotas
Route::middleware(['checkowner'])->group(function () { 
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/checkmyappoint', [AppointmentController::class, 'checkMyAppointments'])->name('appointments.checkmyappoint');
});


// aqui van todas las rutas que solo pueden ser accedidas por veterinarios.
Route::middleware(['checkvet'])->group(function () { 
    Route::get('appointments/report', [AppointmentController::class, 'downloadPDF'])->name('appointments.report');
    Route::resource('appointments', AppointmentController::class)->only(['index', 'edit', 'update', 'destroy', 'downloadPDF']);
});
//rutas que no tienen el middleware 'checkvet', ni 'checkowner" accesibles para cualquier usuario
Route::resource('appointments', AppointmentController::class)->except('index', 'edit', 'update', 'destroy', 'downloadPDF', 'store', 'create');


// Rutas para consumir API externas
Route::get('apipruebas/starkquotes', [ConsumeController::class, 'checkQuoteByLastName'])->name('apipruebas.quotes');
Route::get('apipruebas', [ConsumeController::class, 'checkGOTHouses'])->name('apipruebas.index');


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

 
/* Route::get('/avatar', 'UserController@giveMeAnAvatar'); */
