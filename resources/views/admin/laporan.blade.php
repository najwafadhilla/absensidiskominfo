@extends('admin.layout')


@section('content')


<div class="laporan-wrapper">



<!-- ================= HEADER ================= -->

<div class="laporan-header">


<div class="header-left">


<div class="icon-box">

<i class="bi bi-file-earmark-text"></i>

</div>


<div>

<h1>
Laporan Kunjungan
</h1>


<p>
Sistem Informasi Buku Tamu Digital
<br>
DISKOMINFOSAN Kabupaten Aceh Tamiang
</p>


</div>


</div>



<a href="/admin/laporan/cetak?{{http_build_query(request()->all())}}"
target="_blank"
class="btn-print">


<i class="bi bi-printer"></i>

Cetak Laporan


</a>


</div>








<!-- ================= FILTER ================= -->


<div class="filter-card mt-4">


<div class="section-title">

<i class="bi bi-funnel-fill"></i>

Filter Laporan

</div>




<form method="GET" action="/admin/laporan">


<div class="row g-4">


<div class="col-lg-3 col-md-6">

<label>
Jenis Laporan
</label>

<select name="keperluan" class="form-control">

<option value="semua">
Semua Keperluan
</option>


@foreach($keperluan as $k)

<option value="{{$k->keperluan}}">
{{$k->keperluan}}
</option>

@endforeach

</select>

</div>


<div class="col-lg-3 col-md-6">

<label>
Pilih Bidang
</label>

<select
name="bidang[]"
class="selectpicker"
multiple
data-live-search="true"
data-actions-box="true"
title="Pilih Bidang">

@foreach($bidang as $b)

<option value="{{$b->tujuan_bidang}}"
{{in_array($b->tujuan_bidang, request('bidang',[])) ? 'selected':''}}>

{{$b->tujuan_bidang}}

</option>

@endforeach

</select>

</div>




<div class="col-lg-3 col-md-6">

<label>
Periode Laporan
</label>


<select name="periode" class="form-control">

<option value="">
Semua Waktu
</option>

<option value="minggu"
{{request('periode')=='minggu'?'selected':''}}>
Mingguan
</option>

<option value="bulan"
{{request('periode')=='bulan'?'selected':''}}>
Bulanan
</option>

<option value="tahun"
{{request('periode')=='tahun'?'selected':''}}>
Tahunan
</option>

</select>

</div>




<div class="col-lg-3 col-md-6">

<label>
Periode Waktu</label>


<div id="waktu-area">

<input
type="text"
class="form-control"
placeholder="Pilih periode terlebih dahulu"
readonly>

</div>

</div>
<div class="col-12 text-center mt-3">


<button class="btn-search">

<i class="bi bi-search"></i>

Tampilkan

</button>


</div>


</div>

</form>


</div>










<!-- ================= GRAFIK ================= -->



<div class="row mt-4 g-4">



<div class="col-lg-5">


<div class="chart-card">


<h5>

Distribusi Bidang

</h5>



<div class="chart-box">


<canvas id="bidangChart"></canvas>


</div>


</div>


</div>







<div class="col-lg-7">


<div class="chart-card">


<h5>

Tren Kunjungan

</h5>


<div class="chart-box">


<canvas id="lineChart"></canvas>


</div>


</div>


</div>



</div>









<!-- ================= TABLE ================= -->



<div class="table-card mt-4">


<div class="table-header">


<h5>

<i class="bi bi-table"></i>

Hasil Laporan

</h5>


</div>





<div class="table-responsive laporan-table">

<table class="table">


<thead>


<tr>

<th>No</th>
<th>Nama Lengkap</th>
<th>Instansi</th>
<th>Jabatan</th>
<th>Status</th>
<th>No HP</th>
<th>Keperluan</th>
<th>Bidang</th>
<th>Bertemu Dengan</th>
<th>Catatan</th>
<th>Tanggal</th>


</tr>


</thead>




<tbody>


@forelse($data as $i=>$d)


<tr>


<td>
{{$i+1}}
</td>

<td>{{$d->nama_lengkap}}</td>

<td>{{$d->instansi_asal}}</td>

<td>{{$d->jabatan}}</td>

<td>{{$d->status}}</td>

<td>{{$d->no_hp}}</td>

<td>{{$d->keperluan}}</td>

<td>{{$d->tujuan_bidang}}</td>

<td>{{$d->bertemu_dengan}}</td>

<td>{{$d->catatan}}</td>

<td>{{$d->tanggal_kunjungan}}</td>


</tr>


@empty


<tr>

<td colspan="6" class="text-center">

Data tidak ditemukan

</td>

</tr>


@endforelse



</tbody>


</table>


</div>


</div>




</div>









<style>
.bootstrap-select{
    width:100%!important;
}


.bootstrap-select .dropdown-toggle{

    height:45px;

    border-radius:12px;

    background:white;

    border:1px solid #dee2e6;

    color:#1e293b;

}


.bootstrap-select .dropdown-menu{

    border-radius:12px;

}


.bootstrap-select .dropdown-menu li a{

    padding:10px 15px;

}
.bidang-item input{

accent-color:#1265d8;

}

.laporan-wrapper{

background:#f5f9ff;

padding:20px;

}




.laporan-header{

background:white;

padding:25px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 10px 30px #0001;

}





.header-left{

display:flex;

align-items:center;

gap:20px;

}





.icon-box{

width:60px;

height:60px;

background:#dbeafe;

border-radius:15px;

display:flex;

align-items:center;

justify-content:center;

font-size:30px;

color:#1265d8;

}


.laporan-table{
overflow-x:auto;
}


.laporan-table table{
min-width:1400px;
}


.laporan-table th{
white-space:nowrap;
}


.laporan-table td{
white-space:nowrap;
}


.laporan-header h1{

font-weight:800;

color:#1265d8;

}





.laporan-header p{

color:#64748b;

}





.btn-print{

background:#1265d8;

color:white;

padding:14px 25px;

border-radius:15px;

text-decoration:none;

font-weight:bold;

}





.filter-card,
.chart-card,
.table-card{


background:white;

padding:25px;

border-radius:25px;

box-shadow:0 10px 30px #0001;


}






.section-title{

font-size:20px;

font-weight:800;

color:#164e9b;

margin-bottom:20px;

}





label{

font-weight:700;

font-size:14px;

}





.form-control{

height:45px;

border-radius:12px;

}
input[type="month"]{

height:45px;

border-radius:12px;

padding:10px;

}





.btn-search{

width:250px;

height:45px;

background:#1265d8;

border:none;

border-radius:12px;

color:white;

font-weight:bold;

}




.stat-card{

background:white;

padding:25px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 10px 30px #0001;


}





.stat-card h2{

font-size:35px;

font-weight:900;

}





.stat-card i{

font-size:35px;

}





.blue h2,
.blue i{

color:#2563eb;

}





.green h2,
.green i{

color:#16a34a;

}





.chart-box{

height:280px;

}





.table thead th{

background:#eff6ff;

color:#164e9b;

}




.table tbody tr:hover{

background:#f8fbff;

}
.bootstrap-select{
width:100%!important;
}

.bootstrap-select .dropdown-toggle{

height:45px;
border-radius:12px;
background:white;
border:1px solid #dee2e6;
text-align:left;

}


</style>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>


new Chart(
document.getElementById('bidangChart'),
{

type:'doughnut',

data:{

labels:@json($grafikBidang),

datasets:[{

label:'Jumlah Kunjungan',

data:@json($grafikJumlah)

}]

},


options:{

responsive:true,

maintainAspectRatio:false

}


}

);





new Chart(
document.getElementById('lineChart'),
{

type:'line',

data:{

labels:[
'Jan',
'Feb',
'Mar',
'Apr',
'Mei',
'Jun',
'Jul',
'Agu',
'Sep',
'Okt',
'Nov',
'Des'
],


datasets:[{

label:'Jumlah Kunjungan',

data:@json(array_values($grafikBulan)),

tension:.4

}]


},


options:{

responsive:true,

maintainAspectRatio:false

}


}

);


</script>
<script>

$(document).ready(function(){


    $('.selectpicker').selectpicker();



    function tampilkanWaktu(){


        let periode = $('select[name="periode"]').val();

        let html = '';



        if(periode == "minggu"){


            html = `

            <input
            type="date"
            name="tanggal"
            class="form-control"
            value="{{request('tanggal')}}">

            <small class="text-muted">
            Pilih tanggal awal minggu
            </small>

            `;


        }

        else if(periode == "bulan"){


            html = `

            <input
            type="month"
            name="bulan_tahun"
            class="form-control"
            value="{{request('bulan_tahun')}}">

            `;


        }

        else if(periode == "tahun"){


            html = `

            <input
            type="number"
            name="tahun"
            class="form-control"
            placeholder="Contoh 2026"
            value="{{request('tahun')}}">

            `;


        }

        else {


            html = `

            <input
            type="text"
            class="form-control"
            value="Semua waktu"
            readonly>

            `;


        }


        $('#waktu-area').html(html);


    }



    $('select[name="periode"]').on('change',function(){

        tampilkanWaktu();

    });



    // supaya ketika reload tetap muncul
    tampilkanWaktu();



});

</script>
@endsection
