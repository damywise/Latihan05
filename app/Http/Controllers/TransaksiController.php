<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.daftarTransaksi');
        //
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as peminjam',
                'u2.fullname as petugas',
                'tanggalPinjam as tanggalPinjam',
                'tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
            ->orderBy('tanggalPinjam', 'asc')
            ->get();

        return DataTables::of($transactions)
            ->addColumn('action', function ($transaction) {
                $html = '
                <a href="' . url('transaksiView', $transaction->id) . '"> 
                    Edit 
                </a>';
                return $html;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $collections = Collection::where('jumlahSisa', '>', 0)->get();
        return view('transaction.transaksiTambah', compact(
            'collections',
            'users'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->userIdPeminjam = $request->idPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        $transaction->save();

        $lastTransactionIdStored = $transaction->id;

        //Peminjaman koleksi 1
        $detilTransaksil = new DetailTransaction;
        $detilTransaksil->transactionId = $lastTransactionIdStored;
        $detilTransaksil->collectionId = $request->idKoleksi1;
        $detilTransaksil->status = 1;
        $detilTransaksil->save();
        //Mengurangi jumlah stok
        DB::table('collections')->where('id', $request->idKoleksi1)->decrement('jumlahSisa');
        DB::table('collections')->where('id', $request->idKoleksi1)->increment('jumlahKeluar');
        //Peminjaman koleksi 2 
        if ($request->idKoleksi2 > 0) {
        };
        $detilTransaksi2 = new DetailTransaction;
        $detilTransaksi2->transactionId = $lastTransactionIdStored;
        $detilTransaksi2->collectionId = $request->idKoleksi2;
        $detilTransaksi2->status = 1;
        $detilTransaksi2->save();
        DB::table('collections')
            ->where('id', $request
                ->idKoleksi2)
            ->decrement('jumlahSisa');
        DB::table('collections')
            ->where('id', $request
                ->idKoleksi2)
            ->increment('jumlahKeluar');
        //Peminjaman koleksi 3 
        if ($request->idKoleksi3 > 0) {
        }
        $detilTransaksi3 = new DetailTransaction;
        $detilTransaksi3->transactionId = $lastTransactionIdStored;
        $detilTransaksi3->collectionId = $request->idKoleksi3;
        $detilTransaksi3->status = 1;
        $detilTransaksi3->save();
        DB::table('collections')->where('id', $request->idKoleksi3)->decrement('jumlahSisa');
        DB::table('collections')->where('id', $request->idKoleksi3)->increment('jumlahKeluar');
        return redirect()->route('transaksi')->with('status', 'Peminjaman berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as fullnamePeminjam',
                'u2.fullname as fullnamePetugas',
                'tanggalPinjam as tanggalPinjam',
                'tanggalSelesai as tanggalSelesai',
            )
            ->join('users as u1', 'userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'userIdPetugas', '=', 'u2.id')
            ->where('transactions.id', '=', $transaction->id)
            ->orderBy('tanggalPinjam', 'asc')
            ->first();
        return view('transaction.transaksiView', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
