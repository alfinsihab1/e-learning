@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <table style="width:100%">
                        <tr>
                            <td>Halaman Menambahkan Soal</td>                   
                            <td style="text-align: end">
                                {{ Form::buttonBack('Tambah Soal Pilihan Ganda', array('id'=>'tambah_pil','class' => 'addPil btn btn-success text-white')); }}
                            
                            </td>
                            
                        </tr>
                    </table>     
                </div>

                <div class="card-body">
                    <div class="container">
                        {{ Form::open(array('route' => 'soal.store.pilgan')) }}
                        <div class="col-md-12">
                            <div class="col-md-12 d-inline-flex">
                                <div class="col-md-6 ">
                                    {{ Form::label('id_mapel', 'Mata Pelajaran Soal'); }}
                                    {{ Form::select('id_mapel',$daftar_mapel, null, ['class' => 'form-control mb-4']); }}
                                </div>
                                <div class="col-md-6 ">
                                    {{ Form::label('id_kelas', 'Kelas Tujuan'); }}
                                    {{ Form::select('id_kelas',['1'=>'A',',2'=>'B','3'=>'C','4'=>'D','5'=>'E','6'=>'F'],null, ['class' => 'form-control mb-4']); }}
                                </div>
                            </div>
                        </div>
                            
                        {{ Form::label('judul_soal', 'Judul Soal'); }}
                        {{ Form::text('judul_soal','',array('class' => 'form-control mb-4', 'placeholder' => 'Materi Penjumlahan')); }}
                           
                        <div id="soalEssay">
                            {{-- soal disini --}}
                        </div>
                                              
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')); }}
                        {{ Form::close() }}   
                    </div>
                </div>
            </div>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
        $(document).ready(function(){
            $('.addPil').on('click', function(){
                // opsi pilihan------------------
                var opsi = '<div class="col-md-9">{{ Form::text('opsi[]','',array('placeholder'=>'Opsi Soal Pilihan Ganda...','id'=>'opsi','class' => 'opsi form-control mb-1')); }}</div>';
                var hapusOpsinya = '<div class="col-md-1 hapusOpsi">{{ Form::buttonBack('<i class="bx bx-trash"></i>', array('id'=>'hapusOp','class' => 'mb-1 remove_opsi btn btn-danger text-white')); }}</div>';
                var divnya = '<div class="col-md-10 d-inline-flex opsiPill">'+opsi+hapusOpsinya+'</div>';
                
                // input soal pilgannya-------------
                var soalPil = '{{ Form::text('soal[]','',array('placeholder'=>'Soal Pilihan Ganda ketik disini...','id'=>'soal','class' => 'soal form-control mb-4')); }}';
                var divnya_1 = '<div id="soalBaruPil" class="col-md-11 soalBaruPil">'+soalPil+divnya+divnya+divnya+divnya+divnya+'</div>';

                // Tombol hapus------------------------
                var hapusPils = '<div class="col-md-1 hapusPil">{{ Form::buttonBack('<i class="bx bx-trash"></i>', array('id'=>'hapusP','class' => 'mb-4 remove_soalPil btn btn-danger text-white')); }}</div>';
                
                // end  
                var divnya_2 = '<div id="cekkOp" class="cekkOp col-md-12 d-inline-flex mb-4">'+divnya_1+hapusPils+'</div>'; 
                $('#soalEssay').append(divnya_2);
            });
        });

        $(document).on('click','.hapusOpsi', function(){
            $(this).parent().remove();
        });

        $(document).on('click','.hapusPil', function(){
            $(this).parent().remove();
        });
        //--------end---------------------
        
    //--------end---------------------
</script>
@endsection
