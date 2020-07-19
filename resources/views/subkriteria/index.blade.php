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
                            <form method="POST" action="{{ url('/subkriteria') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include ('subkriteria.form', ['formMode' => 'create'])
        </form>
        </div>


        <div class ="col-lg-7">
        <table class="table">
                <thead>
                                <tr>
                                <th width="10px">No</th>
                                <th>id_kriteria</th>
                                <th>nama subkriteria</th>
                                <th>target</th>
                                <th>type</th>
                                <th>Action</th>
                                </tr>
                </thead>
                <tbody>
                            @foreach($datas as $item)
                                             
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id_kriteria}}</td>
                                    <td>{{ $item->nama_subkriteria }}</td>
                                    <td>{{ $item->target }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        <a href="{{ route('subkriteria.edit',$item->id_subkriteria)}}"class="btn btn-success btn-sm ">Edit</a>
                                        <form method="POST" action="{{ url('/subkriteria' . '/' . $item->id_subkriteria) }}" accept-charset="UTF-8" style="display:inline">
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
</div>
@endsection


  