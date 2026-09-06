<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;


class AdminTamuController extends Controller
{

public function index(Request $request)
{

    $query = Kunjungan::query();


    // ==========================
    // PENCARIAN SEMUA KOLOM
    // ==========================

    if($request->search){

        $keyword = $request->search;


        $query->where(function($q) use ($keyword){

            $q->where('nama_lengkap','ILIKE','%'.$keyword.'%')

            ->orWhere('instansi_asal','ILIKE','%'.$keyword.'%')

            ->orWhere('jabatan','ILIKE','%'.$keyword.'%')

            ->orWhere('status','ILIKE','%'.$keyword.'%')

            ->orWhere('no_hp','ILIKE','%'.$keyword.'%')

            ->orWhere('keperluan','ILIKE','%'.$keyword.'%')

            ->orWhere('tujuan_bidang','ILIKE','%'.$keyword.'%')

            ->orWhere('bertemu_dengan','ILIKE','%'.$keyword.'%')

            ->orWhere('catatan','ILIKE','%'.$keyword.'%');

        });

    }



    // ==========================
    // FILTER TANGGAL
    // ==========================

    if($request->tanggal){

        $query->whereDate(
            'tanggal_kunjungan',
            $request->tanggal
        );

    }



    $kunjungans = $query
        ->latest()
        ->get();



    return view(
        'admin.tamu.index',
        compact('kunjungans')
    );

}

// DETAIL

public function show($id)
{

$data = Kunjungan::findOrFail($id);


return view(
'admin.tamu.detail',
compact('data')
);


}





// EDIT

public function edit($id)
{

$data = Kunjungan::findOrFail($id);


return view(
'admin.tamu.edit',
compact('data')
);


}






// UPDATE

public function update(Request $request,$id)
{


$data = Kunjungan::findOrFail($id);



$data->update([


'nama_lengkap'=>$request->nama_lengkap,

'instansi_asal'=>$request->instansi_asal,

'jabatan'=>$request->jabatan,

'status'=>$request->status,

'no_hp'=>$request->no_hp,

'keperluan'=>$request->keperluan,

'tujuan_bidang'=>$request->tujuan_bidang,

'bertemu_dengan'=>$request->bertemu_dengan,

'catatan'=>$request->catatan,


]);



return redirect('/admin/tamu')
->with(
'success',
'Data berhasil diperbarui'
);


}






// DELETE


public function destroy($id)
{


$data = Kunjungan::findOrFail($id);


$data->delete();



return back()
->with(
'success',
'Data berhasil dihapus'
);


}



}
