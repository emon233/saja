@component('mail::message')

Dear Author **{{ $author }}**  
  
The editorial board is pleased with your interest to publish articles in our journal. Unfortunately,
your submitted article titled **{{ $title }}** is not considered for publishing in the upcoming
volume/issue of the South Asian Journal of Agriculture.  
  
**Overall editorial decision: REJECT**  
  
Please consider SAJA to publish your future findings on any of the areas of Agriculture
Thank you very much for being with us.

@include('mails.partials.footer')
@endcomponent