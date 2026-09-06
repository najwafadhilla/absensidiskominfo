<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Registrasi Berhasil | Buku Tamu Digital
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">



<style>


*{

font-family:'Segoe UI',sans-serif;

}




body{


min-height:100vh;


display:flex;


align-items:center;


justify-content:center;


padding:20px;



background-image:


linear-gradient(

135deg,

rgba(7,87,166,.85),

rgba(14,165,233,.75)

),


url('{{asset("images/kantordiskominfo.png")}}');



background-size:cover;


background-position:center;


background-repeat:no-repeat;



}




.success-card{


background:white;


width:100%;


max-width:550px;



padding:45px;



border-radius:35px;



box-shadow:


0 25px 70px rgba(0,0,0,.25);



animation:

slide .7s ease;



}



@keyframes slide{


from{

opacity:0;

transform:translateY(40px);

}


to{

opacity:1;

transform:translateY(0);

}


}






.logo{


width:95px;


height:95px;


object-fit:contain;



}





.instansi{


font-size:14px;


font-weight:700;


color:#0757a6;


letter-spacing:1px;



}




.success-icon{


width:95px;


height:95px;


border-radius:50%;



background:#dcfce7;



color:#16a34a;



display:flex;


align-items:center;


justify-content:center;



font-size:50px;



margin:25px auto;



}





.title{


font-size:32px;


font-weight:800;


color:#0f3d75;



}




.description{


color:#64748b;


line-height:1.7;


}







.data-card{


margin-top:30px;



background:#f8fafc;



border-radius:22px;



padding:25px;



border:1px solid #e2e8f0;



}




.data-item{


display:flex;


align-items:center;


gap:15px;



padding:12px 0;



border-bottom:1px solid #e2e8f0;



}



.data-item:last-child{


border:none;


}





.data-icon{


width:45px;


height:45px;


border-radius:12px;



background:#dbeafe;


color:#0757a6;



display:flex;


align-items:center;


justify-content:center;


font-size:20px;


}




.data-text small{


display:block;


color:#64748b;


}



.data-text strong{


font-size:16px;


color:#0f172a;


}





.btn-home{


display:block;



margin-top:30px;



background:#0757a6;



padding:15px;



border-radius:15px;



color:white;



font-weight:700;



text-decoration:none;



transition:.3s;



}



.btn-home:hover{


background:#05437e;


color:white;


transform:translateY(-3px);



}






.footer-text{


margin-top:25px;



font-size:13px;



color:#94a3b8;



}




@media(max-width:576px){


.success-card{


padding:30px 20px;


}



.title{


font-size:25px;


}


}



</style>


</head>



<body>





<div class="success-card text-center">





<img src="{{asset('images/logo-diskominfosan.png')}}"

class="logo"

alt="Logo DISKOMINFOSAN">





<div class="instansi mt-2">

DISKOMINFOSAN ACEH TAMIANG

</div>







<div class="success-icon">


<i class="bi bi-check-lg"></i>


</div>







<h1 class="title">


Registrasi Berhasil


</h1>







<p class="description">


Terima kasih telah melakukan registrasi kunjungan.


<br>


Data Anda telah berhasil tersimpan
ke dalam sistem Buku Tamu Digital.


</p>








<div class="data-card text-start">






<div class="data-item">


<div class="data-icon">

<i class="bi bi-person-fill"></i>

</div>


<div class="data-text">


<small>

Nama Tamu

</small>


<strong>

{{session('nama') ?? 'Tamu'}}

</strong>


</div>


</div>








<div class="data-item">


<div class="data-icon">

<i class="bi bi-calendar-event-fill"></i>

</div>



<div class="data-text">


<small>

Tanggal Kunjungan

</small>


<strong>

{{date('d F Y')}}

</strong>


</div>



</div>









<div class="data-item">


<div class="data-icon">

<i class="bi bi-clock-fill"></i>

</div>



<div class="data-text">


<small>

Jam Kedatangan

</small>


<strong>

{{date('H:i')}} WIB

</strong>


</div>


</div>





</div>









<a href="/tamu"

class="btn-home">


<i class="bi bi-house-door-fill me-2"></i>


Kembali ke Beranda


</a>







<div class="footer-text">


Buku Tamu Digital


<br>


DISKOMINFOSAN Aceh Tamiang

</div>







</div>





</body>


</html>
