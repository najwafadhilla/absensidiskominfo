<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Carbon\Carbon;


class LaporanController extends Controller
{


public function index(Request $request)
{


// ==============================
// LIST KEPERLUAN
// ==============================

$keperluan = Kunjungan::select('keperluan')
->whereNotNull('keperluan')
->where('keperluan','!=','')
->groupBy('keperluan')
->orderBy('keperluan')
->get();




// ==============================
// LIST BIDANG
// ==============================

$bidang = Kunjungan::select('tujuan_bidang')
->whereNotNull('tujuan_bidang')
->where('tujuan_bidang','!=','')
->groupBy('tujuan_bidang')
->orderBy('tujuan_bidang')
->get();





// ==============================
// FILTER DATA LAPORAN
// ==============================

$query = Kunjungan::query();



// FILTER KEPERLUAN

if(
$request->keperluan &&
$request->keperluan != "semua"
)
{

$query->where(
'keperluan',
$request->keperluan
);

}




// FILTER MULTI BIDANG

if(
$request->filled('bidang')
)
{

$query->whereIn(
'tujuan_bidang',
$request->bidang
);

}




// ==============================
// FILTER PERIODE
// ==============================


// MINGGUAN

if(
$request->periode=="minggu" &&
$request->tanggal
)
{


$tanggalAwal = Carbon::parse(
$request->tanggal
);


$tanggalAkhir = $tanggalAwal->copy()
->addDays(6);



$query->whereBetween(
'tanggal_kunjungan',
[
$tanggalAwal->startOfDay(),
$tanggalAkhir->endOfDay()
]
);


}




// BULANAN

if(
$request->periode=="bulan" &&
$request->bulan_tahun
)
{


$tanggal = explode(
'-',
$request->bulan_tahun
);



$query->whereMonth(
'tanggal_kunjungan',
$tanggal[1]
);



$query->whereYear(
'tanggal_kunjungan',
$tanggal[0]
);



}




// TAHUNAN

if(
$request->periode=="tahun" &&
$request->tahun
)
{


$query->whereYear(
'tanggal_kunjungan',
$request->tahun
);


}




// AMBIL DATA

$data = $query
->latest()
->get();









// ==============================
// STATISTIK BIDANG
// ==============================


$statistikBidang = Kunjungan::select(
'tujuan_bidang'
)

->selectRaw(
'COUNT(*) as jumlah'
)

->whereNotNull(
'tujuan_bidang'
)

->where(
'tujuan_bidang',
'!=',
''
)

->groupBy(
'tujuan_bidang'
)

->orderBy(
'tujuan_bidang'
)

->get();





// ==============================
// GRAFIK BIDANG
// ==============================


$grafikBidang=[];

$grafikJumlah=[];


foreach($statistikBidang as $item)
{


$grafikBidang[]=$item->tujuan_bidang;


$grafikJumlah[]=$item->jumlah;


}






// ==============================
// GRAFIK BULAN
// ==============================


$grafikBulan=[];


for($i=1;$i<=12;$i++)
{

$grafikBulan[$i]=0;

}



$bulanData = Kunjungan::selectRaw(
'EXTRACT(MONTH FROM tanggal_kunjungan) as bulan,
COUNT(*) as total'
)

->groupBy('bulan')

->pluck(
'total',
'bulan'
);



foreach($bulanData as $bulan=>$jumlah)
{

$grafikBulan[$bulan]=$jumlah;

}





return view(
'admin.laporan',
[

'bidang'=>$bidang,

'keperluan'=>$keperluan,

'data'=>$data,

'total'=>$data->count(),

'statistikBidang'=>$statistikBidang,

'grafikBidang'=>$grafikBidang,

'grafikJumlah'=>$grafikJumlah,

'grafikBulan'=>$grafikBulan

]

);


}







// ==============================
// CETAK LAPORAN
// ==============================


public function cetak(Request $request)
{


$query = Kunjungan::query();




// FILTER KEPERLUAN

if(
$request->keperluan &&
$request->keperluan!="semua"
)
{


$query->where(
'keperluan',
$request->keperluan
);


}




// FILTER MULTI BIDANG

if(
$request->filled('bidang')
)
{


$query->whereIn(
'tujuan_bidang',
$request->bidang
);


}





// FILTER MINGGUAN

if(
$request->periode=="minggu" &&
$request->tanggal
)
{


$awal = Carbon::parse(
$request->tanggal
);


$akhir = $awal->copy()
->addDays(6);



$query->whereBetween(
'tanggal_kunjungan',
[
$awal->startOfDay(),
$akhir->endOfDay()
]
);


}






// FILTER BULANAN

if(
$request->periode=="bulan" &&
$request->bulan_tahun
)
{


$tanggal = explode(
'-',
$request->bulan_tahun
);



$query->whereMonth(
'tanggal_kunjungan',
$tanggal[1]
);



$query->whereYear(
'tanggal_kunjungan',
$tanggal[0]
);



}






// FILTER TAHUNAN

if(
$request->periode=="tahun" &&
$request->tahun
)
{


$query->whereYear(
'tanggal_kunjungan',
$request->tahun
);


}





$data = $query
->latest()
->get();




return view(
'admin.laporan-cetak',
[

'data'=>$data,

'judul'=>'Laporan Kunjungan'

]

);


}


}
