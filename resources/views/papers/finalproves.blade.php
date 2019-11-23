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
                <form method="post" action="{{ route('papers.upload.final.proof', $paper->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="final_galley_proof" class="col-md-4 col-form-label text-md-right">{{ __('Upload Reviewed Galley Proof') }}</label>

                        <div class="col-md-6">
                            <input id="final_galley_proof" type="file" class="form-control @error('final_galley_proof') is-invalid @enderror" name="final_galley_proof" value="{{ old('final_galley_proof') }}" required>

                            @error('final_galley_proof')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <strong class="instruction-msg"></strong>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection