@extends('admin.layout')


@section('content')


<div class="dashboard-wrapper">


<div class="detail-card">


    {{-- HEADER --}}
    <div class="detail-header">


        <a href="/admin/tamu"
        class="btn-back">

            <i class="bi bi-arrow-left"></i>

    

        </a>


        <div>

            <h3>
                Detail Data Tamu
            </h3>

            <p>
                Informasi lengkap pengunjung
            </p>

        </div>


    </div>



    <hr>



    {{-- DATA --}}
    <div class="detail-grid">


        <div class="detail-item">

            <i class="bi bi-person-fill"></i>

            <div>

                <span>
                    Nama Lengkap
                </span>

                <strong>
                    {{$data->nama_lengkap}}
                </strong>

            </div>

        </div>




        <div class="detail-item">

            <i class="bi bi-building"></i>

            <div>

                <span>
                    Instansi Asal
                </span>

                <strong>
                    {{$data->instansi_asal ?? '-'}}
                </strong>

            </div>

        </div>





        <div class="detail-item">

            <i class="bi bi-person-badge"></i>

            <div>

                <span>
                    Jabatan
                </span>

                <strong>
                    {{$data->jabatan ?? '-'}}
                </strong>

            </div>

        </div>





        <div class="detail-item">

            <i class="bi bi-person-check"></i>

            <div>

                <span>
                    Status
                </span>

                <strong class="status">

                    {{$data->status ?? '-'}}

                </strong>

            </div>

        </div>






        <div class="detail-item">

            <i class="bi bi-phone"></i>

            <div>

                <span>
                    Nomor HP
                </span>

                <strong>
                    {{$data->no_hp ?? '-'}}
                </strong>

            </div>

        </div>






        <div class="detail-item">

            <i class="bi bi-chat-left-text"></i>

            <div>

                <span>
                    Keperluan
                </span>

                <strong>
                    {{$data->keperluan}}
                </strong>

            </div>

        </div>







        <div class="detail-item">

            <i class="bi bi-diagram-3"></i>

            <div>

                <span>
                    Tujuan Bidang
                </span>

                <strong>
                    {{$data->tujuan_bidang}}
                </strong>

            </div>

        </div>







        <div class="detail-item">

            <i class="bi bi-person-lines-fill"></i>

            <div>

                <span>
                    Bertemu Dengan
                </span>

                <strong>
                    {{$data->bertemu_dengan ?? '-'}}
                </strong>

            </div>

        </div>



    </div>





    {{-- CATATAN --}}
    <div class="catatan-box">


        <div class="catatan-title">

            <i class="bi bi-journal-text"></i>

            Catatan

        </div>



        <p>

            {{$data->catatan ?? '-'}}

        </p>


    </div>



</div>


</div>



<style>


.dashboard-wrapper{

    background:#f4f8ff;

    min-height:100vh;

    padding:25px;

}




.detail-card{

    background:white;

    border-radius:25px;

    padding:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);

}





.detail-header{

    display:flex;

    align-items:center;

    gap:20px;

}





.detail-header h3{

    margin:0;

    font-weight:900;

    color:#0757a6;

}



.detail-header p{

    margin:5px 0 0;

    color:#64748b;

}





.btn-back{

    display:flex;

    align-items:center;

    gap:8px;

    background:#2563eb;

    color:white;

    padding:12px 20px;

    border-radius:14px;

    text-decoration:none;

    font-weight:700;

    transition:.3s;

}



.btn-back:hover{

    background:#1d4ed8;

    transform:translateX(-3px);

    color:white;

}





.detail-grid{


    display:grid;

    grid-template-columns:

    repeat(2,1fr);

    gap:20px;

    margin-top:25px;


}




.detail-item{


    display:flex;

    align-items:center;

    gap:18px;

    background:#f8fbff;

    padding:20px;

    border-radius:18px;

    border:1px solid #e5efff;

}



.detail-item i{


    width:50px;

    height:50px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:15px;

    background:#dbeafe;

    color:#2563eb;

    font-size:22px;

}





.detail-item span{


    display:block;

    color:#64748b;

    font-size:13px;

    margin-bottom:5px;

}



.detail-item strong{

    color:#1e293b;

    font-size:16px;

}





.status{


    background:#dcfce7;

    color:#15803d!important;

    padding:6px 14px;

    border-radius:20px;

}





.catatan-box{


    margin-top:25px;

    background:#eff6ff;

    padding:20px;

    border-radius:18px;

}



.catatan-title{


    font-weight:800;

    color:#2563eb;

    display:flex;

    gap:10px;

    align-items:center;

    margin-bottom:10px;

}



.catatan-box p{

    margin:0;

    color:#475569;

}




@media(max-width:768px){


.detail-grid{

    grid-template-columns:1fr;

}


.detail-header{

    flex-direction:column;

    align-items:flex-start;

}


}


</style>


@endsection
