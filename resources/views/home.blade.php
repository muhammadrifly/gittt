@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
           <h1>Selamat Datang Diseleksi UKM INFROMATIKA & KOMPUTER</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
