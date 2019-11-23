@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-8 mb-4">
        <h6 class="float-left">IMPORTANT LINKS</h6>
        <a href="{{ route('links.create') }}" class="btn btn-primary float-right">CREATE NEW</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $link->title }}</td>
                                <td>
                                    <a href="{{ Storage::url($link->file) }}" target="_blank">{{ __('Download') }}</a>
                                </td>
                                <td>
                                    <div class="float-left">
                                        <form method="get" action="{{ route('links.edit', $link->id) }}">
                                            <button class="btn btn-success">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="float-left">
                                        <form method="post" action="{{ route('links.delete', $link->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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