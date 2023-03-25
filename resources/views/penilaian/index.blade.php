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
                    <div class="col-md-6">Daftar Soal yang Sudah Dikerjakan</div>
                    <div class="col-md-2" >    
                        {{ Form::select('nama_kelas',['1'=>'A','2'=>'B','3'=>'C','4'=>'D','5'=>'E'], null, ['id' => 'filter_kelas','class' => 'filter form-control mb-4']); }}
                    </div>
                    
                </div>
              </div>
              <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead class="table-dark" >
                                <tr>
                                    <th class="text-white">No</th>
                                    <th class="text-white">Mapel</th>
                                    <th class="text-white">Soal</th>
                                    <th class="text-white">Jumlah Murid</th>
                                    
                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                
                                @foreach($soals as $soall)
                                  <tr>
                                    <td>{{ $i+=1 }}</td>
                                    <td>{{ $soall->nama_mapel }}</td>
                                    <td>{{ $soall->judul_soal }}</td>
                                    <td>{{ $kelakus }}</td>
                                    
                                    <td>
                                        {{ Form::buttonBack('Detail', ['class'=> 'btn btn-warning','href'=>route('guru.nilai',['id'=> $soall->id_soal, 'idk'=> $soall->id_kelas])] ) }}      
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                  </div>
              </div>
          </div>

    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>


    $(document).ready(function(){
        $('.filter').on('change', function(){
            var kelas = $(this).val();
            $.ajax({
                url:"{{ route('penilaian') }}",
                type:"GET",
                data:{'nama_kelas':kelas},
                success:function(data){
                    var hasil = data.filtesr;
                    var kelasd = data.kelasa;
                    var html = ''; 
                    
                    if(hasil.length > 0){
                        for(let i=0;i<hasil.length;i++){
                            var has = hasil[i]['id_soal'];
                            
                            html += '<tr>\
                                        <td>'+(i+1)+'</td>\
                                        <td>'+hasil[i]['nama_mapel']+'</td>\
                                        <td>'+hasil[i]['judul_soal']+'</td>\
                                        <td>'+kelasd+'</td>\
                                        <td>'+'{{ Form::buttonBack('Detail', ['class'=> 'btn btn-warning','href'=>route('guru.nilai',['id'=> $soall->id_soal, 'idk'=> $soall->id_kelas])] ) }}'+'</td>\
                                    </tr>';                 
                        }
                    }
                    else{
                        html += '<tr>\
                            <td> Kosong </td>\
                            </tr>';
                    }
                    $('#tbody').html(html);
                }
            })
        })
    })
</script>