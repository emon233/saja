@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>{{ $type }}</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="table table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <th>#</th>
                    <th>Discipline</th>
                    <th>Article Type</th>
                    <th>Title</th>
                    @if(Session::get('role') == config('appConstants.roles.editor'))
                    <th>Author</th>
                    @endif
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($papers as $paper)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $paper->discipline->name }}</td>
                        <td>{{ $paper->type->name }}</td>
                        <td>{{ $paper->title }}</td>
                        @if(Session::get('role') == config('appConstants.roles.editor'))
                        <td>{{ $paper->user->first_name . ' ' . $paper->user->last_name}}</td>
                        @endif
                        <td>{{ $paper->status }}</td>
                        <td>
                            <a href="{{ route('papers.show', $paper->id) }}" class="info"><i class="fa fa-info-circle"></i></a>
                            &nbsp;
                            @if($paper->status == config('appConstants.status.new') && $paper->user_id == auth()->id())
                            <a href="{{ route('papers.edit', $paper->id) }}" class="edit"><i class="fa fa-edit"></i></a>
                            @endif
                            @if($paper->status == config('appConstants.status.reviewed') && $paper->user_id == auth()->id())
                            <a href="{{ route('papers.author.revision', $paper->id) }}" class="upload"><i class="fa fa-upload"></i></a>
                            @endif
                            @if(Session::get('role') == config('appConstants.roles.editor'))
                            <form method="post" action="{{ route('papers.remove', $paper) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection