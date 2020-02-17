@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>MANUSCRIPT DETAILS</h4>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card content-center">
            @if($forward->status == config('appConstants.forwards.accepted'))
            <div class="card-header">
                <a href="{{ route('forwards.upload', $forward->id) }}" class="btn btn-warning float-right">Upload Review</a>
            </div>
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <label for="discipline" class="col-md-4 col-form-label text-md-right">{{ __('Discipline') }}</label>
                    <label for="discipline" class="col-md-8 col-form-label text-md-left" style="font-weight:bold;">{{ $forward->paper->discipline->name }}</label>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Article Type') }}</label>
                    <label for="type" class="col-md-8 col-form-label text-md-left" style="font-weight:bold;">{{ $forward->paper->type->name }}</label>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <label for="title" class="col-md-8 col-form-label text-md-left" style="font-weight:bold;">{{ $forward->paper->title ?? '' }}</label>
                </div>
                <div class="form-group row">
                    <label for="running_title" class="col-md-4 col-form-label text-md-right">{{ __('Running Title') }}</label>
                    <label for="running_title" class="col-md-8 col-form-label text-md-left" style="font-weight:bold;">{{ $forward->paper->running_title ?? '' }}</label>
                </div>
                <div class="form-group row">
                    <label for="keywords" class="col-md-4 col-form-label text-md-right">{{ __('Keywords') }}</label>
                    <label for="title" class="col-md-8 col-form-label text-md-left" style="font-weight:bold;">{{ $forward->paper->keywords ?? '' }}</label>
                </div>
                <hr>
                <label class="form-group row">
                    <label for="manuscript" class="col-md-4 col-form-label text-md-right">{{ __('Manuscript') }}</label>

                    <label for="manuscript" class="col-md-4 col-form-label text-md-left">
                        <a href="{{ route('files.download', $forward->paper->manuscript) }}" target="_blank">{{ __('Download') }}</a>
                    </label>
                </label>
                @if($forward->status == config('appConstants.forwards.forwarded'))
                <hr>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-3 mb-4">
                        <form method="post" action="{{ route('forwards.accept', $forward->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Accept</button>
                        </form>
                    </div>
                    <div class="col-lg-7 col-md-7 mb-4">
                        <form method="post" action="{{ route('forwards.reject', $forward->id) }}">
                            @csrf
                            @method('PUT')
                            <textarea id="comments" name="comments" class="form-control" placeholder="Leave a Comment if you want to Reject" required></textarea>
                            <br>
                            <input type="submit" class="btn btn-danger float-right" onclick="return confirm('Are you sure?')" value="Reject">
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection