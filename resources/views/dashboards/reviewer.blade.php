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
                        <li><a href="{{ route('forwards.index') }}">Forwarded Papers({{ $forwards }})</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection