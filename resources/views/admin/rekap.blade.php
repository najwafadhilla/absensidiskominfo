@extends('admin.layout')


@section('content')



<!-- HEADER -->

<div class="topbar rekap-header">


<div class="d-flex justify-content-between align-items-center">


<div class="d-flex align-items-center gap-4">


<div class="rekap-icon">

<i class="bi bi-bar-chart-fill"></i>

</div>


<div>

<h2 class="fw-bold mb-1">
Rekap Kunjungan
</h2>


<p class="text-muted mb-0">
Monitoring statistik kunjungan tamu
<br>
DISKOMINFOSAN Kabupaten Aceh Tamiang
</p>


</div>


</div>



<div class="text-end">


<span class="update-badge">

<i class="bi bi-clock-history me-2"></i>

Update Data

</span>


<p class="text-muted mt-2 mb-0">

{{date('d F Y')}}

</p>


</div>


</div>


</div>







<!-- CARD REKAP -->


<div class="row g-4 mt-1">


<!-- BIDANG -->


<div class="col-lg-6">


<div class="card-box modern-card">


<div class="section-title">


<div class="section-icon blue">

<i class="bi bi-building"></i>

</div>


<div>

<h5>
Rekap Bidang / Bagian
</h5>


<small>
Jumlah tamu berdasarkan tujuan
</small>


</div>


</div>




<div class="data-list">


@foreach($rekapBidang as $item)


<div class="data-row">


<div>

<strong>

{{$item->tujuan_bidang}}

</strong>


<p>
Bidang tujuan kunjungan
</p>


</div>



<div class="d-flex gap-2 align-items-center">


<div class="count blue-count">

{{$item->total}}

<span>
Tamu
</span>

</div>



<a href="/admin/rekap/{{$item->tujuan_bidang}}"
class="btn btn-sm btn-primary">

<i class="bi bi-eye"></i>

</a>


</div>


</div>


@endforeach


</div>


</div>


</div>









<!-- INSTANSI -->


<div class="col-lg-6">


<div class="card-box modern-card">


<div class="section-title">


<div class="section-icon green">

<i class="bi bi-people-fill"></i>

</div>


<div>

<h5>
Rekap Instansi
</h5>


<small>
Asal instansi pengunjung
</small>


</div>


</div>



<div class="data-list">


@foreach($rekapInstansi as $item)


<div class="data-row">


<div>


<strong>

{{$item->instansi_asal}}

</strong>


<p>
Instansi asal tamu
</p>


</div>




<div>


<span class="count green-count">

<i class="bi bi-people-fill me-1"></i>

{{$item->total}}

<span>
Tamu
</span>

</span>


</div>



</div>



@endforeach


</div>



</div>


</div>



</div>


<!-- GRAFIK -->


<div class="card-box chart-card mt-4">


<div class="section-title">


<div class="section-icon blue">

<i class="bi bi-graph-up"></i>

</div>


<div>


<h5>

Grafik Kunjungan Minggu Ini

</h5>


<small>

Statistik kunjungan 7 hari terakhir

</small>


</div>


</div>





<div style="height:350px">

<canvas id="rekapChart"></canvas>

</div>



</div>









<style>



.rekap-header{


background:

linear-gradient(
135deg,
#ffffff,
#eef7ff
);


border-left:

6px solid #0757a6;


}





.rekap-icon{


width:80px;

height:80px;


border-radius:25px;


background:

linear-gradient(
135deg,
#0757a6,
#0ea5e9
);



display:flex;

align-items:center;

justify-content:center;


color:white;


font-size:35px;


box-shadow:

0 10px 30px rgba(7,87,166,.25);


}




.update-badge{


background:#dbeafe;

color:#0757a6;


padding:10px 22px;


border-radius:30px;


font-weight:600;


}







.modern-card{


height:100%;


}





.section-title{


display:flex;


align-items:center;


gap:15px;


margin-bottom:25px;


}



.section-title h5{


font-weight:800;


margin:0;


}



.section-title small{


color:#64748b;


}



.section-icon{


width:55px;

height:55px;


border-radius:18px;


display:flex;

align-items:center;


justify-content:center;


font-size:24px;


}



.section-icon.blue{


background:#dbeafe;


color:#0757a6;


}




.section-icon.green{


background:#dcfce7;


color:#16a34a;


}






.data-row{


display:flex;


justify-content:space-between;


align-items:center;


padding:18px 0;


border-bottom:

1px solid #edf2f7;


}



.data-row:last-child{

border:none;

}




.data-row strong{


font-size:16px;


}



.data-row p{


margin:5px 0 0;


font-size:13px;


color:#64748b;


}







.count{


padding:10px 16px;


border-radius:30px;


font-weight:700;


font-size:14px;


}



.count span{


font-size:12px;


}





.blue-count{


background:#dbeafe;


color:#0757a6;


}



.green-count{


background:#dcfce7;


color:#15803d;


}




.chart-card{


background:white;


}



</style>








<script>


new Chart(

document.getElementById('rekapChart'),

{


type:'bar',


data:{


labels:@json($grafikTanggal),



datasets:[{


label:'Jumlah Kunjungan',


data:@json($grafikJumlah),


backgroundColor:'#0ea5e9',


borderRadius:15,


barThickness:35



}]


},



options:{


responsive:true,


maintainAspectRatio:false,


plugins:{


legend:{


display:false


}


},



scales:{


y:{


beginAtZero:true,


ticks:{


precision:0


}


}


}



}



}

);


</script>



@endsection
