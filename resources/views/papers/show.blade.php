@extends('layouts.app')
@section('content')

@include('papers.partials.comments')
<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>PAPER INFO</h4>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            @if(($paper->status == config('appConstants.status.new') || $paper->status == config('appConstants.status.reviewing') ) && Session::get('role') == config('appConstants.roles.editor'))
            <div class="card-header">
                <a href="{{ route('forwards.create', $paper->id) }}" class="btn btn-warning float-right">Forward</a>
            </div>
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <label for="discipline" class="col-md-4 col-form-label text-md-right">{{ __('Discipline') }}</label>

                    <div class="col-md-8">
                        <select id="discipline" class="form-control @error('discipline') is-invalid @enderror" name="discipline" disabled>
                            <option selected disabled>{{ $paper->discipline->name ?? '' }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Article Type') }}</label>

                    <div class="col-md-8">
                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" disabled>
                            <option selected disabled>{{ $paper->type->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $paper->title ?? '' }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="running_title" class="col-md-4 col-form-label text-md-right">{{ __('Running Title') }}</label>

                    <div class="col-md-8">
                        <input id="running_title" type="text" class="form-control" name="running_title" value="{{ $paper->running_title ?? '' }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keywords" class="col-md-4 col-form-label text-md-right">{{ __('Keywords') }}</label>

                    <div class="col-md-8">
                        <input id="keywords" type="text" class="form-control" name="keywords" value="{{ $paper->keywords }}" disabled>
                    </div>
                </div>
                @include('papers.partials.initials')
                @include('papers.partials.reviewed')
                @if($paper->status == config('appConstants.status.reviewing') && Session::get('role') == config('appConstants.roles.editor'))
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#comments-modal">MARK AS REVIEWED</button>
                    </div>
                </div>
                @endif
                @include('papers.partials.revisioned')
                @include('papers.partials.galleyproves')
                @if($paper->status == config('appConstants.status.reviewed') && $paper->user_id == auth()->id())
                <hr>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <a href="{{ route('papers.author.revision', $paper->id) }}" class="btn btn-warning float-right">UPLOAD REVISION</a>
                    </div>
                </div>
                @endif
                @if($paper->status == config('appConstants.status.revisioned') && Session::get('role') == config('appConstants.roles.editor'))
                <hr>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <form method="post" action="{{ route('papers.accept', $paper->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-success float-right" onclick="return confirm('Are you sure?')" value="ACCEPT">
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <form method="post" action="{{ route('papers.reject', $paper->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-danger float-left" onclick="return confirm('Are you sure?')" value="REJECT">
                        </form>
                    </div>
                </div>
                @endif
                @if($paper->status == config('appConstants.status.accepted') && Session::get('role') == config('appConstants.roles.editor'))
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <a href="{{ route('papers.editor.galleyproof', $paper->id) }}" class="btn btn-success float-right"><i class="fa fa-upload"></i> Upload Galley-Proof</a>
                    </div>
                </div>
                @endif
                @if($paper->status == config('appConstants.status.processing') && $paper->user_id == auth()->id())
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <a href="{{ route('papers.author.galleyproof', $paper->id) }}" class="btn btn-success float-right"><i class="fa fa-upload"></i> Upload Final Galley-Proof</a>
                    </div>
                </div>
                @endif
                @if($paper->status == config('appConstants.status.processing') && Session::get('role') == config('appConstants.roles.editor'))
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <form method="post" action="{{ route('papers.published', $paper->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-warning float-left" value="PUBLISH PAPER">
                        </form>
                    </div>
                </div>
                @endif
            </div>
            @if($paper->status == config('appConstants.status.new') && $paper->user_id == auth()->id())
            <div class="card-footer">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 mb-4">
                        <a href="{{ route('papers.edit', $paper->id) }}" class="btn-success form-control text-center"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <form method="post" action="{{ route('papers.destroy', $paper->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="form-control btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection