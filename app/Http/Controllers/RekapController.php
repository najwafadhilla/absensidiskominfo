<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\DB;


class RekapController extends Controller
{


    public function index()
    {


        // ==========================
        // REKAP BIDANG
        // ==========================


        $rekapBidang = Kunjungan::select(

            'tujuan_bidang',

            DB::raw('COUNT(*) as total')

        )
        ->whereNotNull('tujuan_bidang')
        ->groupBy('tujuan_bidang')
        ->orderBy('total','desc')
        ->get();





        // ==========================
        // REKAP INSTANSI
        // ==========================


        $rekapInstansi = Kunjungan::select(

            'instansi_asal',

            DB::raw('COUNT(*) as total')

        )
        ->whereNotNull('instansi_asal')
        ->groupBy('instansi_asal')
        ->orderBy('total','desc')
        ->get();







        // ==========================
        // GRAFIK 7 HARI
        // ==========================


        $grafikTanggal = [];

        $grafikJumlah = [];



        for($i=6;$i>=0;$i--){


            $tanggal = now()->subDays($i);


            $grafikTanggal[] =
            $tanggal->format('d M');



            $grafikJumlah[] =
            Kunjungan::whereDate(

                'tanggal_kunjungan',

                $tanggal->format('Y-m-d')

            )->count();


        }






        return view(

            'admin.rekap',

            compact(

                'rekapBidang',

                'rekapInstansi',

                'grafikTanggal',

                'grafikJumlah'

            )

        );


    }








    // DETAIL TAMU PER BIDANG

    public function detail($bidang)
    {


        $dataTamu = Kunjungan::where(

            'tujuan_bidang',

            $bidang

        )

        ->orderBy(

            'tanggal_kunjungan',

            'desc'

        )

        ->get();



        return view(

            'admin.detail-rekap',

            compact(

                'dataTamu',

                'bidang'

            )

        );


    }



}
