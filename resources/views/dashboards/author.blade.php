@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('papers.create') }}">New Submission</a></li>
                        <li><a href="{{ route('papers.author.submitted') }}">Submitted Papers ({{ $submitted }})</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection