@extends('frontend.master')
@section('content')
<h6>IMPORTANT LINKS</h6>
<div class="row">
    <div class="col-lg-8 col-md-8 mb-4 float-left">
        <div class="table table-responsive">
            <table class="table table-bordered table-condensed float-left">
                <tbody>
                    @foreach($links as $link)
                    <tr>
                        <td>{{ $link->title }}</td>
                        <td>
                            <a href="{{ route('files.download', $link->file) }}" target="_blank">{{ __('Download') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection