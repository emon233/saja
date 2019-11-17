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
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('papers.index') }}">New Submitted Papers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection