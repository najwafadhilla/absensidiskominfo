@extends('admin.layout')

@section('content')


<div class="dashboard-wrapper">


{{-- ================= HEADER ================= --}}

<div class="dashboard-banner">

    <div class="banner-content">


        <div>

            <h1>
                Dashboard
            </h1>


            <p>
                Selamat datang,
                <b>{{session('admin')}}</b>
            </p>


            <span>
                Sistem Informasi Buku Tamu Digital
                <br>
                DISKOMINFOSAN Kabupaten Aceh Tamiang
            </span>


        </div>



        <a href="/tamu" class="visitor-btn">

            <i class="bi bi-globe"></i>

            Halaman Pengunjung

        </a>



    </div>


</div>




{{-- ================= STATISTIK ================= --}}

<div class="row mt-4 g-4">


    {{-- TOTAL TAMU --}}
    <div class="col-lg-4 col-md-6">

        <div class="stat-card">

            <div class="stat-icon blue">
                <i class="bi bi-people-fill"></i>
            </div>


            <div class="stat-content">

                <p>Total Tamu</p>

                <h2>
                    {{$jumlahTamu}}
                </h2>

                <span>
                    Total pengunjung terdaftar
                </span>

            </div>


        </div>

    </div>





    {{-- TAMU HARI INI --}}
    <div class="col-lg-4 col-md-6">

        <div class="stat-card">


            <div class="stat-icon green">
                <i class="bi bi-calendar-check"></i>
            </div>



            <div class="stat-content">

                <p>Tamu Hari Ini</p>

                <h2 class="text-green">
                    {{$tamuHariIni}}
                </h2>


                <span>
                    Pengunjung hari ini
                </span>


            </div>



        </div>


    </div>







    {{-- BULAN INI --}}
    <div class="col-lg-4 col-md-6">


        <div class="stat-card">


            <div class="stat-icon yellow">
                <i class="bi bi-bar-chart-fill"></i>
            </div>



            <div class="stat-content">


                <p>Kunjungan Bulan Ini</p>


                <h2 class="text-yellow">
                    {{$kunjunganBulan}}
                </h2>


                <span>
                    Total bulan berjalan
                </span>


            </div>



        </div>


    </div>



</div>

{{-- ================= GRAFIK ================= --}}


<div class="row mt-4 g-4">



<div class="col-lg-7">


<div class="dashboard-card">


<div class="card-title">


<i class="bi bi-graph-up"></i>


<h5>
Kunjungan 7 Hari Terakhir
</h5>


</div>



<div class="chart-area">

<canvas id="kunjunganChart"></canvas>

</div>


</div>


</div>







<div class="col-lg-5">


<div class="dashboard-card">


<div class="card-title">

<i class="bi bi-bullseye"></i>


<h5>
Tujuan Kunjungan
</h5>


</div>




@foreach($tujuan as $item)

<a href="{{url('/admin/master-bidang/'.$item->tujuan_bidang)}}"
class="bidang-button">


<i class="bi bi-building"></i>


<span>
{{$item->tujuan_bidang}}
</span>


<b>
{{$item->total}}
</b>


</a>


@endforeach

</div>


</div>



</div>
{{-- ================= KUNJUNGAN TERBARU ================= --}}

<div class="dashboard-card mt-4">

    <div class="table-header">

        <div class="card-title">
            <i class="bi bi-clock-history"></i>

            <h5>
                Kunjungan Terbaru
            </h5>
        </div>


        <a href="/admin/tamu" class="lihat-btn">
            <i class="bi bi-eye"></i>
            Lihat Semua
        </a>

    </div>



    <div class="table-responsive">

<table class="table dashboard-table">
            <thead>

                <tr>

                    <th>No</th>

                    <th>Tanggal</th>

                    <th>Jam</th>

                    <th>Nama Lengkap</th>

                    <th>Instansi</th>

                    <th>Jabatan</th>

                    <th>Status</th>

                    <th>No HP</th>

                    <th>Keperluan</th>

                    <th>Tujuan Bidang</th>

                    <th>Bertemu Dengan</th>

                    <th>Catatan</th>



                </tr>

            </thead>



            <tbody>


            @foreach($kunjunganTerbaru as $index=>$data)


                <tr>


                    <td>
                        {{ $index+1 }}
                    </td>


                    <td>
                        {{ \Carbon\Carbon::parse($data->tanggal_kunjungan)->format('d-m-Y') }}
                    </td>


                    <td>
                        {{ $data->jam_kedatangan }}
                    </td>



                    <td>

                        <div class="user-name">

                            <div class="avatar">

                                {{ strtoupper(substr($data->nama_lengkap,0,2)) }}

                            </div>


                            {{ $data->nama_lengkap }}

                        </div>

                    </td>



                    <td>
                        {{ $data->instansi_asal ?? '-' }}
                    </td>



                    <td>
                        {{ $data->jabatan ?? '-' }}
                    </td>



                    <td>

                        <span class="status-badge">

                            {{ $data->status ?? '-' }}

                        </span>

                    </td>



                    <td>
                        {{ $data->no_hp }}
                    </td>



                    <td>
                        {{ $data->keperluan }}
                    </td>



                    <td>

                        <span class="tujuan-badge">

                            <i class="bi bi-building"></i>

                            {{ $data->tujuan_bidang }}

                        </span>

                    </td>



                    <td>
                        {{ $data->bertemu_dengan ?? '-' }}
                    </td>



                    <td>

                        {{ $data->catatan ?? '-' }}

                    </td>



                    <td>



                    </td>



                </tr>


            @endforeach


            </tbody>


        </table>


    </div>


</div>


{{-- ================= CHART JS ================= --}}



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>


new Chart(

document.getElementById('kunjunganChart'),

{


type:'line',


data:{


labels:@json($grafikTanggal),



datasets:[{


label:'Jumlah Kunjungan',


data:@json($grafikJumlah),



borderWidth:3,


tension:.4,


fill:true,


pointRadius:5



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









<style>
    .bidang-button{

display:flex;

align-items:center;

justify-content:space-between;

background:#eff6ff;

color:#2563eb;

padding:15px 18px;

border-radius:15px;

margin-bottom:12px;

text-decoration:none;

font-weight:700;

transition:.3s;

}


.bidang-button i{

font-size:20px;

}


.bidang-button:hover{

background:#2563eb;

color:white;

transform:translateX(5px);

}


.bidang-button b{

background:white;

color:#2563eb;

padding:5px 12px;

border-radius:20px;

}
/* ================= STAT CARD ================= */


.stat-card{

    background:white;

    border-radius:25px;

    padding:25px;

    display:flex;

    align-items:center;

    gap:25px;

    min-height:160px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);

    transition:.3s;

}


.stat-card:hover{

    transform:translateY(-5px);

}





.stat-icon{


    width:75px;

    height:75px;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:32px;

    flex-shrink:0;

}




.stat-icon.blue{

    background:#dbeafe;

    color:#2563eb;

}



.stat-icon.green{

    background:#dcfce7;

    color:#16a34a;

}



.stat-icon.yellow{

    background:#fef3c7;

    color:#eab308;

}





.stat-content p{


    margin:0;

    color:#64748b;

    font-size:16px;

    font-weight:700;

}



.stat-content h2{


    margin:8px 0;

    font-size:42px;

    font-weight:900;

    color:#0757a6;

}



.stat-content span{


    color:#94a3b8;

    font-size:14px;

}





.text-green{

    color:#16a34a!important;

}


.text-yellow{

    color:#eab308!important;

}




@media(max-width:768px){


.stat-card{

    padding:20px;

}



.stat-icon{

    width:60px;

    height:60px;

    font-size:25px;

}


.stat-content h2{

    font-size:32px;

}


}

/* ================= GLOBAL ================= */



.dashboard-wrapper{

background:#f4f8ff;

padding:20px;

}





/* ================= BANNER ================= */



.dashboard-banner{


height:220px;


border-radius:30px;


background:


linear-gradient(
90deg,
rgba(15,75,160,.95),
rgba(30,120,220,.5)
),
url('/images/kantordiskominfo.png');



background-size:cover;


background-position:center;



padding:40px;


color:white;


box-shadow:0 15px 40px #0002;



}





.banner-content{


height:100%;


display:flex;


align-items:center;


justify-content:space-between;



}



.banner-content h1{


font-size:42px;


font-weight:900;


margin:0;


}



.banner-content p{


font-size:18px;


margin-top:10px;


}



.banner-content span{


font-size:14px;


}





.visitor-btn{


background:white;


color:#0757a6;


padding:14px 25px;


border-radius:15px;


font-weight:700;


text-decoration:none;



}





/* ================= CARD ================= */



.info-card{


background:white;


border-radius:25px;


padding:25px;


display:flex;


justify-content:space-between;


align-items:center;


box-shadow:0 10px 30px #0001;



}




.info-card h6{


color:#64748b;


font-weight:700;


}



.info-card h2{


font-size:42px;


font-weight:900;


color:#0757a6;


margin:5px 0;



}



.info-card small{


color:#94a3b8;


}





.circle{


width:75px;


height:75px;


border-radius:50%;


display:flex;


justify-content:center;


align-items:center;


font-size:30px;


}





.blue{


background:#dbeafe;


color:#2563eb;


}



.green{


background:#dcfce7;


color:#16a34a;


}



.yellow{


background:#fef3c7;


color:#eab308;


}



.purple{


background:#ede9fe;


color:#7c3aed;


}





.green-text{


color:#16a34a!important;


}



.yellow-text{


color:#eab308!important;


}



.purple-text{


color:#7c3aed!important;


}





/* ================= DASHBOARD CARD ================= */



.dashboard-card{


background:white;


border-radius:25px;


padding:25px;


box-shadow:0 10px 30px #0001;


}





.card-title{


display:flex;


align-items:center;


gap:12px;


margin-bottom:25px;


}



.card-title i{


font-size:25px;


color:#2563eb;


}



.card-title h5{


font-weight:800;


margin:0;


}





.chart-area{


height:330px;


}





/* ================= TUJUAN ================= */



.tujuan-item{


margin-bottom:25px;


}



.tujuan-item span{


font-weight:700;


font-size:14px;


}



.progress{


height:10px;


background:#e5e7eb;


border-radius:20px;


margin-top:10px;


overflow:hidden;


}



.progress-fill{


height:100%;


background:#2563eb;


border-radius:20px;


}




/* ================= TABLE ================= */
/* ================= TABLE RESPONSIVE ================= */

/* ================= TABLE RESPONSIVE ================= */

.t/* ================= TABLE ================= */


.dashboard-card{
    overflow:hidden;
}



.table-responsive{

    width:100%;

    overflow-x:auto;

    border-radius:20px;

}



.dashboard-table{

    width:100%;
    border-collapse:separate;
    border-spacing:0 10px;
    overflow:hidden;


}



.dashboard-table thead th{

    background:#eff6ff;

    color:#0757a6;

    padding:15px 18px;

    font-weight:800;

    font-size:14px;

    white-space:nowrap;

}



.dashboard-table tbody tr{

    background:white;

    box-shadow:0 5px 15px rgba(0,0,0,.06);

}



.dashboard-table tbody td{

    padding:15px 18px;

    color:#475569;

    white-space:nowrap;

    vertical-align:middle;

}


/* HEADER BULAT */
.dashboard-table thead th:first-child{

    border-top-left-radius:20px;
    border-bottom-left-radius:20px;

}


.dashboard-table thead th:last-child{

    border-top-right-radius:20px;
    border-bottom-right-radius:20px;

}
/* UJUNG KIRI BARIS */
.dashboard-table tbody tr td:first-child{

    border-top-left-radius:20px;
    border-bottom-left-radius:20px;

}

/* kolom catatan */

.dashboard-table td:last-child{

    width:250px;

    max-width:250px;

    white-space:normal;

    word-break:break-word;

}



/* hover */

.dashboard-table tbody tr:hover{

    background:#f8fbff;

}


.dashboard-table tbody td{

    padding:15px 18px;

    color:#475569;

    white-space:nowrap;

    vertical-align:middle;

}


.table tbody tr{


background:white;

border-bottom:10px solid #f4f8ff;


}


.dashboard-table tbody td{

    padding:15px 18px;

    color:#475569;

    white-space:nowrap;

    vertical-align:middle;

}



/* kolom catatan */

.dashboard-table td:last-child{

    width:250px;

    max-width:250px;

    white-space:normal;

    word-break:break-word;

}



/* hover */

.dashboard-table tbody tr:hover{

    background:#f8fbff;

}

/* STATUS */


.status-badge{


background:#dcfce7;

color:#15803d;

padding:7px 12px;

border-radius:20px;

font-size:12px;

font-weight:700;


}



/* AKSI */


.action-btn{


display:flex;

gap:8px;


}



.action-btn a,
.action-btn button{


width:35px;

height:35px;

border:none;

border-radius:10px;

display:flex;

align-items:center;

justify-content:center;

text-decoration:none;


}



.btn-detail{

background:#dbeafe;

color:#2563eb;

}



.btn-edit{

background:#fef3c7;

color:#d97706;

}



.btn-delete{

background:#fee2e2;

color:#dc2626;

}

.table-header{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:20px;

}



.lihat-btn{


background:#eff6ff;


color:#2563eb;


padding:10px 18px;


border-radius:12px;


text-decoration:none;


font-weight:700;


font-size:14px;


}





.dashboard-table{


border-collapse:separate;


border-spacing:0 10px;


}



.dashboard-table thead th{


background:#eff6ff;


color:#0757a6;


border:none;


padding:15px;


font-size:14px;


}





.dashboard-table tbody tr{


background:white;


box-shadow:0 5px 15px #00000010;


}





.dashboard-table tbody td{


padding:15px;


border:none;


color:#475569;


}





.dashboard-table tbody tr:hover{


transform:translateY(-2px);


transition:.3s;


background:#f8fbff;


}





/* ================= USER AVATAR ================= */


.user-name{


display:flex;


align-items:center;


gap:12px;


font-weight:600;


}





.avatar{


width:38px;


height:38px;


border-radius:50%;


background:#dbeafe;


color:#2563eb;


display:flex;


align-items:center;


justify-content:center;


font-weight:800;


font-size:13px;


}





/* ================= BADGE TUJUAN ================= */



.tujuan-badge{


background:#eff6ff;


color:#2563eb;


padding:8px 12px;


border-radius:20px;


font-size:13px;


font-weight:700;


display:inline-flex;


align-items:center;


gap:6px;


}





/* ================= RESPONSIVE ================= */



@media(max-width:992px){



.banner-content{


flex-direction:column;


align-items:flex-start;


gap:20px;


}



.dashboard-banner{


height:auto;


}



.info-card h2{


font-size:32px;


}



.chart-area{


height:250px;


}


}




@media(max-width:576px){



.dashboard-wrapper{


padding:10px;


}



.banner-content h1{


font-size:30px;


}



.visitor-btn{


width:100%;


text-align:center;


}



.info-card{


padding:20px;


}



.circle{


width:60px;


height:60px;


font-size:22px;


}



.dashboard-card{


padding:18px;


}



}

@media(max-width:768px){

.dashboard-card{
    padding:15px;
}


.dashboard-table{
    min-width:1100px;
}

}


</style>


@endsection
