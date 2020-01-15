@component('mail::message')

Dear Author, **{{ $author }}**

We are pleased to inform you that the review of your manuscript **“{{ $title }}”** has been
completed. Please read carefully the reviewers’ comments and make necessary
corrections/modifications as suggested. Please send us your corrected manuscript along with point by
point review response doc/docx file.

@if(!empty($comments))
** Editor's Comments: **  
**{{ $comments }}**
@endif

**Download Reviewed Manuscripts: **
@foreach($manuscripts as $manuscript)
<a href="https://saja.edu.bd/download/{{ $manuscript }}">{{ $manuscript }}</a>
@endforeach

Thank you very much for choosing our journal for your article publication.

@include('mails.partials.footer')
@endcomponent