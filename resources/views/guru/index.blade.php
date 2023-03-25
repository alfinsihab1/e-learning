@extends('layouts.app_new')

@section('content')

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Guru</div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
@endsection
