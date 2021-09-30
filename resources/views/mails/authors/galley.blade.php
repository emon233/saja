@component('mail::message')

Dear Author **{{ $author }}**

I am pleased to inform you that your manuscript entitled **“{{ $title }}”** has been approved by the Editorial Board
of the South Asian Journal of Agriculture (SAJA) for publication in the current issue of the Journal.

Editorial office of SAJA has published the Galley Proof of your manuscript which is available here. You
are highly requested to download and **check the proof carefully (line by line, word by word)** for final
corrections and to **submit** the **corrected galley proof** within **3 days. Please carefully check for the
appropriate referencing styles using the attached “Instruction to Authors”.**
**Please annotate your corrections on the proof by highlighting text and adding sticky notes.**

Thank you very much for being with us.

@include('mails.partials.footer')
@endcomponent