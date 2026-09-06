<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
SIM Buku Tamu | DISKOMINFOSAN Aceh Tamiang
</title>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<style>


*{

box-sizing:border-box;

}



body{


margin:0;

font-family:'Segoe UI',sans-serif;

background:#f1f5f9;


}



/* ======================
SIDEBAR
====================== */


.sidebar{


width:270px;

height:100vh;

position:fixed;

left:0;

top:0;

background:

linear-gradient(

180deg,

#052c5c,

#0757a6

);


color:white;


box-shadow:

10px 0 35px rgba(0,0,0,.18);


}




.brand{


padding:30px 20px;

text-align:center;


}



.brand img{


width:85px;

height:85px;

background:white;

padding:10px;

border-radius:25px;


box-shadow:

0 10px 25px rgba(0,0,0,.2);


}




.brand h5{


margin-top:15px;

font-weight:800;


}



.brand small{


color:#dbeafe;

}




.menu a{

display:flex;

align-items:center;

gap:15px;

margin:8px 15px;

padding:15px 20px;

border-radius:15px;

color:#e0f2fe;

text-decoration:none;

transition:.3s;

font-weight:600;

}


.menu a:hover{

background:rgba(255,255,255,.18);

transform:translateX(8px);

color:white;

}



.menu a.active{

background:white;

color:#0757a6;

}



.menu a i{

font-size:20px;

}

.admin-profile{


position:absolute;

bottom:30px;

left:20px;

right:20px;


background:

rgba(255,255,255,.15);


padding:15px;

border-radius:18px;


}





.avatar{


width:45px;

height:45px;


border-radius:50%;


background:white;


color:#0757a6;


display:flex;


align-items:center;


justify-content:center;


font-weight:bold;


}






/* ======================
CONTENT
====================== */


.main-content{


margin-left:270px;

padding:35px;


}





/* HEADER */


.topbar{


background:white;


border-radius:25px;


padding:25px;


box-shadow:

0 10px 30px rgba(0,0,0,.06);


margin-bottom:30px;


}





/* CARD */


.card-box{


background:white;


border-radius:25px;


padding:28px;


box-shadow:


0 15px 35px rgba(15,23,42,.08);


transition:.3s;


}



.card-box:hover{


transform:

translateY(-5px);


box-shadow:

0 20px 45px rgba(0,0,0,.12);


}






/* BUTTON */


.btn-primary{


background:#0757a6;

border:none;

border-radius:12px;

padding:12px 20px;


}



.btn-primary:hover{


background:#043b75;


}





/* TABLE */


.table{


border-radius:15px;

overflow:hidden;


}



.table thead th{


background:#eaf3ff;


color:#0757a6;


border:none;


}



.table tbody tr{


transition:.2s;


}



.table tbody tr:hover{


background:#f8fbff;


}
.table td{

vertical-align:middle;

}


.table td:nth-child(10){

max-width:200px;

white-space:normal;

}




/* ANIMATION */


.main-content{


animation:

fade .5s ease;


}



@keyframes fade{


from{


opacity:0;

transform:translateY(15px);


}


to{


opacity:1;


transform:none;


}


}

@media(max-width:900px){

.sidebar{

width:80px;

}


.brand h5,
.brand small,
.menu span,
.admin-profile small,
.admin-profile b{

display:none;

}


.main-content{

margin-left:80px;

padding:20px;

}


.menu a{

justify-content:center;

}


}

</style>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

</head>



<body>



<!-- SIDEBAR -->


<div class="sidebar">



<div class="brand">


<img src="{{asset('images/logo-diskominfosan.png')}}">


<h5>

DISKOMINFOSAN

</h5>


<small>

Kabupaten Aceh Tamiang

</small>


</div>





<hr>



<div class="menu">


<a href="/admin/dashboard"
class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

<i class="bi bi-grid-fill"></i>

<span>
Dashboard
</span>

</a>




<a href="/admin/tamu"
class="{{ request()->is('admin/tamu*') ? 'active' : '' }}">

<i class="bi bi-people-fill"></i>

<span>
Data Tamu
</span>

</a>





<a href="/admin/laporan"
class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">

<i class="bi bi-file-earmark-text-fill"></i>

<span>
Laporan
</span>

</a>





<a href="#" class="logout" data-bs-toggle="modal" data-bs-target="#logoutModal">

    <i class="bi bi-box-arrow-right"></i>

    <span>
        Keluar
    </span>

</a>


</div>
<div class="admin-profile">


<div class="d-flex align-items-center gap-3">


<div class="avatar">

AD

</div>



<div>

<b>

Administrator

</b>


<br>


<small>

Sistem Buku Tamu Digital

</small>


</div>



</div>


</div>



</div>









<!-- CONTENT -->


<div class="main-content">


@yield('content')


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


<script>

$(document).ready(function(){

    $('.selectpicker').selectpicker();

});

</script>

<!-- MODAL KONFIRMASI LOGOUT -->

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content" style="border-radius: 20px; border: none;">

            <div class="modal-body text-center p-4">

                <!-- ICON -->

                <div class="mb-3">

                    <div style="
                        width:70px;
                        height:70px;
                        background:#eaf3ff;
                        color:#0757a6;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        margin:auto;
                        font-size:32px;
                    ">

                        <i class="bi bi-box-arrow-right"></i>

                    </div>

                </div>


                <!-- JUDUL -->

                <h5 class="fw-bold mb-2">

                    Konfirmasi Keluar

                </h5>


                <!-- PESAN -->

                <p class="text-muted mb-4">

                    Apakah Anda yakin ingin keluar dari sistem?

                </p>


                <!-- BUTTON -->

                <div class="d-flex justify-content-center gap-2">

                    <button type="button"
                            class="btn btn-light px-4"
                            data-bs-dismiss="modal"
                            style="border-radius:10px;">

                        Batal

                    </button>


                    <a href="/logout"
                       class="btn btn-primary px-4"
                       style="border-radius:10px;">

                        <i class="bi bi-box-arrow-right me-1"></i>

                        Ya, Keluar

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
</body>

</html>
