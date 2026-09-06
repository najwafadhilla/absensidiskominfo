<!DOCTYPE html>
<html>
<head>

<title>
Cetak Laporan Kunjungan
</title>


<style>


body{

font-family: Arial, sans-serif;

font-size:14px;

}



.header{

text-align:center;

margin-bottom:30px;

}



.header h2{

margin-bottom:5px;

}



table{

width:100%;

border-collapse:collapse;

}



table th{

background:#1d4ed8;

color:white;

padding:10px;

border:1px solid #ddd;

}



table td{

padding:8px;

border:1px solid #ddd;

}



.footer{

margin-top:40px;

text-align:right;

}



@media print{


.btn-print{

display:none;

}


}


.print-area{

    display: flex;
    justify-content: flex-end;
    margin-top: 15px;
    margin-bottom: 20px;

}


.btn-print{

    background:#1d4ed8;

    color:white;

    border:none;

    padding:12px 25px;

    border-radius:10px;

    font-size:14px;

    font-weight:bold;

    cursor:pointer;

    box-shadow:0 4px 10px rgba(0,0,0,.15);

}


.btn-print:hover{

    background:#1e40af;

}


@media print{

    .print-area{

        display:none;

    }

}


</style>


</head>


<body>



<div class="header">


<h2>
LAPORAN KUNJUNGAN TAMU
</h2>


<h3>
DISKOMINFOSAN KABUPATEN ACEH TAMIANG
</h3>


<p>
Tanggal Cetak :
{{date('d-m-Y')}}
</p>


</div>




<table>


<thead>

<tr>

<th>
No
</th>


<th>
Nama Lengkap
</th>


<th>
Instansi Asal
</th>


<th>
Tujuan Bidang
</th>


<th>
Keperluan
</th>


<th>
Tanggal Kunjungan
</th>


</tr>


</thead>



<tbody>



@foreach($data as $i=>$d)


<tr>


<td>
{{$i+1}}
</td>


<td>
{{$d->nama_lengkap}}
</td>


<td>
{{$d->instansi_asal}}
</td>


<td>
{{$d->tujuan_bidang}}
</td>


<td>
{{$d->keperluan}}
</td>


<td>
{{$d->tanggal_kunjungan}}
</td>



</tr>


@endforeach



</tbody>


</table>

<div class="print-area">

    <button class="btn-print" onclick="window.print()">
        Cetak
    </button>

</div>



<div class="footer">


Mengetahui,


<br><br><br>

DISKOMINFOSAN


</div>



</body>


</html>
