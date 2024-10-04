<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::with(['dndClass', 'background'])->get();

        // Return an Inertia.js page with the users data
        return Inertia::render('Admin/UserIndex', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return Inertia::render('Admin/CreateUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? $request->is_admin : false,
        ]);

        return redirect()->route('dashboard');
    }
}
