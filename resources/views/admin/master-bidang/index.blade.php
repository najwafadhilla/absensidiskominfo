@extends('admin.layout')


@section('content')


<div class="master-wrapper">


<!-- ================= HEADER ================= -->
<div class="master-header">


<a href="{{ route('admin.dashboard') }}" class="btn-back">
        <i class="bi bi-arrow-left"></i>

    </a>



    <div class="header-text">

        <h1>
            {{ $bidang }}
        </h1>

    </div>


</div>


</div>





<!-- ================= SEARCH ================= -->


<div class="master-card">


<form method="GET">


<div class="search-area">


<div class="search-box">


<i class="bi bi-search"></i>


<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Cari semua data..."
>


</div>



<button class="btn-search">

<i class="bi bi-search"></i>

Cari

</button>




<a href="{{ url()->current() }}" class="btn-reset">

<i class="bi bi-arrow-repeat"></i>

Reset

</a>



</div>


</form>


</div>







<!-- ================= TOTAL ================= -->


<div class="master-card">


<div class="total-data">


<div class="total-icon">

<i class="bi bi-people-fill"></i>

</div>



<div>

<span>Total Data</span>

<h2>
{{ $data->count() }}
</h2>


</div>



</div>


</div>







<!-- ================= TABLE ================= -->


<div class="master-card">


<div class="table-responsive">


<table class="master-table">


<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Instansi</th>

<th>Jabatan</th>

<th>Status</th>

<th>No HP</th>

<th>Keperluan</th>

<th>Bertemu Dengan</th>

<th>Catatan</th>

<th>Tanggal</th>


</tr>


</thead>



<tbody>



@forelse($data as $i=>$item)


<tr>


<td>
{{ $i+1 }}
</td>



<td>

<b>

{{ $item->nama_lengkap }}

</b>

</td>




<td>

{{ $item->instansi_asal }}

</td>




<td>

{{ $item->jabatan ?? '-' }}

</td>





<td>

<span class="status">

{{ $item->status ?? 'Umum' }}

</span>

</td>





<td>

{{ $item->no_hp ?? '-' }}

</td>





<td>

{{ $item->keperluan }}

</td>





<td>

{{ $item->bertemu_dengan ?? '-' }}

</td>





<td class="catatan">

{{ $item->catatan ?? '-' }}

</td>





<td>

{{ date('d M Y',strtotime($item->tanggal_kunjungan)) }}

</td>



</tr>



@empty


<tr>

<td colspan="10" class="empty">

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


.master-wrapper{

padding:10px;

}



/* HEADER */

.master-header{

display:flex;

align-items:center;

gap:20px;

margin-bottom:20px;

}



.btn-back{

width:55px;

height:55px;

background:white;

border-radius:15px;

display:flex;

align-items:center;

justify-content:center;

font-size:25px;

color:#1265d8;

text-decoration:none;

box-shadow:
0 8px 25px rgba(0,0,0,.08);

transition:.3s;

flex-shrink:0;

}



.btn-back:hover{

background:#1265d8;

color:white;

transform:translateX(-5px);

}




.header-text h1{

margin:0;

font-size:36px;

font-weight:900;

color:#16233b;

}



.header-text p{

margin:8px 0 0;

color:#64748b;

font-size:16px;

}






/* CARD */


.master-card{

background:white;

padding:25px;

border-radius:25px;

box-shadow:
0 10px 30px rgba(0,0,0,.06);

margin-bottom:25px;

}







/* SEARCH */


.search-area{

display:flex;

gap:15px;

}



.search-box{

flex:1;

height:55px;

display:flex;

align-items:center;

gap:12px;

padding:0 20px;

border:1px solid #dbeafe;

border-radius:15px;

}



.search-box i{

color:#1265d8;

}



.search-box input{

width:100%;

border:none;

outline:none;

font-size:16px;

}





.btn-search{

border:none;

background:#1265d8;

color:white;

padding:0 30px;

border-radius:15px;

font-weight:700;

}



.btn-reset{

display:flex;

align-items:center;

padding:0 25px;

background:white;

border:1px solid #dbeafe;

border-radius:15px;

color:#475569;

text-decoration:none;

font-weight:700;

}







/* TOTAL */


.total-data{

display:flex;

align-items:center;

gap:20px;

}



.total-icon{

width:65px;

height:65px;

background:#dbeafe;

color:#1265d8;

border-radius:50%;

display:flex;

align-items:center;

justify-content:center;

font-size:30px;

}



.total-data span{

color:#64748b;

font-weight:700;

}



.total-data h2{

margin:5px 0;

color:#1265d8;

font-weight:900;

}







/* TABLE */


.table-responsive{

overflow-x:auto;

}



.master-table{

width:100%;

min-width:1400px;

border-collapse:separate;

border-spacing:0 12px;

}



.master-table th{

background:#eff6ff;

color:#0757a6;

padding:18px;

font-weight:800;

white-space:nowrap;

}



.master-table th:first-child{

border-radius:15px 0 0 15px;

}



.master-table th:last-child{

border-radius:0 15px 15px 0;

}





.master-table td{

background:white;

padding:18px;

color:#475569;

white-space:nowrap;

vertical-align:middle;

}




.master-table tbody tr{

box-shadow:
0 5px 15px rgba(0,0,0,.05);

transition:.3s;

}



.master-table tbody tr:hover{

transform:translateY(-3px);

}




.master-table tbody td:first-child{

border-radius:15px 0 0 15px;

}



.master-table tbody td:last-child{

border-radius:0 15px 15px 0;

}







/* CATATAN */

.master-table td.catatan{

white-space:normal;

min-width:250px;

max-width:300px;

word-break:break-word;

}







/* STATUS */


.status{

background:#dcfce7;

color:#15803d;

padding:7px 15px;

border-radius:20px;

font-size:13px;

font-weight:700;

}







.empty{

text-align:center;

padding:30px!important;

color:#64748b;

}





@media(max-width:768px){


.search-area{

flex-direction:column;

}



.btn-search,
.btn-reset{

height:50px;

justify-content:center;

}


}



</style>



@endsection
