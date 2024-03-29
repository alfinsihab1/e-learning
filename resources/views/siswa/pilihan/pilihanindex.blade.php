@extends('layouts.app_new')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ $soal->judul_soal }} Mata Pelajaran {{ $soal->nama_mapel }}</div>

               
                <div class="card-body">
                    {{ Form::open(array('route' => array('jawaban.pilihan.simpan',['count'=>$count,'user_id'=>Auth::id(),'id'=>$soal->id_mapel, 'idm'=>$soal->id_soal_pilihan])) )  }}
                       
                        @for($i=1; $i <= $count;$i++)
                        {{ Form::label('jawaban', $i.'. '.$soal->soal[$i]); }}
                        <div class="mb-2"></div>
                        {{-- {{ Form::text('jawaban[]',$cek == true ? $jawaban->jawaban_soal[$i] : '',array($dis,'id'=>'soal','class' => 'form-control mb-4', 'placeholder' => 'Silahkan Isi Jawaban Anda')); }} --}}
                            
                            @for($j=0;$j<=4;$j++)
                                <input id="opsi{{ $i }}{{ $j }}" type="radio" value={{ $j }} name="opsi{{ $i }}"> {{ $soal->opsi[$i][$j] }}      
                                <div class="mb-2"></div>
                            @endfor
                            <div class="mb-4"></div>
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
