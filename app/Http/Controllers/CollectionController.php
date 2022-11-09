<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index() {
        $collections = Collection::all();
        return view('koleksi.daftarKoleksi', compact('collections'));
    }

    public function create() {
        return view('koleksi.registrasi');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100'],
            'jumlahKoleksi' => ['required', 'numeric'],
            'jenisKoleksi' => ['required', 'numeric', 'max:3'],
        ]);

        $user = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'createdAt' => Date("Y-m-d", time()),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect('/koleksi');
    }

    public function show(Collection $collection) {
        return view('koleksi.infoKoleksi')->with('collection', $collection);
    }
    
}
