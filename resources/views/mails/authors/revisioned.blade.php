@component('mail::message')

Dear Author **{{ $author }}**  
  
Thank you very much for submitting the **revised** article entitled **“{{ $title }}”** to the **South Asian
Journal of Agriculture (SAJA)**. Your submitted revised manuscript will undergo editorial process soon. You’ll
be able to track your article after logging in the main menu as author.  
  
Thank you very much for being with us.
  
@include('mails.partials.footer')
@endcomponent