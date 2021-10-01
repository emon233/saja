@extends('frontend.master')

@section('css')
<link rel="icon" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <h4>{{ __('Title') }}</h4>
        <h5>{!! $archive->title !!}</h5>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h6>{{ __('Authors') }}: <span style="color:#006994;">{!! $archive->authors !!}</span></h6>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h5 id="abstract">{{ __('Abstract') }}</h5>
        <label for="abstract">{!! nl2br($archive->abstract) !!}</label>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h6>{{ __('Keywords') }}: <span style="color:#006994;">{!! $archive->keywords !!}</span></h6>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h6>{{ __('How to Cite') }}: <span style="color:#006994;">{!! $archive->how_to_cite !!}</span></h6>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h6>
            {{ __('Download') }}: &nbsp;
            <a href="{{ route('files.download', $archive->file) }}" target="_blank">
                <svg
                    enable-background="new 0 0 24 24"
                    height="15" viewBox="0 0 24 24" width="15"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="m12 16c-.205 0-.401-.084-.542-.232l-5.25-5.5c-.455-.476-.117-1.268.542-1.268h2.75v-5.75c0-.689.561-1.25 1.25-1.25h2.5c.689 0 1.25.561 1.25 1.25v5.75h2.75c.659 0 .997.792.542 1.268l-5.25 5.5c-.141.148-.337.232-.542.232z"/>
                    <path d="m22.25 22h-20.5c-.965 0-1.75-.785-1.75-1.75v-.5c0-.965.785-1.75 1.75-1.75h20.5c.965 0 1.75.785 1.75 1.75v.5c0 .965-.785 1.75-1.75 1.75z"/>
                </svg>
            </a>
        </h6>
    </div>
</div>

@endsection
