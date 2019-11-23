@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-8 mb-4">
        <h6 class="float-left">CREATE NEW LINK</h6>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <form method="post" action="{{ route('links.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Link Title') }}</label>

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
                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>

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
                <div class="col-lg-10 col-md-10 mb-4">
                    <input type="submit" class="btn btn-primary float-right" value="SUBMIT">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection