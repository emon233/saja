@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <h5>ISSUES</h5>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="table table-responsive">
            <table class="table table-bordered table-condensed">
                <thead>
                    <th>#</th>
                    <th>Year</th>
                    <th>Volume</th>
                    <th>Issue No</th>
                    <th>Current</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $issue->year }}</td>
                        <td>{{ $issue->volume }}</td>
                        <td>{{ $issue->issue_no }}</td>
                        <td>
                            @if($issue->current == 1) CURRENT @endif
                        </td>
                        <td>
                            <a href="{{ route('issues.edit', $issue->id) }}" class="edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;
                            <a href="{{ route('archives.index', $issue->id) }}" class="info">
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection