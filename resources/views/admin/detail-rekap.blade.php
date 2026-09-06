@extends('admin.layout')


@section('content')


<div class="topbar">

<h3 class="fw-bold">

Detail Kunjungan

</h3>


<p class="text-muted">

Bidang : {{$bidang}}

</p>


</div>




<div class="card-box">


<table class="table">


<thead>

<tr>

<th>No</th>
<th>Nama</th>
<th>Instansi</th>
<th>Keperluan</th>
<th>Tanggal</th>
<th>Jam</th>

</tr>

</thead>



<tbody>


@foreach($dataTamu as $key=>$item)


<tr>

<td>
{{$key+1}}
</td>


<td>
{{$item->nama_lengkap}}
</td>


<td>
{{$item->instansi_asal}}
</td>


<td>
{{$item->keperluan}}
</td>


<td>
{{$item->tanggal_kunjungan}}
</td>


<td>
{{$item->jam_kedatangan}}
</td>


</tr>


@endforeach
</tbody>
</table>
</div>

@endsection
