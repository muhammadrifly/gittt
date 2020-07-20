@extends('layouts.main')
@section('content')
    <div class="row" style="padding-left: 0 5px 0 5px">
        <div class="col-lg-3">
            {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ url('/data-ca') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include ('calonAnggota.form', ['formMode' => 'create'])
        </form>
        </div>


        <div class ="col-lg-7 table-responsive-xl">
        <table class="table">
                <thead>
                                <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>password</th>
                                <th>Action</th>
                                </tr>
                </thead>
                <tbody>
                            @foreach($datas as $item)
                                             
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <th>{{ $item->nama_calonanggota }}</th>
                                    <th>{{ $item->jurusan }}</th>
                                    <th>{{ $item->email_calonanggota }}</th>
                                    <th>{{ $item->nomor_telp }}</th>
                                    <th>{{ $item->password }}</th>
                                    <td>
                                        <a href="{{ route('data-ca.edit',$item->id)}}"class="btn btn-success btn-sm ">Edit</a>
                                        <form method="POST" action="{{ url('/data-ca' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete node" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
        </table>
                {!! $datas->render() !!}

        </div>
    </div>
@endsection


  