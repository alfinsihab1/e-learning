@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Halaman Menambahkan Mata Pelajaran</div>

                <div class="card-body">
                    {{ Form::open(array('route' => 'mapel.store')) }}
                        {{ Form::label('nama_mapel', 'Masukkan Nama Mata Pelajaran'); }}
                        {{ Form::text('nama_mapel','',array('class' => 'form-control mb-4', 'placeholder' => 'contoh: Matematika')); }}

                        
                        {{ Form::label('id_mapel', 'Masukkan Kode Mata Pelajaran'); }}
                        {{ Form::text('id_mapel','',array('class' => 'form-control mb-4', 'placeholder' => 'contoh: 3 / angka bebas max:4 digit')); }}

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')); }}
                    {{ Form::close() }}   
                </div>
            </div>
        
    </div>
</div>
@endsection
