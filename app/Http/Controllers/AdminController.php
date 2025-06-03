<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Add this line

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        $doctors = User::where('role', 'doctor')->get(); // Adjust if you have a separate Doctor model/table
        return view('admin.home', compact('users', 'doctors'));
    }

    public function redirect() // Add this function
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                return $this->userHome();
            } else {
                return $this->adminHome(); // <-- call adminHome here
            }
        } else {
            return redirect()->back();
        }
    }

    public function adminHome()
    {
        $users = User::where('usertype', '!=', 1)->get();
        return view('admin.home', compact('users'));
    }
}
