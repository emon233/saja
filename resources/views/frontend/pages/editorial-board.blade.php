@extends('frontend.master')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <h5>Advisors</h5>
                <ol id="list-advisors"></ol>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <h5>Chief Editor</h5>
                <ol id="list-chief-editor"></ol>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <h5>Executive Editor</h5>
                <ol id="list-exe-editor"></ol>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <h5>Additional Executive Editor</h5>
                <ol id="list-add-exe-editor"></ol>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-6 mb-4">
                <h5>Editors</h5>
                <ol id="list-editors"></ol>
            </div>
        </div>
        <hr>
    </div>
    
    <script>
        $(document).ready(function(){
            getAdvisors();
            getChiefEditor();
            getExecutiveEditor();
            getAdditionalExecutiveEditor();
            getEditors();
        });
    </script>
    
@endsection