<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.daftarPengguna')->with('users', $users);
    }

    public function create() {
        return view('user.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullName' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(),
            'address' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date'],
            'phoneNumber' => ['required', 'number', 'max:20'],
            'religion' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'number', 'max:1'],
        ],
        ]);

        $user = User::create([
            'username' => $request->username,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthdate' =>  $request->birthdate,
            'phoneNumber' => $request->phoneNumber,
            'religion' => $request->religion,
            'gender' => $request->gender,
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect('/user');
    }

    public function show(User $user) {
        return view('user.infoPengguna')->with('user', $user);
    }
}
