@extends('layouts.main')
@section('content')
<div class="container" style="padding-top: 10px">
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
                     <form method="POST" action="{{ route('sample.update', $datas->id)}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                            @include ('sample.form', ['formMode' => 'edit'])
        </form>
        </div>


        <div class ="col-lg-7">
        <table class="table">
        <thead>
                                <tr>
                                <th width="10px">No</th>
                                <th>id_nilai</th>
                                <th>nama subnilai</th>
                                <th>secondary_factor</th>
                                <th>core_factor</th>
                                <th>Action</th>
                                </tr>
                </thead>
                <tbody>
                            @foreach($coba as $item)
                                             
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id_nilai }}</td>
                                    <td>{{ $item->nama_subnilai }}</td>
                                    <td>{{ $item->target }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        <a href="{{ route('sample.edit',$item->id)}}"class="btn btn-success btn-sm ">Edit</a>
                                        <form method="POST" action="{{ url('/sample' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete node" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
        </table>
                {!! $coba->render() !!}

        </div>
    </div>
</div>
@endsection


  