@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Settings</h5>
                    <ul>
                        <li><a href="{{ route('disciplines.index') }}">Disciplines</a></li>
                        <li><a href="{{ route('types.index') }}">Article Types</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('instructions.index') }}">Front Page</a></li>
                        <li><a href="{{ route('links.index') }}">Upload Important Links</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('issues.index') }}">Issues</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('papers.editor.new') }}">New Submitted Papers({{ $new }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.editor.reviewing') }}">Reviewing Papers({{ $reviewing }})</a></li>
                        <li><a href="{{ route('papers.editor.reviewed') }}">Reviewed Papers({{ $reviewed }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.editor.revisioning') }}">Revisioning Papers({{ $revisioning }})</a></li>
                        <li><a href="{{ route('papers.editor.revisioned') }}">Revisioned Papers({{ $revisioned }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.editor.accepted') }}">Accepted Papers({{ $accepted }})</a></li>
                        <li><a href="{{ route('papers.editor.rejected') }}">Rejected Papers({{ $rejected }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.editor.processing') }}">Processing Papers({{ $processing }})</a></li>
                        <li><a href="{{ route('papers.editor.published') }}">Published Papers({{ $published }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('papers.index') }}">All Submitted Papers({{ $all }})</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection