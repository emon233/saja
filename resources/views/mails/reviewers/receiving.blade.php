@component('mail::message')

Mr. {{ $reviewer }}  
  
Thank you very much for sending us the reviewed article entitled **“{{ $title }}”** to the
**South Asian Journal of Agriculture (SAJA).** Your great and cordial contribution is highly
appreciated by the entire editorial team of **SAJA**. We expect your cooperation in the future too.
Thank you very much for being with us.
  
@include('mails.partials.footer')
@endcomponent