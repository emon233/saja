@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>{{ $type }}</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="table table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Manuscript</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($forwards as $forward)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $forward->paper->title }}</td>
                        <td>
                            <a href="{{ Storage::url($forward->paper->manuscript) }}" target="_blank">{{ __('Download') }}</a>
                        </td>
                        <td>{{ $forward->status }}</td>
                        <td>
                            <a href="{{ route('forwards.show', $forward->id) }}" class="info"><i class="fa fa-info-circle"></i></a>
                            &nbsp;
                            @if($forward->status == config('appConstants.forwards.accepted'))
                            <a href="{{ route('forwards.upload', $forward->id) }}" class="upload"><i class="fa fa-upload"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection