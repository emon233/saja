@extends('layouts.app')

@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@append

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <h6>UPDATE PAPER</h6>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <form id="form-archive-update" method="post" action="{{ route('archives.update', $archive->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $archive->title ?? old('title') }}" required autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authors" class="col-md-3 col-form-label text-md-right">{{ __('Authors') }}</label>

                        <div class="col-md-9">
                            <input id="authors" type="text" class="form-control @error('authors') is-invalid @enderror" name="authors" value="{{ $archive->authors ?? old('authors') }}" required>

                            @error('authors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pages" class="col-md-3 col-form-label text-md-right">{{ __('Pages') }}</label>

                        <div class="col-md-9">
                            <input id="pages" type="text" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ $archive->pages ?? old('pages') }}" required>

                            @error('pages')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-md-3 col-form-label text-md-right">{{ __('File') }}</label>

                        <div class="col-md-9">
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">

                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abstract" class="col-md-3 col-form-label text-md-right">{{ __('Abstract') }}</label>
                        <div class="col-md-9">
                            <div id="quill_abstract" class="quill_text_editor">
                                {!! nl2br($archive->abstract) !!}
                            </div>
                            <textarea style="display:none" id="abstract" name="abstract"></textarea>
                            @error('abstract')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="keywords" class="col-md-3 col-form-label text-md-right">{{ __('Keywords') }}</label>

                        <div class="col-md-9">
                            <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') ?? $archive->keywords ?? '' }}" required>

                            @error('keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="how_to_cite" class="col-md-3 col-form-label text-md-right">{{ __('How to Cite') }}</label>
                        <div class="col-md-9">
                            <div id="quill_how_to_cite" class="quill_text_editor">
                                {!! nl2br($archive->how_to_cite) !!}
                            </div>
                            <textarea style="display:none;" id="how_to_cite" name="how_to_cite"></textarea>
                            @error('how_to_cite')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <br>
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


@section('js')

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    $(document).ready(function(){
        var quill_abstract = new Quill('#quill_abstract', {
            theme: 'snow'
        });

        var quill_how_to_cite = new Quill('#quill_how_to_cite', {
            theme: 'snow'
        });

        $('#form-archive-update').on('submit', function(){
            $("#abstract").val($("#quill_abstract .ql-editor").html());
            $("#how_to_cite").val($("#quill_how_to_cite .ql-editor").html());
        })
    })
</script>

@append
