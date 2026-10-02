<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;


class TamuController extends Controller
{


    public function store(Request $request)
    {


        $request->validate([

            'nama_lengkap' => 'required',

            'no_hp' => 'required',

            'keperluan' => 'required',

            'tujuan_bidang' => 'required',

            'captcha' => 'required|captcha',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);



        // SIMPAN FOTO KEGIATAN

        $foto = null;


        if($request->hasFile('foto')){


            $foto = $request
                ->file('foto')
                ->store('foto_tamu','public');


        }



        // SIMPAN DATA TAMU

        Kunjungan::create([


            'tanggal_kunjungan' => now()->format('Y-m-d'),


            'jam_kedatangan' => now()->format('H:i:s'),


            'nama_lengkap' => $request->nama_lengkap,


            'instansi_asal' => $request->instansi_asal,


            'jabatan' => $request->jabatan,


            'status' => $request->status,


            'no_hp' => $request->no_hp,


            'keperluan' => $request->keperluan,


            'tujuan_bidang' => $request->tujuan_bidang,


            'bertemu_dengan' => $request->bertemu_dengan,


            'catatan' => $request->catatan,


            'foto' => $foto,


        ]);



        return redirect('/tamu/sukses')

        ->with(
            'nama',
            $request->nama_lengkap
        );


    }


}
