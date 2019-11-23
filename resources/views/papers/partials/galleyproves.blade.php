@if($paper->status != config('appConstants.status.new'))
<hr>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 mb-4">
        <h6 class="text-center">FILES - REVISIONED SUBMISSIONS</h6>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="form-group row">
            <label for="galley_proof" class="col-md-6 col-form-label text-md-right">{{ __('Galley Proof') }}</label>

            @if(!empty($paper->galley_proof))
            <label for="galley_proof" class="col-md-6 col-form-label text-md-left">
                <a href="{{ Storage::url($paper->galley_proof) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="form-group row">
            <label for="final_galley_proof" class="col-md-6 col-form-label text-md-right">{{ __('Final Galley Proof') }}</label>
            @if(!empty($paper->final_galley_proof))
            <label for="final_galley_proof" class="col-md-6 col-form-label text-md-left">
                <a href="{{ Storage::url($paper->final_galley_proof) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>
    </div>
</div>
@endif