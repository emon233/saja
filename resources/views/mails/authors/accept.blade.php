@component('mail::message')

Dear Author **{{ $author }}**  
  
We are pleased to inform you that the article manuscript **“{{ $title }}”** has been accepted
for publishing in the upcoming issue of the **South Asian Journal of Agriculture (SAJA)**. We’ll soon come
to you with galley-proof.  
Overall editorial decision: **ACCEPTED**

@include('mails.partials.footer')
@endcomponent