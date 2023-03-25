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
              <div class="card-header">
                <div class="col-md-12 d-inline-flex">
      
                    
                </div>
              </div>
              <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead class="table-dark" >
                                <tr>
                                    <th class="text-white">No</th>
                                    <th class="text-white">Nama Siswa</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white"></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                
                                {{-- @foreach($soals as $soall) --}}
                                  <tr>
                                    <td>{{ $idk }}</td>
                                    <td> </td>
                                    <td> </td>
                                    
                                    
                                    <td>
                                        {{ Form::buttonBack('Detail', ['class'=> 'btn btn-warning','href'=>'' ]) }}      
                                    </td>
                                  </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                  </div>
              </div>
          </div>

    </div>
</div>
@endsection
