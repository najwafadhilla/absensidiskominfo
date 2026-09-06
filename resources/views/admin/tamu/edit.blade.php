@extends('admin.layout')

@section('content')

<div class="edit-wrapper">

    <div class="edit-card">

        <div class="page-header">

            <a href="/admin/tamu" class="btn-back">
                <i class="bi bi-arrow-left"></i>
            
            </a>


            <div>
                <h3>
                    Edit Data Tamu
                </h3>

                <p>
                    Perbarui informasi data pengunjung
                </p>
            </div>

        </div>


        <hr>


        <form action="{{route('admin.tamu.update',$data->id)}}" method="POST">

            @csrf
            @method('PUT')


            <div class="row">


                <div class="col-md-6 mb-3">

                    <label>
                        Nama Lengkap
                    </label>

                    <input
                    type="text"
                    name="nama_lengkap"
                    class="form-control"
                    value="{{$data->nama_lengkap}}">

                </div>



                <div class="col-md-6 mb-3">

                    <label>
                        Instansi
                    </label>

                    <input
                    type="text"
                    name="instansi_asal"
                    class="form-control"
                    value="{{$data->instansi_asal}}">

                </div>



                <div class="col-md-6 mb-3">

                    <label>
                        Jabatan
                    </label>

                    <input
                    type="text"
                    name="jabatan"
                    class="form-control"
                    value="{{$data->jabatan}}">

                </div>



                <div class="col-md-6 mb-3">

                    <label>
                        Status
                    </label>

                    <select name="status" class="form-select">


                        <option value="{{$data->status}}">
                            {{$data->status}}
                        </option>

                        <option>Pegawai</option>
                        <option>Mahasiswa</option>
                        <option>Pelajar</option>
                        <option>Masyarakat Umum</option>
                        <option>Swasta</option>
                        <option>Organisasi</option>


                    </select>


                </div>




                <div class="col-md-6 mb-3">

                    <label>
                        Nomor HP
                    </label>


                    <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{$data->no_hp}}">


                </div>




                <div class="col-md-6 mb-3">

                    <label>
                        Keperluan
                    </label>


                    <input
                    type="text"
                    name="keperluan"
                    class="form-control"
                    value="{{$data->keperluan}}">


                </div>




                <div class="col-md-6 mb-3">

                    <label>
                        Tujuan Bidang
                    </label>


                    <select name="tujuan_bidang" class="form-select">


                        <option value="{{$data->tujuan_bidang}}">
                            {{$data->tujuan_bidang}}
                        </option>


                        <option>Bidang Umum</option>
                        <option>Bidang TIK</option>
                        <option>Bidang Data</option>
                        <option>Bidang Media</option>
                        <option>Bidang Keuangan</option>


                    </select>


                </div>




                <div class="col-md-6 mb-3">

                    <label>
                        Bertemu Dengan
                    </label>


                    <input
                    type="text"
                    name="bertemu_dengan"
                    class="form-control"
                    value="{{$data->bertemu_dengan}}">


                </div>



                <div class="col-12 mb-3">

                    <label>
                        Catatan
                    </label>


                    <textarea
                    name="catatan"
                    class="form-control"
                    rows="4">{{ $data->catatan }}</textarea>


                </div>



            </div>



            <button class="btn-save">

                <i class="bi bi-save"></i>

                Simpan Perubahan

            </button>



        </form>


    </div>


</div>



<style>


.edit-wrapper{

background:#f4f8ff;

padding:25px;

}



.edit-card{

background:white;

border-radius:25px;

padding:30px;

box-shadow:0 10px 30px #0001;

}



.page-header{

display:flex;

align-items:center;

gap:20px;

}



.page-header h3{

margin:0;

font-weight:800;

color:#0757a6;

}



.page-header p{

margin:5px 0;

color:#64748b;

}



.btn-back{

display:flex;

align-items:center;

gap:8px;

background:#eff6ff;

color:#2563eb;

padding:12px 20px;

border-radius:15px;

text-decoration:none;

font-weight:700;

transition:.3s;

}



.btn-back:hover{

background:#2563eb;

color:white;

}



label{

font-weight:700;

color:#334155;

margin-bottom:8px;

}



.form-control,
.form-select{


height:48px;

border-radius:14px;

border:1px solid #dbe3ef;

padding:12px;


}



textarea.form-control{

height:auto;

}



.form-control:focus,
.form-select:focus{

border-color:#2563eb;

box-shadow:0 0 0 3px #2563eb20;

}



.btn-save{

margin-top:15px;

background:#2563eb;

border:none;

color:white;

padding:14px 30px;

border-radius:15px;

font-weight:700;

}



.btn-save:hover{

background:#0757a6;

}



</style>


@endsection
