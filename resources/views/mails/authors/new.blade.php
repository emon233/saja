@component('mail::message')

Dear Author, **{{ $author }}**  
  
Thank you very much for submitting your article entitled **“{{ $title }}”** to the **South Asian Journal
of Agriculture (SAJA)**. Your manuscript has been assigned with an ID of **“{{ $ID }}”**. Please refer this ID
for future correspondence.  
Your submitted manuscript will undergo review process soon. You’ll be able to track your article after
logging in the main menu as author.  
Once again, thank you very much for choosing our journal for your article publication.  

@include('mails.partials.footer')
@endcomponent