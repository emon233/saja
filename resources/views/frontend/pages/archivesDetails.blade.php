@extends('frontend.master')
@section('css')
<link rel="icon" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="icon" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<h6>Year: {{$issue->year}}| Vol: {{$issue->volume}}| Issue: {{$issue->issue_no}}</h6>
<br>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Authors</th>
        <th>Pages</th>
        <th>Download</th>
    </thead>
    <tbody>
        @foreach($issue->archives as $details)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{!! $details->title !!}</td>
            <td>{{ $details->authors }}</td>
            <td>{{ $details->pages }}</td>
            <td>
                <a href="{{ route('files.details', base64_encode($details->id)) }}">
                    <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg" x
                        mlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px"
                        viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;"
                        xml:space="preserve"
                        height="15" width="15"
                    >
                        <path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z
                            M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z"/>
                        <path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991
                            c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z"/>
                        <path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z
                            "/>
                    </svg>
                </a>
                &nbsp;
                <a href="{{ route('files.download', $details->file) }}" target="_blank">
                    <svg
                        enable-background="new 0 0 24 24"
                        height="15" viewBox="0 0 24 24" width="15"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="m12 16c-.205 0-.401-.084-.542-.232l-5.25-5.5c-.455-.476-.117-1.268.542-1.268h2.75v-5.75c0-.689.561-1.25 1.25-1.25h2.5c.689 0 1.25.561 1.25 1.25v5.75h2.75c.659 0 .997.792.542 1.268l-5.25 5.5c-.141.148-.337.232-.542.232z"/>
                        <path d="m22.25 22h-20.5c-.965 0-1.75-.785-1.75-1.75v-.5c0-.965.785-1.75 1.75-1.75h20.5c.965 0 1.75.785 1.75 1.75v.5c0 .965-.785 1.75-1.75 1.75z"/>
                    </svg>
                </a>
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
