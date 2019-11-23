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