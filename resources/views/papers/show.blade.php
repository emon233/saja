@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>PAPER INFO</h4>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            @if(($paper->status == config('appConstants.status.new') || $paper->status == config('appConstants.status.reviewing') ) && Session::get('role') == config('appConstants.roles.editor'))
            <div class="card-header">
                <a href="{{ route('forwards.create', $paper->id) }}" class="btn btn-warning float-right">Forward</a>
            </div>
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <label for="discipline" class="col-md-4 col-form-label text-md-right">{{ __('Discipline') }}</label>

                    <div class="col-md-8">
                        <select id="discipline" class="form-control @error('discipline') is-invalid @enderror" name="discipline" disabled>
                            <option selected disabled>{{ $paper->discipline->name ?? '' }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Article Type') }}</label>

                    <div class="col-md-8">
                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" disabled>
                            <option selected disabled>{{ $paper->type->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $paper->title ?? '' }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="running_title" class="col-md-4 col-form-label text-md-right">{{ __('Running Title') }}</label>

                    <div class="col-md-8">
                        <input id="running_title" type="text" class="form-control" name="running_title" value="{{ $paper->running_title ?? '' }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keywords" class="col-md-4 col-form-label text-md-right">{{ __('Keywords') }}</label>

                    <div class="col-md-8">
                        <input id="keywords" type="text" class="form-control" name="keywords" value="{{ $paper->keywords }}" disabled>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <h6 class="text-center">FILES - INITIAL SUBMISSION</h6>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="form-group row">
                            <label for="manuscript" class="col-md-6 col-form-label text-md-right">{{ __('Manuscript') }}</label>

                            <label for="manuscript" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($paper->manuscript) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="cover_letter" class="col-md-6 col-form-label text-md-right">{{ __('Cover Letter') }}</label>

                            <label for="cover_letter" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($paper->cover_letter) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="processing_fee" class="col-md-6 col-form-label text-md-right">{{ __('Payment Slip 1') }}</label>

                            <label for="processing_fee" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($paper->processing_fee) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="form-group row">
                            <label for="title_page" class="col-md-6 col-form-label text-md-right">{{ __('Title Page') }}</label>

                            <label for="title_page" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($paper->title_page) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="check_list" class="col-md-6 col-form-label text-md-right">{{ __('Check List') }}</label>

                            <label for="check_list" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($paper->check_list) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>
                    </div>
                </div>
                @if($paper->status != config('appConstants.status.new'))
                <hr>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <h6 class="text-center">FILES - REVIEWED SUBMISSIONS</h6>
                    </div>
                </div>
                @foreach($paper->forwards as $forward)
                @if($forward->opinion_format != "")
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="form-group row">
                            <label for="opinion_format" class="col-md-6 col-form-label text-md-right">{{ __('Opinion Format') }}</label>
                            <label for="opinion_format" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($forward->opinion_format) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="form-group row">
                            <label for="manuscript" class="col-md-6 col-form-label text-md-right">{{ __('Reviewed Manuscript') }}</label>
                            <label for="manuscript" class="col-md-6 col-form-label text-md-left">
                                <a href="{{ Storage::url($forward->manuscript) }}" target="_blank">{{ __('Download') }}</a>
                            </label>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
            @if($paper->status == config('appConstants.status.new') && $paper->user_id == auth()->id())
            <div class="card-footer">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 mb-4">
                        <a href="{{ route('papers.edit', $paper->id) }}" class="btn-success form-control text-center"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <form method="post" action="{{ route('papers.destroy', $paper->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="form-control btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection