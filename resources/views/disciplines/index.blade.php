@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>DISCIPLINES</h4>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <a href="{{ route('disciplines.create') }}" class="btn btn-primary float-right">CREATE NEW</a>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="table table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($disciplines as $discipline)
                    <tr @if($discipline->status) style="background-color:#a7ebaf;"
                        @else style="background-color:#ed9c98;"
                        @endif
                        >
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $discipline->name }}</td>
                        <td>
                            @if(!$discipline->status)
                            <form method="post" class="d-inline ml-2" action="{{ route('disciplines.activate', $discipline->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submint" class="btn btn-success">
                                    <i class="fa fa-check"></i> Activate
                                </button>
                            </form>
                            @else
                            <form method="post" class="d-inline ml-2" action="{{ route('disciplines.deactivate', $discipline->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submint" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i> Deactivate
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('disciplines.edit', $discipline->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection