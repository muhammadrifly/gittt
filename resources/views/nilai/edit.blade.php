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
                     <form method="POST" action="{{ route('nilai.update', $datas->id_nilai)}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                            @include ('nilai.form', ['formMode' => 'edit'])
        </form>
        </div>


        <div class ="col-lg-7">
        <table class="table">
        <thead>
                                <tr>
                                <th width="10px">No</th>
                                <th>id</th>
                                <th>Nama</th>
                                <th>id_subkriteria</th>
                                <th>values</th>
                                <th>Action</th>
                                </tr>
                </thead>
                <tbody>
                            @foreach($coba as $item)
                                             
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->Nama }}</td>
                                    <td>{{ $item->id_subkriteria }}</td>
                                    <td>{{ $item->values }}</td>
                                    <td>
                                        <a href="{{ route('nilai.edit',$item->id_nilai)}}"class="btn btn-success btn-sm ">Edit</a>
                                        <form method="POST" action="{{ url('/nilai' . '/' . $item->id_nilai) }}" accept-charset="UTF-8" style="display:inline">
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


  