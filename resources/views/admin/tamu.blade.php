@extends('admin.layout')


@section('content')

<h1 style="color:red">
TES HALAMAN ADMIN
</h1>





<!-- HEADER -->

<div class="topbar">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h3 class="fw-bold mb-1">
                Data Tamu
            </h3>

            <p class="text-muted mb-0">
                Daftar seluruh kunjungan tamu
            </p>

        </div>



        <a href="/tamu" class="btn btn-primary">

            <i class="bi bi-globe me-2"></i>

            Halaman Pengunjung

        </a>


    </div>

</div>







<!-- FILTER -->

<div class="card-box mb-4">


<form method="GET" action="/admin/tamu">


<div class="row g-3">


<div class="col-lg-6">

<input type="text"

name="search"

class="form-control form-control-lg"

placeholder="Cari nama, instansi, keperluan..."

value="{{request('search')}}">

</div>




<div class="col-lg-3">

<input type="date"

name="tanggal"

class="form-control form-control-lg"

value="{{request('tanggal)}}">

</div>




<div class="col-lg-3">


<button class="btn btn-primary btn-lg w-100">


<i class="bi bi-search me-2"></i>

Cari


</button>


</div>



</div>


</form>



<p class="text-muted mt-3 mb-0">

Menampilkan {{$kunjungans->count()}} data tamu

</p>


</div>









<!-- TABLE -->


<div class="card-box">


<div class="table-responsive">


<table class="table align-middle">


<thead>


<tr>


<th width="50">
NO
</th>


<th>
FOTO
</th>


<th>
NAMA LENGKAP
</th>


<th>
INSTANSI
</th>


<th>
JABATAN
</th>


<th>
STATUS
</th>


<th>
KEPERLUAN
</th>


<th>
TUJUAN
</th>


<th>
TANGGAL
</th>


<th>
JAM
</th>


<th>
CATATAN
</th>


</tr>


</thead>





<tbody>


@forelse($kunjungans as $index=>$data)


<tr>



<td>

{{$index+1}}

</td>




<!-- FOTO -->

<td>


@if($data->foto)


<img

src="{{asset('storage/'.$data->foto)}}"

width="60"

height="60"

style="
object-fit:cover;
border-radius:50%;
cursor:pointer;
border:3px solid #e5e7eb;
"

onclick="lihatFoto('{{asset('storage/'.$data->foto)}}')"


>


@else


<i class="bi bi-person-circle text-secondary fs-2"></i>


@endif


</td>





<!-- NAMA -->

<td>

<b>

{{$data->nama_lengkap}}

</b>


</td>





<td>

{{$data->instansi_asal ?? '-'}}

</td>




<td>

{{$data->jabatan ?? '-'}}

</td>





<td>


<span class="badge rounded-pill bg-info-subtle text-primary px-3 py-2">


{{$data->status ?? 'Umum'}}


</span>


</td>





<td>

{{$data->keperluan}}

</td>





<td>

{{$data->tujuan_bidang}}

</td>





<td>

{{date('d M Y',strtotime($data->tanggal_kunjungan))}}

</td>





<td>

{{$data->jam_kedatangan}}

</td>





<td>


@if($data->catatan)


<span class="badge bg-light text-dark">

{{$data->catatan}}

</span>


@else


<span class="text-muted">

-

</span>


@endif


</td>



</tr>





@empty


<tr>


<td colspan="11"

class="text-center text-muted py-4">


Belum ada data tamu


</td>


</tr>


@endforelse





</tbody>


</table>


</div>


</div>









<!-- MODAL FOTO BESAR -->


<div class="modal fade" id="fotoModal" tabindex="-1">


<div class="modal-dialog modal-dialog-centered">


<div class="modal-content">


<div class="modal-body text-center p-4">


<img

id="gambarBesar"

src=""

class="img-fluid rounded"

style="max-height:500px;"

>


</div>


</div>


</div>


</div>







<script>


function lihatFoto(url){


document.getElementById('gambarBesar').src=url;


let modal = new bootstrap.Modal(

document.getElementById('fotoModal')

);


modal.show();


}


</script>



@endsection
