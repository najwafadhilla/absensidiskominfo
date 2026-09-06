<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kunjungan;



class KunjunganController extends Controller
{


    public function index(Request $request)
    {


        $query = Kunjungan::query();



        // pencarian nama / instansi

        if($request->search){


            $query->where(function($q) use ($request){


                $q->where(
                    'nama_lengkap',
                    'like',
                    '%'.$request->search.'%'
                )

                ->orWhere(
                    'instansi_asal',
                    'like',
                    '%'.$request->search.'%'
                );


            });


        }




        // filter tanggal

        if($request->tanggal){


            $query->whereDate(
                'tanggal_kunjungan',
                $request->tanggal
            );


        }




        $kunjungans = $query

            ->orderBy(
                'created_at',
                'desc'
            )

            ->get();




        return view(
            'admin.tamu',
            compact('kunjungans')
        );


    }


}
