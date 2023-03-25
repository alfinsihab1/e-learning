@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Daftar Mata Pelajaran</div>

                <div class="card-body">
                    @if (session('message'))
                        {{ Form::buttonNotifku('success', session('message')) }}
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor Kode Mata Pelajaran</th>
                                    <th>Nama Pelajaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($daftar_mapel as $daftar_mapels)
                                    <tr>
                                        <td>{{ $daftar_mapels->id_mapel }}</td>
                                        
                                        <td>{{ $daftar_mapels->nama_mapel }}</td>
                                        <td>
                                            <a href= {{ route('mapel.edit',['id_mapel' =>$daftar_mapels->id_mapel]) }} type="button" class="btn btn-success"> Edit </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href= {{ route('mapel.delete', ['id'=>$daftar_mapels->id_mapel]) }} type="button" class="btn btn-danger">Hapus</a>
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
