@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">{{__('site.afiliati')}}</div>
    <div class = "subtitle tarife-subtitle">{!! $subtitle !!}</div>
    <div class = "reseller-container">
        
        <div class = "reseller-bullets-container">
          @if($afiliati)
            @foreach($afiliati as $afiliat)
              <div class = "reseller-title">{{$afiliat->title}}</div>
              @if($afiliat->subtitle)
                <div class = "reseller-text">{{$afiliat->subtitle}}</div>
              @endif
              @if($afiliat->bullets)
                @foreach($afiliat->bullets as $bullet)
                  <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">{{$bullet}}</div>
                  </div>
                @endforeach
              @endif
            @endforeach
          @endif
        </div>
        <form action='{{ action("AffiliateController@send_affiliate") }}' method="post" class = "afiliati-form">
          {{ csrf_field() }}
            <div class = "afiliati-title">{{__('site.program-afiliere')}}</div>
            <div class = "afiliati-subtitle">Inscrie-te in programul de afiliere. Completeaza formularul de mai jos pentru a intra in program.</div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.nume')}}</div>
                <input type="text" name="name" placeholder="{{__('site.nume-input')}}">
            </div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.email')}}</div>
                <input type="text" name="email" placeholder="{{__('site.email-input')}}">
            </div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.telefon')}}</div>
                <input type="text" name="phone" placeholder="{{__('site.telefon-input')}}">
            </div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.domeniu')}}</div>
                <div class = "fake-input">
                    <select name = "field" class = "select-domain">
                        <option value="">{{__('site.domeniu-input')}}</option>
                      @foreach($fields as $field)
                        <option value="{{$field->name}}">{{$field->name}}</option>
                      @endforeach
                      </select>
                      <img src = "images/arrow-right.svg">
                </div>
            </div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.promovezi')}}</div>
                <textarea name="promote" placeholder="{{__('site.promovezi-text')}}" class=""></textarea>
            </div>
            <div class = "input-container">
                <div class = "input-text">{{__('site.observatii')}}</div>
                <textarea name="observation" placeholder="{{__('site.observatii-input')}}" class=""></textarea>
            </div>
            <div class = "terms-container">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                    <span></span>
                </label>
                <div class = "terms-text">{{__('site.accept')}} <a href = "terms" class=  "politica-text-contact">{{__('site.termeni')}}</a> {{__('site.programul')}}</div>
            </div>
            <div class = "terms-container">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="privacy" value="checkbox">
                    <span></span>
                </label>
                <div class = "terms-text">{{__('site.cunostinta')}}  <a href = "gdpr" class=  "politica-text-contact">{{__('site.politica')}}</a></div>
            </div>
            <button class = "trimite">{{__('site.trimite')}}</button>
            <div class = "someclass"></div>
        </form>
        
    </div>


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
   var $formContact = $('.afiliati-form');
   $('.trimite').on('click', function (event) {
     event.preventDefault();
     $.ajax({
       method: 'POST',
       url: '{{ action("AffiliateController@send_affiliate") }}',
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