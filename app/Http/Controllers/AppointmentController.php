<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Make sure to include the Appointment model

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_type' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);

        // Combine date and time into a single datetime string
        $dateTime = $request->date . ' ' . $request->time;

        Appointment::create([
            'user_id' => auth()->id(),
            'appointment_type' => $request->appointment_type,
            'doctor_name' => $request->doctor_name,
            'date' => $dateTime,
            'notes' => $request->notes,
        ]);

        return redirect()->route('user.home')->with('success', 'Appointment booked successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Appointment $appointment)
    {
        $request->validate([
            'date' => 'required|date',
            'doctor_name' => 'required|string|max:255',
            // add other fields as needed
        ]);

        $appointment->update([
            'date' => $request->date,
            'doctor_name' => $request->doctor_name,
            'appointment_type' => $request->appointment_type,
            // add other fields as needed
        ]);

        return redirect()->route('user.home')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
