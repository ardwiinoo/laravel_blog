<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        // validasi request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:64', 'unique:users'], // 'unique:users' => akan mencari username di tabel user
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // dd('registrasi berhasil');

        // enkripsi password
        //$validatedData['password'] = bcrypt($validatedData['password']); // cara 1
        $validatedData['password'] = Hash::make($validatedData['password']);

        // insert ke tabel
        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successful! Please login');

        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
