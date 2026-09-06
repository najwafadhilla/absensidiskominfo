<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;

class MasterBidangController extends Controller
{

    public function index(Request $request,$bidang)
    {

        $query = Kunjungan::where(
            'tujuan_bidang',
            $bidang
        );


        // SEARCH SEMUA KOLOM
        if($request->search){

            $keyword=$request->search;


            $query->where(function($q) use ($keyword){


                $q->where('nama_lengkap','ILIKE','%'.$keyword.'%')

                ->orWhere('instansi_asal','ILIKE','%'.$keyword.'%')

                ->orWhere('jabatan','ILIKE','%'.$keyword.'%')

                ->orWhere('status','ILIKE','%'.$keyword.'%')

                ->orWhere('no_hp','ILIKE','%'.$keyword.'%')

                ->orWhere('keperluan','ILIKE','%'.$keyword.'%')

                ->orWhere('bertemu_dengan','ILIKE','%'.$keyword.'%')

                ->orWhere('catatan','ILIKE','%'.$keyword.'%');


            });

        }



        $data=$query
        ->latest()
        ->get();



        return view(
            'admin.master-bidang.index',
            compact(
                'data',
                'bidang'
            )
        );


    }

}
