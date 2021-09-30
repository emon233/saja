@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <h6>UPLOAD NEW PAPER</h6>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('archives.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="issue_id" value="{{ $issue->id }}">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authors" class="col-md-4 col-form-label text-md-right">{{ __('Authors') }}</label>

                        <div class="col-md-6">
                            <input id="authors" type="text" class="form-control @error('authors') is-invalid @enderror" name="authors" value="{{ old('authors') }}" required>

                            @error('authors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pages" class="col-md-4 col-form-label text-md-right">{{ __('Pages') }}</label>

                        <div class="col-md-6">
                            <input id="pages" type="text" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages') }}" required>

                            @error('pages')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                        <div class="col-md-6">
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required>

                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="submit" class="col-md-4 col-form-label"></label>

                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary float-right" value="UPLOAD">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection