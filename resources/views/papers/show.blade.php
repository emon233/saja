@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>PAPER INFO</h4>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
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
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="form-group row">
                            <label for="manuscript" class="col-md-6 mb-2 col-form-label text-md-right">{{ __('Manuscript') }}</label>

                            <label for="manuscript" class="col-md-6 mb-2 col-form-label text-md-left">
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

            </div>
            @if($paper->status == config('appConstants.status.new') && )
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