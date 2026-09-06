<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;



class AdminController extends Controller
{


    // ==========================
    // HALAMAN LOGIN
    // ==========================

    public function login()
    {

        return view('admin.login');

    }





    // ==========================
    // PROSES LOGIN
    // ==========================

    public function prosesLogin(Request $request)
    {


        $request->validate([

            'username'=>'required',

            'password'=>'required'

        ]);




        $admin = Admin::where(
            'username',
            $request->username
        )->first();





        if(
            $admin &&
            Hash::check(
                $request->password,
                $admin->password
            )
        ){


            session([

                'admin'=>$admin->nama

            ]);



            return redirect('/admin/dashboard');


        }





        return back()->with(

            'error',

            'Username atau password salah'

        );



    }









    // ==========================
    // DASHBOARD
    // ==========================


    public function dashboard()
    {


        $data = Cache::remember(

            'dashboard_admin',

            60,

            function(){



            // TOTAL TAMU

            $jumlahTamu = Kunjungan::count();





            // TAMU HARI INI

            $tamuHariIni = Kunjungan::whereDate(

                'tanggal_kunjungan',

                now()->toDateString()

            )->count();







            // KUNJUNGAN BULAN INI

            $kunjunganBulan = Kunjungan::whereMonth(

                'tanggal_kunjungan',

                now()->month

            )

            ->whereYear(

                'tanggal_kunjungan',

                now()->year

            )

            ->count();







            // DATA TERBARU

            $kunjunganTerbaru = Kunjungan::orderBy(

                'created_at',

                'desc'

            )

            ->limit(5)

            ->get();








            // ==========================
            // GRAFIK 7 HARI
            // ==========================


            $grafikTanggal=[];

            $grafikJumlah=[];



            for($i=6;$i>=0;$i--){



                $tanggal = now()->subDays($i);



                $grafikTanggal[] =
                $tanggal->format('d M');



                $grafikJumlah[] =
                Kunjungan::whereDate(

                    'tanggal_kunjungan',

                    $tanggal->toDateString()

                )->count();



            }









            // ==========================
            // TUJUAN KUNJUNGAN
            // ==========================


            $tujuan = Kunjungan::select(

                'tujuan_bidang',

                DB::raw(
                    'COUNT(*) as total'
                )

            )

            ->groupBy(

                'tujuan_bidang'

            )

            ->orderBy(

                'total',

                'desc'

            )

            ->get();







            return [


                'jumlahTamu'=>$jumlahTamu,


                'tamuHariIni'=>$tamuHariIni,


                'kunjunganBulan'=>$kunjunganBulan,


                'kunjunganTerbaru'=>$kunjunganTerbaru,


                'grafikTanggal'=>$grafikTanggal,


                'grafikJumlah'=>$grafikJumlah,


                'tujuan'=>$tujuan


            ];



        });








        return view(

            'admin.dashboard',

            $data

        );



    }









    // ==========================
    // LOGOUT
    // ==========================


    public function logout()
    {


        session()->forget('admin');


        Cache::forget(
            'dashboard_admin'
        );


        return redirect('/login');


    }

public function update(Request $request, $id)
{
    $data = Kunjungan::findOrFail($id);

    $data->update([
        'nama_lengkap'=>$request->nama_lengkap,
        'instansi_asal'=>$request->instansi_asal,
        'jabatan'=>$request->jabatan,
        'no_hp'=>$request->no_hp,
        'keperluan'=>$request->keperluan,
        'tujuan_bidang'=>$request->tujuan_bidang,
        'bertemu_dengan'=>$request->bertemu_dengan,
        'catatan'=>$request->catatan,
    ]);


    return redirect('/admin/tamu')
    ->with('success','Data berhasil diperbarui');
}

}

