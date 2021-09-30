@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-10">
        <h6>USER PROFILE</h6>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="form-group row">
            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name ?? '' }}" disabled>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

            <div class="col-md-6">
                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ $user->middle_name ?? '' }}" disabled>

                @error('middle_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name ?? '' }}" disabled>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email ?? '' }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="affiliation" class="col-md-4 col-form-label text-md-right">{{ __('Affiliation') }}</label>

            <div class="col-md-6">
                <input id="affiliation" type="text" class="form-control @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ $user->affiliation ?? '' }}" disabled>

                @error('affiliation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="specialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

            <div class="col-md-6">
                <textarea id="specialization" name="specialization" class="form-control @error('affiliation') is-invalid @enderror" disabled>{{ $user->specialization ?? '' }}</textarea>

                @error('specialization')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone ?? '' }}" disabled>

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

            <div class="col-md-6">
                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user->mobile ?? '' }}" disabled>

                @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-lg-3">
        @if($user->reviewer == '' || $user->reviewer->status == 0)
        <form method="post" action="{{ route('users.reviewer.make', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="submit" class="btn btn-warning" value="MAKE REVIEWER">
        </form>
        @else
        <form method="post" action="{{ route('users.reviewer.remove', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="submit" class="btn btn-warning" value="REMOVE FROM REVIEWER PANEL">
        </form>
        @endif
    </div>
    <div class="col-lg-3">
        @if($user->editor == '' || $user->editor->status == 0)
        <form method="post" action="{{ route('users.editor.make', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="submit" class="btn btn-danger" value="MAKE EDITOR">
        </form>
        @else
        <form method="post" action="{{ route('users.editor.remove', $user->id) }}">
            @csrf
            @method('PUT')
            <input type="submit" class="btn btn-danger" value="REMOVE FROM EDITOR PANEL">
        </form>
        @endif
    </div>

</div>


@endsection