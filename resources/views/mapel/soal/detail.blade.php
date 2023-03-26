@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">
                  {{ Form::buttonBack('Kembali',['class'=>'text-white btn btn-info', 'href' => url()->previous()]) }}
                </div>
                <div class="card-body">
                    @if (session('message'))
                        {{ Form::buttonNotifku('success', session('message')) }}
                    @elseif(session('delete_message'))
                        {{ Form::buttonNotifku('danger', session('delete_message')) }}
                    @endif

                    <div class="row">
                        @foreach($soal as $soals)
                        <div class="col-md-3 mb-4">
                          <div class="card bg-secondary text-white">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  
                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1"></span>     
                              <h3 class="card-title mb-2 text-white">{{ $soals->judul_soal }}</h3>
                              {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> route('mapel.soal.edit',['user'=> Auth::akses(),'idm'=> $soals->id_soal,'id'=>$soals->id_mapel])] )}}
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        @foreach($pilgan as $pilgans)
                        <div class="col-md-3 mb-4">
                          <div class="card bg-secondary text-white">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  
                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1"></span>     
                                <h3 class="card-title mb-2 text-white">{{ $pilgans->judul_soal }}</h3>
                                {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> route('soal.show.pilgan',['user'=> Auth::akses(),'idm'=> $pilgans->id_soal_pilihan,'id'=>$pilgans->id_mapel])] )}}
                            </div>
                          </div>
                        </div>
                   @endforeach
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
