<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;


class TamuController extends Controller
{

    public function store(Request $request)
    {


        // VALIDASI FORM

        $request->validate([

            'nama_lengkap' => 'required',

            'no_hp' => 'required',

            'keperluan' => 'required',

            'tujuan_bidang' => 'required',

            'jabatan' => 'nullable',

            'catatan' => 'nullable',

            'captcha' => 'required|captcha',

        ]);




        // CEGAH SUBMIT DATA YANG SAMA
        // DALAM 5 MENIT TERAKHIR
        // DENGAN BIDANG YANG SAMA


        $cek = Kunjungan::where('nama_lengkap', $request->nama_lengkap)

            ->where('no_hp', $request->no_hp)

            ->where('tujuan_bidang', $request->tujuan_bidang)

            ->whereDate(
                'tanggal_kunjungan',
                now()->format('Y-m-d')
            )

            ->where(
                'jam_kedatangan',
                '>=',
                now()->subMinutes(5)->format('H:i:s')
            )

            ->first();



        if($cek){


            return back()

            ->withInput()

            ->with(
                'error',
                'Data dengan bidang yang sama sudah dikirim. Silakan tunggu beberapa menit.'
            );


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




            // JIKA PILIH LAINNYA
            // AMBIL INPUT MANUAL

'keperluan' => $request->keperluan,




            'tujuan_bidang' => $request->tujuan_bidang,



            'bertemu_dengan' => $request->bertemu_dengan,



            'catatan' => $request->catatan,


        ]);





        return redirect('/tamu/sukses')

        ->with(
            'nama',
            $request->nama_lengkap
        );


    }

}
