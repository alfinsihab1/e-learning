@extends('layouts.app_new')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

            <div class="card">
                <div class="card-header">Daftar Nama Guru</div>

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
                                @foreach ($daftar_guru as $daftar_gurus)
                                    <tr>
                                        <td>{{ $daftar_gurus->name }}</td>
                                        <td>{{ $daftar_gurus->email }}</td>
                                        <td>{{ $daftar_gurus->nohp }}</td>
                                        <td>{{ $daftar_gurus->no_induk }}</td>
                                        <td>
                                            
                                            <a href= {{ route('admin.edit',['id' =>$daftar_gurus->id]) }} type="button" class="btn btn-success"> Edit </a>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href= {{ route('admin.delete',['id' =>$daftar_gurus->id]) }} type="button" class="btn btn-danger">Hapus</a>
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
