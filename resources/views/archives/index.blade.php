@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <h6>PAPERS</h6>
        <a href="{{ route('archives.create', $issue->id) }}" class="btn btn-primary float-right">UPLOAD NEW PAPER</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10 mb-4">
        <div class="table table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>File</th>
                    <th>Pages</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($archives as $archive)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $archive->title }}</td>
                        <td>{{ $archive->authors }}</td>
                        <td>
                            <a href="{{ Storage::url($archive->file) }}">Download</a>
                        </td>
                        <td>{{ $archive->pages }}</td>
                        <td>
                            <a href="{{ route('archives.edit', $archive->id) }}" class="edit"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection