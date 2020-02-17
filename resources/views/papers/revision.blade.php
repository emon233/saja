@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-8">
        <h5>UPLOAD REVISED MANUSCRIPT</h5>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('papers.upload.revision', $paper->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="declaration_letter" class="col-md-6 col-form-label text-md-right">{{ __('Upload Declaration Letter') }}</label>

                        <div class="col-md-6">
                            <input id="declaration_letter" type="file" class="form-control @error('declaration_letter') is-invalid @enderror" name="declaration_letter" value="{{ old('declaration_letter') }}" required>

                            @error('declaration_letter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 2 MB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correction" class="col-md-6 col-form-label text-md-right">{{ __('Upload Point by Point Correction') }}</label>

                        <div class="col-md-6">
                            <input id="correction" type="file" class="form-control @error('correction') is-invalid @enderror" name="correction" value="{{ old('correction') }}" required>

                            @error('correction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 2 MB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payment_slip" class="col-md-6 col-form-label text-md-right">{{ __('Upload Payment Slip') }}</label>

                        <div class="col-md-6">
                            <input id="payment_slip" type="file" class="form-control @error('payment_slip') is-invalid @enderror" name="payment_slip" value="{{ old('payment_slip') }}" required>

                            @error('payment_slip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .pdf/.jpg/.jpeg file. Max File Size: 5 MB</strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edited_manuscript" class="col-md-6 col-form-label text-md-right">{{ __('Upload Edited Manuscript') }}</label>

                        <div class="col-md-6">
                            <input id="edited_manuscript" type="file" class="form-control @error('edited_manuscript') is-invalid @enderror" name="edited_manuscript" value="{{ old('edited_manuscript') }}" required>

                            @error('edited_manuscript')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg">Must be .doc/.docx file. Max File Size: 5 MB</strong>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection