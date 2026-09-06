<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
Buku Tamu Digital
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<style>

body{
    background:#eef6ff;
    font-family:'Segoe UI',sans-serif;
}


/* HEADER */

.hero{

height:280px;

background:
linear-gradient(
135deg,
rgba(0,80,180,.85),
rgba(0,180,220,.7)
),
url('/images/kantor.jpg');

background-size:cover;
background-position:center;

display:flex;
align-items:center;
justify-content:center;

color:white;

text-align:center;

border-radius:0 0 40px 40px;

}


.hero h1{

font-size:42px;
font-weight:800;

}


.hero p{

font-size:18px;

}




/* FORM */

.container-form{

margin-top:-50px;

}


.card-form{

background:white;

border-radius:25px;

padding:35px;

box-shadow:
0 15px 40px rgba(0,0,0,.15);

}




.label{

font-weight:700;

color:#1e293b;

}



.form-control,
.form-select{

padding:14px;

border-radius:15px;

border:1px solid #dbeafe;

}


.form-control:focus,
.form-select:focus{

border-color:#0ea5e9;

box-shadow:0 0 10px rgba(14,165,233,.2);

}



/* WAKTU */


.time-box{

background:
linear-gradient(
135deg,
#0757a6,
#0ea5e9
);

color:white;

padding:20px;

border-radius:20px;

display:flex;

justify-content:space-between;

margin-bottom:30px;

}



.btn-submit{

background:
linear-gradient(
135deg,
#0757a6,
#0ea5e9
);

color:white;

width:100%;

padding:15px;

border:none;

border-radius:15px;

font-weight:700;

}



</style>

</head>



<body>


<!-- HEADER BARU -->

<section class="hero">

<div>

<h1>
<i class="bi bi-person-vcard"></i>
Buku Tamu Digital
</h1>

<p>
Silakan isi data kunjungan dengan lengkap
</p>


</div>

</section>





<div class="container container-form pb-5">


<div class="card-form">



<!-- WAKTU -->

<div class="time-box">


<div>

<i class="bi bi-calendar"></i>

<br>

<small>
Tanggal Kunjungan
</small>


<h5 id="tanggal">
-
</h5>

</div>



<div>

<i class="bi bi-clock"></i>

<br>

<small>
Jam Kedatangan
</small>


<h5 id="jam">
-
</h5>


</div>



</div>






@if(session('error'))

<div class="alert alert-danger">

{{session('error')}}

</div>

@endif




@if($errors->has('captcha'))

<div class="alert alert-danger">

Kode keamanan salah

</div>

@endif





<form action="/tamu/simpan" method="POST">


@csrf




<!-- NAMA -->

<div class="mb-3">

<label class="label">
Nama Lengkap
</label>


<input

type="text"

name="nama_lengkap"

class="form-control"

required

placeholder="Masukkan nama lengkap">


</div>






<!-- INSTANSI -->


<div class="mb-3">


<label class="label">

Instansi / Asal

</label>


<input

type="text"

name="instansi_asal"

class="form-control"

placeholder="Contoh OPD / Universitas">


</div>







<!-- JABATAN -->

<div class="mb-3">


<label class="label">

Jabatan

</label>


<input

type="text"

name="jabatan"

class="form-control"

placeholder="Jabatan">


</div>







<!-- STATUS -->


<div class="mb-3">


<label class="label">

Status

</label>


<select

name="status"

class="form-select">


<option value="">
Pilih Status
</option>


<option>Pegawai</option>

<option>Mahasiswa</option>

<option>Pelajar</option>

<option>Masyarakat Umum</option>

<option>Swasta</option>

<option>Organisasi</option>

<option>Lainnya</option>


</select>


</div>







<!-- HP -->


<div class="mb-3">


<label class="label">

Nomor HP

</label>


<input

type="text"

name="no_hp"

class="form-control"

required

placeholder="08xxxxxxxx">


</div>







<!-- KEPERLUAN -->

<div class="mb-3">


<label class="label">

Keperluan Kunjungan

</label>



<input

type="text"

name="keperluan"

id="keperluan"

class="form-control"

list="daftarKeperluan"

placeholder="Pilih atau ketik keperluan"

required>


<datalist id="daftarKeperluan">


<option value="Konsultasi">

<option value="Koordinasi">

<option value="Pengurusan Administrasi">

<option value="Pertemuan / Rapat">

<option value="Kerja Sama">


</datalist>



</div>







<!-- BIDANG -->


<div class="mb-3">


<label class="label">

Tujuan / Bidang

</label>


<select

name="tujuan_bidang"

class="form-select"

required>


<option value="">
Pilih Bidang
</option>


<option>Bidang Umum</option>

<option>Bidang TIK</option>

<option>Bidang Data</option>

<option>Bidang Media</option>

<option>Bidang Keuangan</option>

<option>Lainnya</option>


</select>


</div>







<!-- BERTEMU -->


<div class="mb-3">


<label class="label">

Bertemu Dengan

</label>


<input

type="text"

name="bertemu_dengan"

class="form-control"

placeholder="Nama pegawai">


</div>








<!-- CATATAN -->


<div class="mb-3">


<label class="label">

Catatan Tambahan

</label>


<textarea

name="catatan"

class="form-control"

rows="4">

</textarea>


</div>







<!-- CAPTCHA -->


<div class="mb-3">


<label class="label">

Kode Keamanan

</label>


<br>


<img

src="{{captcha_src('flat')}}"

onclick="this.src='{{captcha_src('flat')}}?'+Math.random()"

style="cursor:pointer;height:50px">


<input

type="text"

name="captcha"

class="form-control mt-3"

required

placeholder="Masukkan kode">


</div>







<button

class="btn-submit"

type="submit">


<i class="bi bi-send"></i>

Kirim Data Kunjungan


</button>




</form>



</div>


</div>







<script>


function waktu(){


let now=new Date();


document.getElementById('tanggal').innerHTML=
now.toLocaleDateString('id-ID',{
weekday:'long',
day:'numeric',
month:'long',
year:'numeric'
});


document.getElementById('jam').innerHTML=
now.toLocaleTimeString('id-ID')
+" WIB";


}



waktu();

setInterval(waktu,1000);



</script>



</body>

</html>
