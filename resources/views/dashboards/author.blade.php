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
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.author.reviewing') }}">Papers Under Review ({{ $reviewing }})</a></li>
                        <li><a href="{{ route('papers.author.reviewed') }}">Reviewed Papers ({{ $reviewed }})</a></li>
                        <li><a href="{{ route('papers.author.revisioned') }}">Revisioned Papers ({{ $revisioned }})</a></li>
                        <li><a href="{{ route('papers.author.processing') }}">Papers Under Processing ({{ $processing }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.author.submitted') }}">Submitted Papers ({{ $submitted }})</a></li>
                        <li><a href="{{ route('papers.author.published') }}">Published Papers ({{ $processing }})</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection