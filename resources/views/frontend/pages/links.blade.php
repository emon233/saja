@extends('frontend.master')
@section('css')
<link rel="icon" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<h4>Important Links</h4>
<br>
<table class="table table-striped table-bordered" style="width:100%">
    <tbody>
        <tr>
            <td>Check List</td>
            <td><a href="/files/links/checklist.docx">Download</a></td>
        </tr>
        <tr>
            <td>Declaration Letter</td>
            <td><a href="/files/links/letter.doc">Download</a></td>
        </tr>
        <tr>
            <td>Review Opinion Format</td>
            <td><a href="/files/links/review.doc">Download</a></td>
        </tr>
        <tr>
            <td>Title Page</td>
            <td><a href="/files/links/title.docx">Download</a></td>
        </tr>
    </tbody>
</table>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
@endsection