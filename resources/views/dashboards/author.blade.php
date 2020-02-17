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
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.author.accepted') }}">Accepted Papers ({{ $accepted }})</a></li>
                        <li><a href="{{ route('papers.author.processing') }}">Papers Under Processing ({{ $processing }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.author.submitted') }}">Submitted Papers ({{ $submitted }})</a></li>
                        <li><a href="{{ route('papers.author.published') }}">Published Papers ({{ $published }})</a></li>
                        <li><a href="{{ route('papers.author.rejected') }}">Rejected Papers ({{ $rejected }})</a></li>
                    </ul>
                    <br>
                    <br>
                    <div class="justify-content-center">
                        <h6 style="text-align:center;">Want to be a part of SAJA's Reviewer Panel. Click Below.</h6>
                        <form method="post" action="{{ route('reviewers.request') }}">
                            @csrf
                            <input type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure?')" value="BECOME A REVIEWER">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection