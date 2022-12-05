<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                ->addColumn('action', function ($collection) {
                    $html = '
                    <a href="' . url('koleksi/koleksiView', $collection->id) . '"> 
                        Edit 
                    </a>
                    ';
                    return $html;
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
            'jumlahAwal' => ['required', 'numeric'],
            'jenisKoleksi' => ['required', 'numeric', 'max:3'],
        ]);

        $user = Collection::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jumlahAwal' => $request->jumlahAwal,
            'jumlahSisa' => $request->jumlahAwal,
            'jumlahKeluar' => 0,
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

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'jenisKoleksi' => ['required', 'numeric', 'max:3'],
        ]);

        $user = DB::table('Collections')
            ->where('id', $request->id)
            ->update([
                'jenisKoleksi' => $request->jenisKoleksi,
                'jumlahSisa' => $request->jumlahSisa,
                'jumlahKeluar' => $request->jumlahKeluar,
            ]);

        return redirect('/koleksi');
    }
}
