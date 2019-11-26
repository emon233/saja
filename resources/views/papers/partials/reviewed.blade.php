@if($paper->status != config('appConstants.status.new'))
<hr>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 mb-4">
        <h6 class="text-center">FILES - REVIEWED SUBMISSIONS</h6>
    </div>
</div>
@foreach($paper->forwards as $key=>$forward)
@if($forward->opinion_format != "")
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="form-group row">
            <label for="opinion_format" class="col-md-6 col-form-label text-md-right">{{ __('Opinion Format ').($key+1) }}</label>
            <label for="opinion_format" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$forward->opinion_format) }}" target="_blank">{{ __('Download') }}</a>
            </label>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="form-group row">
            <label for="manuscript" class="col-md-6 col-form-label text-md-right">{{ __('Reviewed Manuscript ').($key+1) }}</label>
            <label for="manuscript" class="col-md-6 col-form-label text-md-left">
                <a href="{{ route('files.download',$forward->manuscript) }}" target="_blank">{{ __('Download') }}</a>
            </label>
        </div>
    </div>
</div>
@endif
@endforeach
@endif