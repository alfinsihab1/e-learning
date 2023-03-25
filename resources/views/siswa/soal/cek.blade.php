@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">{{ $soal->judul_soal }} Mata Pelajaran {{ $soal->mapel->nama_mapel }}</div>

                <div class="card-body">
                    {{ Form::open(array() )  }}
                       
                        @for($i=1; $i <= $count;$i++)
                        {{ Form::label('jawaban', $i.'. '.$soal->soal[$i]); }}
                        {{ Form::text('jawaban[]',$jawaban->jawaban_soal[$i],array('id'=>'soal','class' => 'form-control mb-4', 'disabled' => 'disabled')); }}
                        @endfor

                        {{ Form::buttonBack('Kembali',['class'=>'text-white btn btn-info', 'href' => url()->previous()]) }}
                    {{ Form::close() }}   
                </div>
            </div>
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@endsection
