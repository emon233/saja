@extends('frontend.master')
@section('css')
<link rel="icon" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<h4>Current Issue</h4>
<br>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Authors</th>
        <th>Pages</th>
    </thead>
    <tbody>
        @foreach($issue->issueDetails as $key=>$details)
        <tr>
            <td>{{$key+1}}</td>
            <td><a href="/files/publish/{{$details->file}}" target="_blank">{{$details->title}}</td>
            <td>{{$details->authors}}</td>
            <td>{{$details->pages}}</td>
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