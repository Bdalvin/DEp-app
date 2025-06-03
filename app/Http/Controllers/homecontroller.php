<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Appointment;

class homecontroller extends Controller
{
    public function redirect()
    {
        if(auth::id())
     {
        if(auth::user()->usertype=='0')
        {
            return $this->userHome(); // <-- change here
        }
        else
        {
            return view('admin.home');
        }
        
        

     }
    else
        {
            return redirect()->back();
    } 

}  

public function userHome()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }

    $upcomingAppointments = $user->appointments()->where('date', '>=', now())->get();
    $reminders = collect(); // or fetch reminders if you have a Reminder model

    return view('user.home', compact('upcomingAppointments', 'reminders'));
}

public function updateEmergencyContact(Request $request)
{
    $request->validate([
        'emergency_contact_name' => 'required|string|max:255',
        'emergency_contact_relationship' => 'required|string|max:255',
        'emergency_contact_phone' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    $user->emergency_contact_name = $request->emergency_contact_name;
    $user->emergency_contact_relationship = $request->emergency_contact_relationship;
    $user->emergency_contact_phone = $request->emergency_contact_phone;
    $user->save();

    return redirect()->back()->with('success', 'Emergency contact updated!');
}

public function index()
{
    return redirect()->route('user.home');
}
}
