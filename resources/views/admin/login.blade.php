<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Selamat Datang | DISKOMINFOSAN Aceh Tamiang
</title>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">



<style>


*{

font-family:'Segoe UI', sans-serif;

}



body{


min-height:100vh;


display:flex;


align-items:center;


justify-content:center;



background-image:


linear-gradient(

135deg,

rgba(0,45,95,.75),

rgba(14,165,233,.55)

),


url('{{ asset("images/kantordiskominfo.png") }}');



background-size:cover;


background-position:center;


background-repeat:no-repeat;



}





/* CARD LOGIN */


.login-card{


width:420px;


background:white;



padding:45px 40px;



border-radius:30px;



box-shadow:

0 25px 60px rgba(0,0,0,.25);



}



.logo{


width:100px;


height:100px;


object-fit:contain;



}





.title{


font-weight:800;


color:#0757a6;


font-size:28px;


margin-bottom:10px;


}



.subtitle{


color:#64748b;


line-height:1.6;


}





/* INPUT */


.form-label{


font-weight:700;


color:#334155;


}



.input-group-text{


background:#eff6ff;


border:none;


color:#0757a6;



}



.form-control{


padding:14px;


border-radius:12px;


}



.form-control:focus{


border-color:#0ea5e9;


box-shadow:

0 0 0 .2rem rgba(14,165,233,.15);



}





/* BUTTON */


.btn-login{


width:100%;


background:#0757a6;


color:white;


padding:14px;


border-radius:14px;


font-weight:700;


font-size:16px;


transition:.3s;


}



.btn-login:hover{


background:#05437e;


color:white;


transform:translateY(-2px);


}





/* BACK LINK */


.back-link{


text-decoration:none;


color:#0757a6;


font-weight:600;


font-size:14px;


}





.back-link:hover{


text-decoration:underline;


}





/* MOBILE */


@media(max-width:576px){


.login-card{


width:90%;


padding:35px 25px;


}



}





</style>



</head>



<body>





<div class="login-card text-center">





<!-- LOGO TERPISAH -->


<img src="{{asset('images/logo-diskominfosan.png')}}"

class="logo mb-3"

alt="Logo DISKOMINFOSAN">





<h2 class="title">

Selamat Datang
</h2>




<p class="subtitle mb-4">


Buku Tamu Digital


<br>


DISKOMINFOSAN Aceh Tamiang


</p>








@if(session('error'))


<div class="alert alert-danger">


{{session('error')}}


</div>


@endif







<form action="/login" method="POST">


@csrf






<div class="mb-3 text-start">


<label class="form-label">

Username

</label>



<div class="input-group">



<span class="input-group-text">

<i class="bi bi-person-fill"></i>

</span>




<input

type="text"

name="username"

class="form-control"

placeholder="Masukkan username"

required>



</div>


</div>








<div class="mb-4 text-start">


<label class="form-label">

Password

</label>




<div class="input-group">



<span class="input-group-text">

<i class="bi bi-lock-fill"></i>

</span>




<input

type="password"

name="password"

class="form-control"

placeholder="Masukkan password"

required>



</div>


</div>








<button type="submit"

class="btn btn-login">


<i class="bi bi-box-arrow-in-right me-2"></i>


Masuk Dashboard


</button>





</form>








<div class="mt-4">


<a href="/tamu"

class="back-link">


<i class="bi bi-arrow-left me-1"></i>


Kembali ke Buku Tamu


</a>



</div>






</div>





</body>

</html>
