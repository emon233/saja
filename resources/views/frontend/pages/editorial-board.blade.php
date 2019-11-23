@extends('frontend.master')
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-6 mb-4">
        <h6>Advisors</h6>
        <p style="text-align:justify; white-space: pre-line;">{{ $editors['advisors'] }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-6 mb-4">
        <h6>Chief Editor</h6>
        <p style="text-align:justify; white-space: pre-line;">{{ $editors['chief'] }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-6 mb-4">
        <h6>Executive Editor</h6>
        <p style="text-align:justify; white-space: pre-line;">{{ $editors['executive'] }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-6 mb-4">
        <h6>Additional Executive Editor</h6>
        <p style="text-align:justify; white-space: pre-line;">{{ $editors['associate'] }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-6 mb-4">
        <h6>Editors</h6>
        <p style="text-align:justify; white-space: pre-line;">{{ $editors['editors'] }}</p>
    </div>
</div>

@endsection