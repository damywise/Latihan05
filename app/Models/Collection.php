<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Collection extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'namaKoleksi',
        'jenisKoleksi',
        'createdAt',
        'jumlahAwal',
        'jumlahSisa',
        'jumlahKeluar',
    ];


    protected $casts = [
        'createdAt' => 'datetime',
    ];

    public $timestamps = false;
    
}
