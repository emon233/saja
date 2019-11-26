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
            <label for="edited_manuscript" class="col-md-6 col-form-label text-md-right">{{ __('Edited Manuscript') }}</label>

            @if(!empty($paper->edited_manuscript))
            <label for="edited_manuscript" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$paper->edited_manuscript) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>

        <div class="form-group row">
            <label for="declaration_letter" class="col-md-6 col-form-label text-md-right">{{ __('Declaration Letter') }}</label>
            @if(!empty($paper->declaration_letter))
            <label for="declaration_letter" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$paper->declaration_letter) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="form-group row">
            <label for="correction" class="col-md-6 col-form-label text-md-right">{{ __('Point by Point Correction') }}</label>

            @if(!empty($paper->correction))
            <label for="correction" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$paper->correction) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>

        <div class="form-group row">
            <label for="payment_slip" class="col-md-6 col-form-label text-md-right">{{ __('Payment Slip') }}</label>
            @if(!empty($paper->payment_slip))
            <label for="payment_slip" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$paper->payment_slip) }}" target="_blank">{{ __('Download') }}</a>
            </label>
            @endif
        </div>
    </div>
</div>
@endif