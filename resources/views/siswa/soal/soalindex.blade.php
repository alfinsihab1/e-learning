@extends('layouts.app_new')

{{-- perubahan --}}
{{-- perubahan --}}
{{-- perubahan --}}

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ $soal->judul_soal }} Mata Pelajaran {{ $soal->nama_mapel }}</div>

               
                <div class="card-body">
                    {{ Form::open(array('route' => array('jawaban.store',['user'=>Auth::akses(),'id'=>$soal->id_mapel, 'idm'=>$soal->id_soal])) )  }}
                       
                        @for($i=1; $i <= $count;$i++)
                        {{ Form::label('jawaban', $i.'. '.$soal->soal[$i]); }}
                        
                        {{ Form::text('jawaban[]',$cek == true ? $jawaban->jawaban_soal[$i] : '',array($dis,'id'=>'soal','class' => 'form-control mb-4', 'placeholder' => 'Silahkan Isi Jawaban Anda')); }}

                        @endfor

                        {{ Form::submit('Submit', array('class' => 'btn btn-primary', 'style'=> 'display:'.$display)); }}
                        {{ Form::buttonBack('Kembali',['class'=>'text-white btn btn-info', 'href' => url()->previous()]) }}
                    {{ Form::close() }}   
                </div>
            </div>
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@endsection
