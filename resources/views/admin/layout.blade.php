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

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">


<style>

/* =====================================================
   GLOBAL
===================================================== */

*{
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:#f1f5f9;
    overflow-x:hidden;
}


/* =====================================================
   SIDEBAR
===================================================== */

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

    z-index:1050;

    transition:.3s ease;

    overflow-y:auto;
}


/* BRAND */

.brand{

    padding:30px 20px;
    text-align:center;

}

.brand img{

    width:85px;
    height:85px;

    object-fit:contain;

    background:white;

    padding:10px;

    border-radius:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.2);

}

.brand h5{

    margin-top:15px;

    font-weight:800;

    margin-bottom:5px;

}

.brand small{

    color:#dbeafe;

}


/* MENU */

.menu{

    padding-bottom:120px;

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

    min-width:22px;

    text-align:center;

}


/* ADMIN PROFILE */

.admin-profile{

    position:absolute;

    bottom:25px;

    left:20px;
    right:20px;

    background:
    rgba(255,255,255,.15);

    padding:15px;

    border-radius:18px;

    backdrop-filter:blur(5px);

}

.avatar{

    width:45px;
    height:45px;

    flex-shrink:0;

    border-radius:50%;

    background:white;

    color:#0757a6;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:bold;

}


/* =====================================================
   MOBILE SIDEBAR OVERLAY
===================================================== */

.sidebar-overlay{

    display:none;

    position:fixed;

    inset:0;

    background:rgba(0,0,0,.45);

    z-index:1040;

}

.sidebar-overlay.show{

    display:block;

}


/* =====================================================
   MAIN CONTENT
===================================================== */

.main-content{

    margin-left:270px;

    padding:35px;

    min-height:100vh;

    transition:.3s ease;

    animation:
    fade .5s ease;

}


/* =====================================================
   MOBILE TOPBAR
===================================================== */

.mobile-topbar{

    display:none;

    background:white;

    padding:15px 18px;

    border-radius:18px;

    margin-bottom:20px;

    box-shadow:
    0 8px 25px rgba(0,0,0,.06);

    align-items:center;

    justify-content:space-between;

}

.mobile-topbar-title{

    font-weight:800;

    color:#0757a6;

    font-size:17px;

}

.menu-toggle{

    border:none;

    background:#0757a6;

    color:white;

    width:45px;
    height:45px;

    border-radius:12px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:22px;

}


/* =====================================================
   HEADER / TOPBAR
===================================================== */

.topbar{

    background:white;

    border-radius:25px;

    padding:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.06);

    margin-bottom:30px;

}


/* =====================================================
   CARD
===================================================== */

.card-box{

    background:white;

    border-radius:25px;

    padding:28px;

    box-shadow:
    0 15px 35px rgba(15,23,42,.08);

    transition:.3s;

}

.card-box:hover{

    transform:translateY(-5px);

    box-shadow:
    0 20px 45px rgba(0,0,0,.12);

}


/* =====================================================
   BUTTON
===================================================== */

.btn-primary{

    background:#0757a6;

    border:none;

    border-radius:12px;

    padding:12px 20px;

}

.btn-primary:hover{

    background:#043b75;

}


/* =====================================================
   TABLE
===================================================== */

.table-responsive{

    width:100%;

    overflow-x:auto;

    -webkit-overflow-scrolling:touch;

    border-radius:15px;

}

.table{

    border-radius:15px;

    overflow:hidden;

    min-width:750px;

}

.table thead th{

    background:#eaf3ff;

    color:#0757a6;

    border:none;

    white-space:nowrap;

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


/* =====================================================
   FORM RESPONSIVE
===================================================== */

.form-control,
.form-select{

    max-width:100%;

}


/* =====================================================
   MODAL
===================================================== */

.modal-content{

    max-width:100%;

}


/* =====================================================
   ANIMATION
===================================================== */

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


/* =====================================================
   TABLET
===================================================== */

@media(max-width:1100px){

    .sidebar{

        width:230px;

    }

    .main-content{

        margin-left:230px;

        padding:25px;

    }

    .brand{

        padding:25px 15px;

    }

    .brand img{

        width:70px;
        height:70px;

    }

    .menu a{

        margin:7px 10px;

        padding:13px 15px;

    }

    .admin-profile{

        left:10px;
        right:10px;

    }

}


/* =====================================================
   TABLET KECIL
===================================================== */

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

    .brand{

        padding:20px 10px;

    }

    .brand img{

        width:55px;
        height:55px;

        border-radius:16px;

        padding:7px;

    }

    .menu a{

        justify-content:center;

        margin:7px 10px;

        padding:14px 5px;

    }

    .menu a:hover{

        transform:none;

    }

    .admin-profile{

        left:10px;
        right:10px;

        padding:10px;

    }

    .admin-profile .d-flex{

        justify-content:center;

    }

    .main-content{

        margin-left:80px;

        padding:20px;

    }

}


/* =====================================================
   HP
===================================================== */

@media(max-width:600px){

    body{

        font-size:14px;

    }


    /* SIDEBAR */

    .sidebar{

        width:270px;

        left:-270px;

        transition:.3s ease;

        box-shadow:
        10px 0 35px rgba(0,0,0,.25);

    }

    .sidebar.show{

        left:0;

    }


    .brand h5,
    .brand small,
    .menu span,
    .admin-profile small,
    .admin-profile b{

        display:block;

    }


    .brand{

        padding:25px 20px;

    }

    .brand img{

        width:75px;
        height:75px;

    }


    .menu a{

        justify-content:flex-start;

        margin:8px 15px;

        padding:15px 20px;

    }

    .menu a:hover{

        transform:translateX(5px);

    }


    .admin-profile{

        left:20px;
        right:20px;

        padding:15px;

    }


    /* MAIN */

    .main-content{

        margin-left:0;

        padding:12px;

    }


    /* MOBILE TOPBAR */

    .mobile-topbar{

        display:flex;

    }


    /* TOPBAR */

    .topbar{

        border-radius:18px;

        padding:18px;

        margin-bottom:18px;

    }


    /* CARD */

    .card-box{

        border-radius:18px;

        padding:18px;

    }


    /* BUTTON */

    .btn-primary{

        width:auto;

        padding:10px 15px;

    }


    /* TABLE */

    .table-responsive{

        margin-left:-5px;

        margin-right:-5px;

        width:calc(100% + 10px);

    }


    .table{

        min-width:750px;

    }


    /* MODAL */

    .modal-dialog{

        margin:15px;

    }


    .modal-content{

        border-radius:18px !important;

    }

}


/* =====================================================
   HP SANGAT KECIL
===================================================== */

@media(max-width:380px){

    .main-content{

        padding:8px;

    }

    .mobile-topbar{

        padding:12px;

    }

    .mobile-topbar-title{

        font-size:15px;

    }

    .menu-toggle{

        width:40px;
        height:40px;

    }

    .card-box{

        padding:15px;

    }

}

</style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar" id="sidebar">


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


        <a href="#"
        class="logout"
        data-bs-toggle="modal"
        data-bs-target="#logoutModal">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Keluar
            </span>

        </a>


    </div>


    <!-- ADMIN PROFILE -->

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


<!-- =====================================================
     OVERLAY MOBILE
===================================================== -->

<div class="sidebar-overlay"
     id="sidebarOverlay"
     onclick="closeSidebar()">
</div>


<!-- =====================================================
     CONTENT
===================================================== -->

<div class="main-content">


    <!-- MOBILE TOPBAR -->

    <div class="mobile-topbar">

        <button
            class="menu-toggle"
            onclick="openSidebar()">

            <i class="bi bi-list"></i>

        </button>


        <div class="mobile-topbar-title">

            SIM Buku Tamu

        </div>


        <div style="width:45px;"></div>

    </div>


    @yield('content')


</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>


<script>

$(document).ready(function(){

    $('.selectpicker').selectpicker();

});


/* =====================================================
   SIDEBAR MOBILE
===================================================== */

function openSidebar(){

    document.getElementById('sidebar')
        .classList.add('show');

    document.getElementById('sidebarOverlay')
        .classList.add('show');

}


function closeSidebar(){

    document.getElementById('sidebar')
        .classList.remove('show');

    document.getElementById('sidebarOverlay')
        .classList.remove('show');

}


/* Tutup sidebar ketika menu diklik */

document.querySelectorAll('.sidebar .menu a')
.forEach(function(link){

    link.addEventListener('click', function(){

        if(window.innerWidth <= 600){

            closeSidebar();

        }

    });

});


/* Tutup sidebar jika ukuran kembali desktop */

window.addEventListener('resize', function(){

    if(window.innerWidth > 600){

        closeSidebar();

    }

});

</script>


<!-- =====================================================
     MODAL KONFIRMASI LOGOUT
===================================================== -->

<div class="modal fade"
     id="logoutModal"
     tabindex="-1"
     aria-labelledby="logoutModalLabel"
     aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content"
             style="
                border-radius:20px;
                border:none;
             ">


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

                <div class="d-flex justify-content-center gap-2 flex-wrap">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal"
                        style="border-radius:10px;">

                        Batal

                    </button>


                    <a
                        href="/logout"
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
```
