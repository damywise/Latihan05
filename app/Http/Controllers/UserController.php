<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('gender', function ($user) {
                    return $user->gender == 0 ? 'Perempuan' : 'Laki-Laki';
                })
                ->addColumn('aksi', function ($user) {
                    $html = '
                    <a href="' . url('user/userView', $user->id) . '"> 
                        Edit 
                    </a>
                    ';
                    return $html;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('user.daftarPengguna');
    }

    public function create()
    {
        return view('user.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'fullName' => ['required', 'string', 'max:100'],
            'email' => ['email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date', 'before:today'],
            'phoneNumber' => ['required', 'numeric', 'max:1000000000'],
            'religion' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'numeric', 'max:1'],
        ], [
            'username.required' =>  'Username harus diisi',
            'username.unique' =>  'Username telah digunakan',
            'birthdate.before' =>  'Tanggal lahir harus sebelum hari ini',
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

    public function show(User $user)
    {
        return view('user.infoPengguna')->with('user', $user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:100'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'phoneNumber' => ['required', 'numeric', 'max:1000000000'],
            'religion' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'numeric', 'max:1'],
        ]);

        $user = DB::table('Users')
            ->where('id', $request->id)
            ->update([
                'fullName' => $request->fullName,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phoneNumber' => $request->phoneNumber,
                'religion' => $request->religion,
                'gender' => $request->gender,
            ]);

        return redirect('/user');
    }
}
