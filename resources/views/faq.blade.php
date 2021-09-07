@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">FAQ</div>
    <div class = "subtitle tarife-subtitle">{!! $descriere !!}</div>
    <div class = "faq-container">
      
      @if($faqs)
        @foreach($faqs as $faq)
           <div class = "options-element">
              <div class = "options-element-title-container">
                  <div class = "options-element-title-arrow">
                      <svg class = "options-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 20 12.507">
                          <path id="arrow-right" d="M2.507,20l10-10-10-10L0,2.5,7.507,10,0,17.5Z" transform="translate(20) rotate(90)" fill="#2f2f2f" fill-rule="evenodd"/>
                      </svg>
                  </div>
                  <div class = "options-element-title">{{$faq->name}}</div>
              </div>
              <div class= "options-element-description-container">
                @if($faq->description)
                  <div class = "options-element-description">{{$faq->description}}</div>
                @endif
                @foreach($faq->bullets as $bullet)
                  <div class = "options-bullet-element">
                      <div class = "bullet"></div>
                      <div class = "bullet-text">{{$bullet}}</div>
                  </div>
                  @endforeach
              </div>
          </div>
        @endforeach
      @endif
      @if($paymentMethods)
        <div class = "faq-title">{{__('site.modalitati-plata')}}</div>
        @foreach($paymentMethods as $paymentMethod)
           <div class = "options-element">
              <div class = "options-element-title-container">
                  <div class = "options-element-title-arrow">
                      <svg class = "options-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 20 12.507">
                          <path id="arrow-right" d="M2.507,20l10-10-10-10L0,2.5,7.507,10,0,17.5Z" transform="translate(20) rotate(90)" fill="#2f2f2f" fill-rule="evenodd"/>
                      </svg>
                  </div>
                  <div class = "options-element-title">{{$paymentMethod->name}}</div>
              </div>
              <div class= "options-element-description-container">
                @if($paymentMethod->description)
                  <div class = "options-element-description">{{$paymentMethod->description}}</div>
                @endif
                @foreach($paymentMethod->bullets as $bullet)
                  <div class = "options-bullet-element">
                      <div class = "bullet"></div>
                      <div class = "bullet-text">{{$bullet}}</div>
                  </div>
                  @endforeach
              </div>
          </div>
        @endforeach
      @endif
        


    </div>
</div>
@endsection