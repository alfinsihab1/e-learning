@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Daftar Nama Siswa</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Handphone</th>
                                    <th>Nomor Induk</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar_siswa as $daftar_siswas)
                                    <tr>
                                        <td>{{ $daftar_siswas->name }}</td>
                                        <td>{{ $daftar_siswas->email }}</td>
                                        <td>{{ $daftar_siswas->nohp }}</td>
                                        <td>{{ $daftar_siswas->no_induk }}</td>
                                        <td>
                                            <a href= {{ route('admin.edit',['id' =>$daftar_siswas->id]) }} type="button" class="btn btn-success"> Edit </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href= {{ route('admin.delete',['id' =>$daftar_siswas->id]) }} type="button" class="btn btn-danger">Hapus</a>
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
