<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        // Validacion
        $this->validate($request, [
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'cuit' => 'required|min:11|max:11',
            'email' => 'required|email|max:60|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'cuit' => $request->cuit,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->assignRole('Invitado');

        // Auth
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redireccion
        return redirect()->route('home');

    }
}
