@extends('frontend.master')
@section('css')
<link rel="icon" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<h4>Archive</h4>
<br>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <th>Year</th>
        <th>Volume</th>
        <th>Issue</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($issues as $issue)
        <tr>
            <td>{{$issue->year}}</td>
            <td>{{$issue->volume}}</td>
            <td>{{$issue->issue_no}}</td>
            <td>
                <a href="{{ route('index.archives.details', $issue->id) }}">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
@endsection