<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/halamanbaru', function () {
    return view('halamanbaru');
})->middleware(['auth', 'verified'])->name('halamanbaru');

Route::middleware('auth', 'verified')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user');
        Route::get('/user/userRegistration', 'create')->name('user.userRegistration');
        Route::post('/user/userStore', 'store')->name('user.userStore');
        Route::get('/user/userView/{user}', 'show')->name('user.userView');
        Route::post('/user/userUpdate', 'update')->name('user.userUpdate');
    });

    Route::controller(CollectionController::class)->group(function () {
        Route::get('/koleksi', 'index')->name('koleksi');
        Route::get('/koleksi/koleksiTambah', 'create')->name('koleksi.koleksiTambah');
        Route::post('/koleksi/koleksiStore', 'store')->name('koleksi.koleksiStore');
        Route::get('/koleksi/koleksiView/{collection}', 'show')->name('koleksi.koleksiView');
        Route::post('/koleksi/koleksiUpdate', 'update')->name('koleksi.koleksiUpdate');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('transaksi');
        Route::get('/getAllTransactions', 'getAllTransactions');
        Route::get('/transaksiTambah', 'create');
        Route::post('/transaksiStore', 'store');
        Route::get('/transaksiView/{transaction}', 'show');
    });
    
    Route::controller(DetailTransactionController::class)->group(function () {
        Route::get('/getAllDetailTransactions/{transactionId}', 'getAllDetailTransactions');
        Route::get('/detailTransactionKembalikan/{detailTransactionId}', 'detailTransactionKembalikan');
        Route::post('/detailTransactionUpdate', 'update');
    });
});
require __DIR__ . '/auth.php';
