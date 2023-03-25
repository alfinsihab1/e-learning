@extends('layouts.app_new')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Halaman Edit Pengguna</div>

                <div class="card-body">
                    {{ Form::open(array('route' => array('admin.update', $get_data->id))) }}
                        {{ Form::label('nama', 'Masukkan Nama'); }}
                        {{ Form::text('nama', $get_data->name, array('class' => 'form-control mb-4', 'placeholder' => 'Nama')); }}

                        {{ Form::label('email', 'Masukkan Alamat E-Mail'); }}
                        {{ Form::text('email',$get_data->email,array('class' => 'form-control mb-4', 'placeholder' => 'example@gmail,com')); }}

                        {{ Form::label('no_hp', 'Masukkan Nomor Hp'); }}
                        {{ Form::text('no_hp',$get_data->nohp, array('class' => 'form-control mb-4', 'placeholder' => '08xxxxxx')); }}

                        {{ Form::label('akses', 'Masukkan Posisi Pengguna'); }}
                        {{ Form::select('akses',['guru' => 'Guru', 'siswa' => 'siswa'], $get_data->akses, ['class' => 'form-control mb-4']); }}
                        
                        @if($get_data->akses == 'siswa')
                        <div id="namas" style="display:block"> 
                            {{ Form::label('nama_kelas', 'Kelas Siswa'); }}
                            {{ Form::select('nama_kelas',['1'=>'A',',2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F'], $cek->nama_kelas, ['class' => 'form-control mb-4']); }}
                        </div>
                        @else
                        <div id="namas" style="display:none"> 
                            {{ Form::label('nama_kelas', 'Kelas Siswa'); }}
                            {{ Form::select('nama_kelas',['1'=>'A',',2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F'],null, ['class' => 'form-control mb-4']); }}
                        </div>
                        @endif
                        {{ Form::label('no_induk', 'Masukkan Nomor Induk Pengguna'); }}
                        {{ Form::text('no_induk',$get_data->no_induk ,array('class' => 'form-control mb-4', 'placeholder' => '3374xxxxxx')); }}

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')); }}
                        {{ Form::buttonBack('Kembali',['class'=>'text-white btn btn-info', 'href' => url()->previous()]) }}
                    {{ Form::close() }}   
                </div>
            </div>
        
    </div>
</div>
<script>
    document.getElementById('akses').addEventListener("change", function (e) {
        if (e.target.value === 'guru') {
            document.getElementById('namas').style.display = 'none';
            
        } else {
            document.getElementById('namas').style.display = 'block';
        }
    });
</script>
@endsection
