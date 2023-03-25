@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <table style="width:100%">
                        <tr>
                            <td>Halaman Menambahkan Soal</td>
                            <td style="text-align: end">{{ Form::buttonBack('Tambah Soal', array('style'=>'float:right','id'=>'tambah','class' => 'addsoal btn btn-success text-white')); }}    </td>
                        </tr>
                    </table>     
                </div>

                <div class="card-body">
                    {{ Form::open(array('route' => array('mapel.soal.update',['id'=>$soal->id_mapel, 'idm'=>$soal->id_soal])) )  }}
                        
                        {{ Form::label('id_mapel', 'Mata Pelajaran Soal'); }}

                        <select class="form-control mb-4" name="id_mapel">
                            @foreach($daftar_mapel as $mapel)
                                <option value="{{ $mapel->id_mapel }}" {{$soal->id_mapel == $mapel->id_mapel  ? 'selected' : ''}}>{{ $mapel->nama_mapel}}</option>
                            @endforeach
                        </select>

                        {{ Form::label('judul_soal', 'Judul Soal'); }}
                        {{ Form::text('judul_soal',$soal->judul_soal,array('class' => 'form-control mb-4', 'placeholder' => 'Materi Penjumlahan')); }}
                        
                        @for($i=1; $i <= $count;$i++)
                        {{ Form::label('soal', 'Masukkan Soal Nomor '.$i); }}
                        {{ Form::text('soal[]',$soal->soal[$i],array('id'=>'soal','class' => 'form-control mb-4')); }}
                        @endfor

                        <div class="soalBaru"></div>
                      
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')); }}
                    {{ Form::close() }}   
                </div>
            </div>
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $('.addsoal').on('click', function(){
        addSoal();
    });

    function addSoal(){
        var nmr = 1;
        var soal = '{{ Form::label('soal', 'Masukkan Soal Nomor '); }} {{ Form::text('soal[]','',array('id'=>'soal','class' => 'form-control mb-4')); }} ';
        $('.soalBaru').append(soal);
    }



</script>
@endsection
