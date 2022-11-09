<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CollectionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Collection::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('jenisKoleksi', function ($collection) {
                    $jenisKoleksi = ['', 'Buku', 'Majalah', 'Cakram Digital'];
                    return  $jenisKoleksi[$collection->jenisKoleksi] ?? '';
                })
                ->editColumn('createdAt', function ($collection) {
                    return date('Y-m-d', strtotime($collection->createdAt ?? ''));
                })
                ->make(true);
        }
        return view('koleksi.daftarKoleksi');
    }

    public function create()
    {
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

    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi')->with('collection', $collection);
    }
}
