@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Halaman Menambahkan Pengguna</div>

                <div class="card-body">
                    {{ Form::open(array('route' => 'admin.store')) }}
                   
                        {{ Form::label('nama', 'Masukkan Nama'); }}
                        {{ Form::text('nama','',array('class' => 'form-control mb-4', 'placeholder' => 'Nama')); }}

                        {{ Form::label('email', 'Masukkan Alamat E-Mail'); }}
                        {{ Form::text('email','',array('class' => 'form-control mb-4', 'placeholder' => 'example@gmail,com')); }}

                        {{ Form::label('no_hp', 'Masukkan Nomor Hp'); }}
                        {{ Form::text('no_hp','',array('class' => 'form-control mb-4', 'placeholder' => '08xxxxxx')); }}

                        {{ Form::label('akses', 'Masukkan Posisi Pengguna'); }}
                        {{ Form::select('akses',['guru' => 'Guru', 'siswa' => 'siswa'], null, ['class' => 'form-control mb-4']); }}
                        
                        {{ Form::label('nama_kelas', 'Kelas Siswa'); }}
                        {{ Form::select('nama_kelas',['1'=>'A','2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F'], null, ['style'=>'display:none','class' => 'form-control mb-4']); }}

                        {{ Form::label('no_induk', 'Masukkan Nomor Induk Pengguna'); }}
                        {{ Form::text('no_induk','',array('class' => 'form-control mb-4', 'placeholder' => '3374xxxxxx')); }}

                        {{ Form::label('password', 'Masukkan Password'); }}
                        {{ Form::password('password',array('class' => 'form-control mb-4')); }}

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')); }}
                    {{ Form::close() }}   
                </div>
            </div>
    </div>
</div>
<script>
    document.getElementById('akses').addEventListener("change", function (e) {
        if (e.target.value === 'siswa') {
            document.getElementById('nama_kelas').style.display = 'block';
        } else {
            document.getElementById('nama_kelas').style.display = 'none';
        }
    });
</script>
@endsection

