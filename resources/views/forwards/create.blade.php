@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <h4>FORWARD PAPER</h4>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <form method="post" action="{{ route('forwards.store') }}">
                        @csrf
                        <input type="hidden" name="paper" value="{{ $paper->id }}">
                        <div class="form-group row">
                            <label for="reviewer" class="col-md-4 col-form-label text-md-right">{{ __('Select Reviewer') }}</label>

                            <div class="col-md-6">
                                <select id="reviewer" class="form-control @error('reviewer') is-invalid @enderror" name="reviewer" value="{{ old('reviewer') }}" required>
                                    <option value="" disabled selected>(select)</option>
                                    @foreach($reviewers as $reviewer)
                                    <option value="{{ $reviewer->user_id }}">
                                        {{ $reviewer->user->first_name. ' ' .$reviewer->user->middle_name. ' ' .$reviewer->user->last_name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('reviewer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <strong class="instruction-msg"></strong>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="to_date" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" id="to_date" name="to_date" required>

                                @error('to_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <strong class="instruction-msg"></strong>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="SUBMIT">
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
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
                <div class="table table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Reviewer</th>
                            <th>Status</th>
                            <th>Opinion Format</th>
                            <th>Manuscript</th>
                            <th>Comments</th>
                        </thead>
                        <tbody>
                            @foreach($paper->forwards as $forward)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $forward->reviewer->first_name.' '.$forward->reviewer->last_name }}</td>
                                <td>{{ $forward->status }}</td>
                                <td>{{ $forward->opinion_format ?? '' }}</td>
                                <td>{{ $forward->manuscript ?? ''}}</td>
                                <td>{{ $forward->comments ?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection