@component('mail::message')

Mr. {{ $reviewer }}  
Subject: Request for reviewing the research article manuscript **{{ $ID }}**  
**Title: {{$title}}**  
  
Dear Sir,  
  
The Editorial Board of **South Asian Journal of Agriculture** considers you as one of the eminent
experts in the field relevant to the subject matter in the manuscript. May we request you to kindly
review the mentioned article manuscript available in our online system and provide your opinion in
the prescribed form.
 

Please follow the **‘Instruction to Authors’** while reviewing the manuscript. You are requested to
return the manuscript along with your comments within **10 days.**
  

Your contribution in this regard is highly appreciated and acknowledged.

@include('mails.partials.footer')
@endcomponent