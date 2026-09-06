@extends('admin.layout')


@section('content')


<div class="container-fluid">



<!-- ================= HEADER ================= -->


<div class="page-header">


<div>


<h2>
Data Tamu
</h2>


<p>
Daftar seluruh kunjungan tamu
</p>


</div>



<a href="/tamu" class="btn btn-primary">

<i class="bi bi-globe"></i>

Halaman Pengunjung

</a>


</div>





<!-- ================= FILTER ================= -->


<div class="card-box mt-4">


<form method="GET" action="/admin/tamu">


<div class="row g-3">



<div class="col-md-6">


<label>
Pencarian
</label>


<input type="text"

name="search"

class="form-control"

placeholder="Cari nama, instansi, keperluan..."

value="{{request('search')}}">



</div>




<div class="col-md-3">


<label>
Tanggal
</label>


<input type="date"

name="tanggal"

class="form-control"

value="{{request('tanggal')}}">



</div>





<div class="col-md-3 d-flex align-items-end">


<button class="btn btn-primary w-100">


<i class="bi bi-search"></i>

Cari


</button>


</div>



</div>



</form>


</div>






<!-- ================= TABLE ================= -->


<div class="card-box mt-4">



<div class="table-responsive laporan-table">


<table class="table align-middle">



<thead>


<tr>


<th>No</th>

<th>Nama Lengkap</th>

<th>Instansi</th>

<th>Jabatan</th>

<th>Status</th>

<th>No HP</th>

<th>Keperluan</th>

<th>Tujuan Bidang</th>

<th>Bertemu Dengan</th>

<th>Catatan</th>

<th>Tanggal</th>

<th>Jam</th>

<th>Aksi</th>


</tr>


</thead>





<tbody>

@forelse($kunjungans as $index=>$data)

<tr>

<td>
{{$index+1}}
</td>



<td>


<b>

{{$data->nama_lengkap}}

</b>


</td>




<td>

{{$data->instansi_asal}}

</td>




<td>

{{$data->jabatan ?? '-'}}

</td>




<td>


<span class="badge-status">


{{$data->status ?? 'Umum'}}


</span>


</td>




<td>

{{$data->no_hp ?? '-'}}

</td>




<td>

{{$data->keperluan}}

</td>




<td>

{{$data->tujuan_bidang}}

</td>




<td>

{{$data->bertemu_dengan ?? '-'}}

</td>




<td>

@if($data->catatan)


<span class="catatan">

{{$data->catatan}}

</span>


@else

-

@endif


</td>




<td>


{{date('d M Y',strtotime($data->tanggal_kunjungan))}}


</td>




<td>

{{$data->jam_kedatangan}}

</td>




<td>


<a href="{{route('admin.tamu.show',$data->id)}}"

class="btn btn-info btn-sm">


<i class="bi bi-eye"></i>


</a>





<a href="{{route('admin.tamu.edit',$data->id)}}"

class="btn btn-warning btn-sm">


<i class="bi bi-pencil"></i>


</a>







<form action="{{route('admin.tamu.destroy',$data->id)}}"

method="POST"

style="display:inline">



@csrf

@method('DELETE')



<button

class="btn btn-danger btn-sm"

onclick="return confirm('Hapus data?')">


<i class="bi bi-trash"></i>


</button>



</form>



</td>



</tr>



@empty



<tr>


<td colspan="13"

class="text-center text-muted">


Belum ada data tamu


</td>


</tr>



@endforelse



</tbody>



</table>


</div>


</div>





</div>





<style>



.page-header{


background:white;

padding:25px;

border-radius:25px;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 10px 30px #0001;


}



.page-header h2{


font-weight:800;

color:#1265d8;


}



.page-header p{


color:#64748b;


}






.card-box{


background:white;

padding:25px;

border-radius:25px;

box-shadow:0 10px 30px #0001;


}






.form-control{


height:45px;

border-radius:12px;


}






.btn-primary{


background:#1265d8;

border:none;

border-radius:12px;

padding:12px 20px;


}







.laporan-table{


overflow-x:auto;


}





.laporan-table table{


min-width:1600px;


}





.laporan-table th{


background:#eff6ff;

color:#164e9b;

white-space:nowrap;


}





.laporan-table td{


white-space:nowrap;


}





.badge-status{


background:#dbeafe;

color:#1265d8;

padding:7px 15px;

border-radius:20px;

font-size:13px;


}




.catatan{


background:#f1f5f9;

padding:5px 10px;

border-radius:10px;


}



.table tbody tr:hover{


background:#f8fbff;


}



</style>



@endsection
