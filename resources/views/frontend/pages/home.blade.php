@extends('frontend.master')
@section('content')

<p style="text-align:justify; white-space: pre-line;" id="home-data">
    ...Loading...
</p>

<script>

    $(document).ready(function(){
        getHome(); 
    });

</script>

@endsection