<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Carbon\Carbon;



class DashboardController extends Controller
{


    public function index()
    {


        // =========================
        // TOTAL TAMU
        // =========================

        $jumlahTamu = Kunjungan::count();



        // =========================
        // TAMU HARI INI
        // =========================

        $tamuHariIni = Kunjungan::whereDate(
            'tanggal_kunjungan',
            Carbon::today()
        )->count();





        // =========================
        // KUNJUNGAN BULAN INI
        // =========================

        $kunjunganBulan = Kunjungan::whereMonth(
            'tanggal_kunjungan',
            Carbon::now()->month
        )
        ->whereYear(
            'tanggal_kunjungan',
            Carbon::now()->year
        )
        ->count();







        // =========================
        // DATA TUJUAN KUNJUNGAN
        // =========================

        $tujuan = Kunjungan::select(
            'tujuan_bidang'
        )
        ->selectRaw(
            'COUNT(*) as total'
        )
        ->whereNotNull(
            'tujuan_bidang'
        )
        ->groupBy(
            'tujuan_bidang'
        )
        ->orderBy(
            'total',
            'desc'
        )
        ->get();








        // =========================
        // KUNJUNGAN TERBARU
        // =========================

        $kunjunganTerbaru = Kunjungan::latest()
        ->limit(5)
        ->get();









        // =========================
        // GRAFIK 7 HARI
        // =========================


        $grafikTanggal = [];

        $grafikJumlah = [];



        for($i=6;$i>=0;$i--)
        {


            $tanggal = Carbon::now()
            ->subDays($i);



            $grafikTanggal[] =
            $tanggal->format('d M');




            $grafikJumlah[] =
            Kunjungan::whereDate(
                'tanggal_kunjungan',
                $tanggal
            )
            ->count();



        }








        return view(
            'admin.dashboard',
            [

                'jumlahTamu'=>$jumlahTamu,

                'tamuHariIni'=>$tamuHariIni,

                'kunjunganBulan'=>$kunjunganBulan,

                'tujuan'=>$tujuan,

                'kunjunganTerbaru'=>$kunjunganTerbaru,

                'grafikTanggal'=>$grafikTanggal,

                'grafikJumlah'=>$grafikJumlah


            ]
        );



    }



}
