@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">Admin</div>
                <div class="card-body">
                    @if (session('message'))
                        {{ Form::buttonNotifku('success', session('message')) }}
                    @elseif(session('delete_message'))
                        {{ Form::buttonNotifku('danger', session('delete_message')) }}
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-4">
                          <div class="card bg-primary text-white">
                            <div class="card-body">
                              <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  
                                </div>
                              </div>
                              <span class="fw-semibold d-block mb-1">Jumlah Mapel</span>     
                              
                              <table style="width:100%">
                                <tr>
                                  <td>
                                    <h3 class="card-title mb-2 text-white">{{ $total_mapel == null ? 0 : $total_mapel }}</h3>
                                  </td>
                                  <td style="text-align:end">
                                    {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> '#'] )}}
                                  </td>
                                </tr>     
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card bg-success text-white">
                              <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">

                                  </div>
                                </div>    
                                <span class="fw-semibold d-block mb-1">Jumlah Guru</span> 
                                
                                <table style="width:100%">
                                  <tr>
                                    <td>
                                      <h3 class="card-title mb-2 text-white">{{ $total_guru ==null ? 0 : $total_guru}}</h3>
                                    </td>
                                    <td style="text-align:end">
                                      {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> route('admin.daftar_guru')] )}}
                                    </td>
                                  </tr>     
                                </table>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card bg-info text-white">
                              <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                  <div class="avatar flex-shrink-0">

                                  </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Jumlah Siswa</span>
                                <table style="width:100%">
                                  <tr>
                                    <td>
                                      <h3 class="card-title mb-2 text-white">{{ $total_siswa == null ? 0 : $total_siswa }}</h3>
                                    </td>
                                    <td style="text-align:end">
                                      {{ Form::buttonBack('cek',['class'=> 'btn btn-light','href'=> route('admin.daftar_siswa')] )}}
                                    </td>
                                  </tr>     
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 ">
              <div class="card-header">Daftar Soal-soal terbaru</div>
              <div class="card-body">
                  <div class="row">
                    @foreach($tampil_soal as $tampil_soals)
                      <div class="col-md-3 mb-4">
                        <div class="card shadow bg-white rounded">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1"> {{ $tampil_soals->nama_mapel }}</span>     
                            
                            <table style="width:100%">
                              <tr>
                                <td>
                                  <h3 class="card-title mb-2 ">{{ $tampil_soals->judul_soal }}</h3>
                                </td>
                                <td style="text-align:end">
                                  {{ Form::buttonBack('cek',['class'=> 'btn btn-dark','href'=> '#'] )}}
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
