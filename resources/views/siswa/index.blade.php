@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">Siswa</div>
                <div class="card-body">
                    @if (session('message'))
                        {{ Form::buttonNotifku('success', session('message')) }}
                    
                    @endif
                </div>
            </div>
            
            <div class="card mb-4 ">
                <div class="card-header">Daftar Semua Soal Essay terbaru</div>
                <div class="card-body">
                    <div class="row">
                      @foreach($soal as $mapel_soals)
                        <div class="col-md-3 mb-4">
                          <div class="card shadow bg-white rounded">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  
                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1"> {{ $mapel_soals->mapel->nama_mapel }}</span>     
                              
                              <table style="width:100%">
                                  <td>
                                    <h4 class="card-title mb-2 ">{{ $mapel_soals->judul_soal }}</h4>
                                  </td>
                                  <td style="text-align:end">
                                    {{ Form::buttonBack('cek',['class'=> 'btn btn-dark','href'=> '#'] )}}
                                  </td>
  
                              </table>
                            </div>
                          </div>
                        </div>
                      @endforeach  
                    </div>
                </div>
            </div>  
            <div class="card mb-4 ">
              <div class="card-header">Daftar Semua Soal Pilihan Ganda Terbaru</div>
              <div class="card-body">
                  <div class="row">
                    @foreach($pilgan as $pilgan_soals)
                      <div class="col-md-3 mb-4">
                        <div class="card shadow bg-white rounded">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1"> {{ $pilgan_soals->mapel->nama_mapel }}</span>     
                            
                            <table style="width:100%">
                                <td>
                                  <h4 class="card-title mb-2 ">{{ $pilgan_soals->judul_soal }}</h4>
                                </td>
                                <td style="text-align:end">
                                  {{ Form::buttonBack('cek',['class'=> 'btn btn-dark','href'=> '#'] )}}
                                </td>

                            </table>
                          </div>
                        </div>
                      </div>
                    @endforeach  
                  </div>
              </div>
          </div>         
            <div class="card mb-4 ">
              <div class="card-header">Daftar Soal Terbaru yang Sudah Dikerjakan</div>
              <div class="card-body">
                  <div class="row">
                    
                    @foreach($cek as $tampil_soals)
                      <div class="col-md-3 mb-4">
                        <div class="card shadow bg-white rounded">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1"> {{ $tampil_soals->mapel->nama_mapel }}</span>     
                            
                            <table style="width:100%">
                              <tr>
                                <td>
                                  @if($tampil_soals->type == 1)
                                    <h4 class="card-title mb-2 ">{{ $tampil_soals->soals->judul_soal }}</h4>
                                  @elseif($tampil_soals->type == 2)
                                    <h4 class="card-title mb-2 ">{{ $tampil_soals->pilg->judul_soal }}</h4>
                                  @endif
                                </td>
                                <td style="text-align:end">
                                  {{ Form::buttonBack('cek',['class'=> 'btn btn-dark','href'=> route('jawaban.cek', 
                                  ['user'=>Auth::akses(), 
                                  'id' => $tampil_soals->id_soal,
                                  'id_user' => Auth::id()
                                  ])
                                  ] )}}
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
