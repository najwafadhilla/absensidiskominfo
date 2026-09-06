<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kunjungan extends Model
{

    use HasFactory;


    protected $table = 'kunjungans';


    protected $fillable = [

        'tanggal_kunjungan',
        'jam_kedatangan',
        'nama_lengkap',
        'instansi_asal',
        'status',
        'no_hp',
        'keperluan',
        'tujuan_bidang',
        'bertemu_dengan',
        'jabatan',
'catatan'

    ];

}
