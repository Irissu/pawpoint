<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $pets = $user->pets;
        return view('appointments.create', compact(['pets', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'appointment_date' => 'required',
            'description' => 'max:500'
        ];

        $error_messages = [
            'appointment_date' => 'La fecha de la cita es requerida',
            'description' => 'La descripción no puede tener más de 500 caracteres'
        ];

        $request->validate($rules, $error_messages);

        $appointment = new Appointment();
        $appointment->appointment_date = $request->appointment_date;
        $appointment->status = 'pending';
        $appointment->pet_id = $request->pet_id;
        $appointment->description = $request->description;
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'La cita ha sido creada con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::find($id);
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::find($id);
        return view('appointments.edit', compact('appointment'));
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
       $appointment =  Appointment::find($id);
       $appointment->delete();
       return redirect()->route('appointments.index')->with('warning', 'la cita ha sido eliminada con éxito.');
    }

    public function downloadPDF() {

    $appointments = Appointment::all();

    $pdf = Pdf::loadView('appointments.report', compact('appointments'));
    return $pdf->stream('appointments.pdf');
    }

    public function checkMyAppointments() {
        $user = Auth::user();

        // Obtengo las citas del usuario, donde appointments esta asociada con 
        // mascotas, que a su vez estan asociadas con usuarios.
     /*    $appointments = Appointment::whereHas('pet', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get(); */
        $allAppointments = Appointment::all();
        /*otra manera de hacer lo mismo pero mas simple (mismo ejemplo): 
        en el metodo showVets - Petcontroller*/
        $appointments = $allAppointments->filter(function($appointment) {
            return $appointment->pet->user_id == Auth::id();
        });

        
        return view('appointments.checkmyappoint', compact('user', 'appointments'));
    }
}
