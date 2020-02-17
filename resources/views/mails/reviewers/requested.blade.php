@component('mail::message')

Mr. {{ $reviewer }}  
Subject: Request to become a reviewer received.  
  
Dear Sir,  
  
The Editorial Board of **South Asian Journal of Agriculture** received your request to become a reviewer of this
journal. The Editorial Board will contact you soon.
  
Thank You for interest to become a part of the reviewer team.  

@include('mails.partials.footer')
@endcomponent