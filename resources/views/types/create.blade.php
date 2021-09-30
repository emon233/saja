@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>ARTICLE TYPE - CREATE</h4>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <a href="{{ route('types.index') }}" class="btn btn-primary float-right">INDEX</a>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <form method="post" action="{{ route('types.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Article Type Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-md-6">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection