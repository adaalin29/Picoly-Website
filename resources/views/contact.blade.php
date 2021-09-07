@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">Contact</div>
</div>
<div class = "index-contact container">
    <div class = "index-contact-stanga">
        <div class = "contact-descriere">{!! $descriere !!}</div>
            <div class = "contact-item-container">
                <div class = 'contact-item-left'><img src = "images/time.svg" class = "full-width"></div>
                <div class = "contact-item-text">{!!strip_tags($program) !!}</div>
            </div>
            <div class = "contact-item-container">
                <div class = 'contact-item-left'><img src = "images/phone.svg" class = "full-width"></div>
                <div class = "contact-item-text">{!!strip_tags($telefon) !!}</div>
            </div>
            <div class = "contact-item-container">
                <div class = 'contact-item-left'><img src = "images/mail-outline.svg" class = "full-width"></div>
                <div class = "contact-item-text">{!!strip_tags($email) !!}</div>
            </div>
            <div class = "contact-item-container">
                <div class = 'contact-item-left'><img src = "images/push-pin.svg" class = "full-width"></div>
                <div class = "contact-item-text">{!!strip_tags($adresa) !!}</div>
            </div>
            <div class = "contact-index-social-container">
                <a href = "{!! strip_tags($facebook) !!}"  class = "contact-index-image">
                    <img src = "images/facebook.svg" class = "full-width icon-default">
                    <img src = "images/facebook-white.svg" class = "full-width icon-white">
                </a>
                <a href = "{!! strip_tags($youtube) !!}"  class = "contact-index-image">
                    <img src = "images/youtube.svg" class = "full-width icon-default">
                    <img src = "images/youtube-white.svg" class = "full-width icon-white">
                </a>
                <a href = "{!! strip_tags($twitter) !!}"  class = "contact-index-image">
                    <img src = "images/twitter.svg" class = "full-width icon-default">
                    <img src = "images/twitter-white.svg" class = "full-width icon-white">
                </a>
                <a href = "{!! strip_tags($instagram) !!}"  class = "contact-index-image">
                    <img src = "images/instagram.svg" class = "full-width icon-default">
                    <img src = "images/instagram-white.svg" class = "full-width icon-white">
                </a>
            </div>
    </div>
    <form  action='{{ action("ContactController@send_message") }}' method="post" class = "index-contact-dreapta">
      {{ csrf_field() }}
        <div class = "contact-form-title">{{__('site.nume')}}</div>
        <input type="text" name="name" placeholder="{{__('site.nume-input')}}">
        <div class = "contact-form-title">{{__('site.email')}}</div>
        <input type="email" name="email" placeholder="{{__('site.email-input')}}">
        <div class = "contact-form-title">{{__('site.telefon')}}</div>
        <input type="number" name="phone" placeholder="{{__('site.telefon-input')}}">
        <div class = "contact-form-title">{{__('site.mesaj')}}</div>
        <textarea name="message" placeholder="{{__('site.mesaj-input')}}"></textarea>
        <div class = "terms-container">
            <label class="checkbox">
                <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                <span></span>
            </label>
            <div class = "terms-text">{{__('site.acord')}} <a href = "" class=  "politica-text-contact">{{__('site.politica')}}.</a></div>
        </div>
        <button class = "trimite-index" type="submit" >{{__('site.trimite')}}</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
   $.ajaxSetup({

     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
     }
   });
   var $formContact = $('.index-contact-dreapta');
   $('.trimite-index').on('click', function (event) {
     event.preventDefault();
     $.ajax({
       method: 'POST',
       url: '{{ action("ContactController@send_message") }}',
       data: $formContact.serializeArray(),
       context: this,
       async: true,
       cache: false,
       dataType: 'json'
     }).done(function (res) {
       console.log(res);
       if (res.success == true) {
         $.notify(res.successMessage, "success");
         setTimeout(function () {
           window.location.reload();
         
         }, 4000);
       } else {
         var eroare = res.error;
       for (var i = 0; i < eroare.length; i++) {
         eroare[i] = eroare[i] + "\n";
       }
         $.notify(res.error, {
           type: "error",
           breakNewLines: true,
           gap:2
         });
       }
     });
     return;
   });

 });
</script>
@endpush