@extends('layouts.main')
@section('content')
@if (Session::get('name') == "admin")

    <div class="row" style="padding-left: 0 5px 0 5px">
        <div class="col-lg-5">
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
                            <form method="POST" action="{{ url('/sample') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include ('sample.form', ['formMode' => 'create'])
        </form>
        </div>

        <div class ="col-lg-7">
        <table class="table">
                <thead>
                                <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>sub kriteria</th>
                                <th>values</th>
                                <th>action</th>
                                </tr>
                </thead>
                <tbody>
                @foreach($datas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_calonanggota }}</td>
                        <td>{{ $item->nama_subkriteria }}</td>
                        <td>{{ $item->values }}</td>
                        <td>
                            <a href="{{ route('sample.edit',$item->id)}}"class="btn btn-success btn-sm ">Edit</a>
                            <form method="POST" action="{{ url('/sample' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete node" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                        </td>
                    </tr>`
                @endforeach
                </tbody>
        </table>
        {!! $datas->render() !!}
        </div>
        <br>
    </div>
</div>

@else
<br><br>
<div class="container">
<table class="table">
        
        <thead>
                        <tr>
                        <th width="10px">No</th>
                        <th>Nama</th>
                        <th>values</th>
                        <th>Status</th>
                        </tr>
        </thead>
        <tbody>
        @foreach($ca as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_calonanggota }}</td>
                @if(!empty($totalnilai[$item->id]))
                    @if ($totalnilai[$item->id]['nilai'] >= 2.5)
                    <td>Lulus</td>
                    @else
                    <td>Tidak Lulus</td>
                    @endif
                @endif
            </tr>
        @endforeach
        </tbody>
</table>
<!-- {!! $datas->render() !!} -->

@endif


@endsection


  