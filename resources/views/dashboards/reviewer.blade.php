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
                        <li><a href="{{ route('forwards.index.new') }}">New Forwarded Papers({{ $new }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('forwards.index.accepted') }}">Accepted Papers({{ $accepted }})</a></li>
                        <li><a href="{{ route('forwards.index.rejected') }}">Rejected Papers({{ $rejected }})</a></li>
                        <li><a href="{{ route('forwards.index.reviewed') }}">Reviewed Papers({{ $reviewed }})</a></li>
                        <li>&nbsp;</li>
                        <li><a href="{{ route('forwards.index') }}">All Forwarded Papers({{ $all }})</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection