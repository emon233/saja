@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('forwards.upload', $forward->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="opinion_format" class="col-md-4 col-form-label text-md-right">{{ __('Upload Opinion Format') }}</label>

                        <div class="col-md-8">
                            <input id="opinion_format" type="file" class="form-control @error('opinion_format') is-invalid @enderror" name="opinion_format" value="{{ old('opinion_format') }}" required>

                            @error('opinion_format')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg"></strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="manuscript" class="col-md-4 col-form-label text-md-right">{{ __('Upload Manuscript') }}</label>

                        <div class="col-md-8">
                            <input id="manuscript" type="file" class="form-control @error('manuscript') is-invalid @enderror" name="manuscript" value="{{ old('manuscript') }}" required>

                            @error('manuscript')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg"></strong>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure?')" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection