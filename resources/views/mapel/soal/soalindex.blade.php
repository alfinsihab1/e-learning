@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">Halaman Soal</div>
                <div class="card-body">
                    @if (session('message'))
                        {{ Form::buttonNotifku('success', session('message')) }}
                    @elseif(session('delete_message'))
                        {{ Form::buttonNotifku('danger', session('delete_message')) }}
                    @endif

                    <div class="row">
                    @foreach($daftar_soal as $daftar_soals)
                        <div class="col-md-3 mb-4">
                          <div class="card bg-secondary text-white">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  
                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1"></span>     
                              
                              <table style="width:100%">
                                <tr>
                                  <td>
                                    <h3 class="card-title mb-2 text-white">{{ $daftar_soals->nama_mapel }}</h3>
                                  </td>
                                  <td style="text-align:end">
                                    {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> route('mapel.soal',$daftar_soals->id_mapel)] )}}
                                  </td>
                                </tr>     
                              </table>
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
