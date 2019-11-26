@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>NEW SUBMISSION</h4>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <a href="{{ route('papers.author.submitted') }}" class="btn btn-primary float-right">Index</a>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            <form method="post" action="{{ route('papers.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="discipline" class="col-md-4 col-form-label text-md-right">{{ __('Select Discipline') }}</label>

                        <div class="col-md-8">
                            <select id="discipline" class="form-control @error('discipline') is-invalid @enderror" name="discipline" value="{{ old('discipline') }}" required>
                                <option value="" disabled selected>(select)</option>
                                @foreach($disciplines as $discipline)
                                <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                @endforeach
                            </select>
                            @error('discipline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must Select a Discipline</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Select Article Type') }}</label>

                        <div class="col-md-8">
                            <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required>
                                <option selected disabled>(select)</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must Select an Article Type</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-8">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be Under 250 Digits</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="running_title" class="col-md-4 col-form-label text-md-right">{{ __('Running Title') }}</label>

                        <div class="col-md-8">
                            <input id="running_title" type="text" class="form-control @error('running_title') is-invalid @enderror" name="running_title" value="{{ old('running_title') }}" required>

                            @error('running_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be Under 250 Digits</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keywords" class="col-md-4 col-form-label text-md-right">{{ __('Keywords') }}</label>

                        <div class="col-md-8">
                            <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') }}" required>

                            @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Can not be more than 5 words</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="check_list" class="col-md-4 col-form-label text-md-right">{{ __('Upload Check List') }}</label>

                        <div class="col-md-8">
                            <input id="check_list" type="file" class="form-control @error('check_list') is-invalid @enderror" name="check_list" value="{{ old('title_page') }}" required>

                            @error('check_list')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 500 KB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cover_letter" class="col-md-4 col-form-label text-md-right">{{ __('Upload Cover Letter') }}</label>

                        <div class="col-md-8">
                            <input id="cover_letter" type="file" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter" value="{{ old('cover_letter') }}" required>

                            @error('cover_letter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 500 KB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title_page" class="col-md-4 col-form-label text-md-right">{{ __('Upload Title Page') }}</label>

                        <div class="col-md-8">
                            <input id="title_page" type="file" class="form-control @error('title_page') is-invalid @enderror" name="title_page" value="{{ old('title_page') }}" required>

                            @error('title_page')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 500 KB</strong>
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
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 5 MB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="processing_fee" class="col-md-4 col-form-label text-md-right">{{ __('Upload Payment Slip') }}</label>

                        <div class="col-md-8">
                            <input id="processing_fee" type="file" class="form-control @error('processing_fee') is-invalid @enderror" name="processing_fee" value="{{ old('processing_fee') }}" required>

                            @error('processing_fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .pdf/.jpeg/.jpg file. Max File Size: 500 KB</strong>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="SUBMIT" style="width:30%;">
                </div>
            </form>
        </div>

    </div>
</div>

@endsection