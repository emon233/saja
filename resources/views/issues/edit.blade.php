@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <h5>CREATE NEW ISSUE</h5>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10 mb-4">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('issues.update', $issue->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <input id="year" type="year" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $issue->year ?? old('year') ?? '' }}" required autofocus>

                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="volume" class="col-md-4 col-form-label text-md-right">{{ __('Volume') }}</label>

                        <div class="col-md-6">
                            <input id="volume" type="volume" class="form-control @error('volume') is-invalid @enderror" name="volume" value="{{ $issue->volume ?? old('volume') ?? '' }}" required>

                            @error('volume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="issue_no" class="col-md-4 col-form-label text-md-right">{{ __('Issue No') }}</label>

                        <div class="col-md-6">
                            <input id="issue_no" type="issue_no" class="form-control @error('issue_no') is-invalid @enderror" name="issue_no" value="{{ $issue->issue_no ?? old('issue_no') ?? '' }}" required>

                            @error('issue_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="submit" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary float-right" value="SAVE">
                        </div>
                    </div>
                </form>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <form method="post" action="{{ route('issues.current', $issue->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="submit" class="btn btn-success" value="MAKE CURRENT">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form method="post" action="{{ route('issues.delete', $issue->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection