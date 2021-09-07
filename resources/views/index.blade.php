@extends('parts.template') @section('content')
@if($indexSwiper)
<div class="swiper-container indexBannerSwiper">
    <div class="swiper-wrapper">
      @php $index = 0;@endphp
      @foreach($indexSwiper as $slide)
      @php $index++; @endphp
         <div class="swiper-slide">
        <div class = "header-banner">
            <div class = "header-banner-container container">
                <div class = "header-title">{{__('site.de-ce')}} </div>
                <div class = "header-banner-container-inside">
                    <div class = "header-banner-left">
                        <div class = "header-banner-left-inside">
                            <div class = "number">{{$index}}</div>
                            <div class = "header-banner-title">{!! $slide->title !!}</div>
                            <div class = "header-banner-description">{!! $slide->subtitle !!}</div>
                            <a data-fancybox="video-gallery" data-src = "{!! strip_tags($slide->video) !!}" class = "header-banner-video">
                                <div class = "header-banner-overlay">
                                    <div class = "play-red-img"><img src = "images/play-red.svg" class = "full-width"></div>
                                </div>
                                <img src = "https://img.youtube.com/vi/{{$slide->videoId}}/0.jpg" class = "full-width-cover">
                            </a>
                        </div>
                        
                    </div>
                    <div class = "header-banner-right">
                        <div class = "header-banner-right-inside @if($index ==2) header2 @endif" @if($index ==2) style = "background-image: url('../images/header2.png')" @endif>
                            <div class=  "header-banner-right-text-container">
                              @php $indexSlide = 0;@endphp
                              @foreach($indexSwiper as $slide)
                              @php $indexSlide++;@endphp
                                <div class = "header-banner-right-text-container-inside">
                                    <div class = "header-banner-right-text-container-inside-text">{!! $slide->title !!}</div>
                                    <div class = "header-banner-right-text-container-inside-number">{{$indexSlide}}</div>
                                </div>
                              @endforeach
                                
                            </div>
                      <div class = "exploreaza-container mobile-hidden">
                            <div class = "exploreaza-left"></div>
                            <div class = "exploreaza-right">
                                <div class = "exploreaza-text">{{__('site.exploreaza')}}</div>
                                <div class = "exploreaza-image"><img src = "images/next.svg" class = "full-width"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination desktop-hidden"></div>
  </div>
@endif
  <a class = "descarca-aplicatia-link">{{__('site.descarca-app')}}</a>
<div class = "serve-smart">
    <div class = "container serve-smart-container">
        <div class = "serve-smart-left">
            <div class = "serve-smart-title">{!! $servesteTitlu !!}</div>
            <div class = "serve-smart-subtitle">{!! $servesteSubtitlu !!}</div>
            <div class = "serve-smart-text">{!! $servesteDescriere !!}</div>
            <div class = "serve-buttons-container mobile">
                <a href = "" class = "serve-button" style = "background-color: #E52040;">{{__('site.descarca-app')}}</a>
                <a href = "contact" class = "serve-button" style = "background-color: #009218;">{{__('site.contacteaza-ne')}}</a>
            </div>
        </div>
        <a  data-fancybox="video-gallery" data-src = "{!! strip_tags($servesteVideoclip) !!}" class = "serve-smart-right" href = "">
            <img src= "https://img.youtube.com/vi/{{$servesteVideo}}/0.jpg" class = "full-width-cover">
            <div class = "play-icon">
                <img src = "images/play-white.svg" class = "full-width play-white">
                <img src = "images/play-red.svg" class = "full-width play-red">
            </div>
        </a>
        <div class = "serve-buttons-container only-mobile">
            <a href = "" class = "serve-button" style = "background-color: #E52040;">{{__('site.descarca-app')}}</a>
            <a href = "contact" class = "serve-button" style = "background-color: #009218;">{{__('site.contacteaza-ne')}}</a>
        </div>
    </div>
</div>
<div class = "options background1">
    <div class = "container options-container">
        <div class = "options-title">{!! $optiuniTitlu !!}</div>
        <div class = "options-subtitle">{!! $optiuniSubtitlu !!}</div>
        <div class = "options-left">
          @if($optiuni)
            @foreach($optiuni as $element)
              <div class = "options-element">
                <div class = "options-element-title-container">
                    <div class = "options-element-title-arrow">
                        <svg class = "options-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 20 12.507">
                            <path id="arrow-right" d="M2.507,20l10-10-10-10L0,2.5,7.507,10,0,17.5Z" transform="translate(20) rotate(90)" fill="#2f2f2f" fill-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class = "options-element-title">{{$element->title}}</div>
                </div>
                <div class= "options-element-description-container">
                    <div class = "options-element-description">{{$element->description}}</div>
                    @foreach($element->bullets as $bullet)
                    <div class = "options-bullet-element">
                        <div class = "bullet"></div>
                        <div class = "bullet-text">{{$bullet}}</div>
                    </div>
                    @endforeach
                    <a href = "assets" class = "options-view-more">{{__('site.vezi-multe')}}</a>
                </div>
            </div>
            @endforeach
          @endif
        </div>
    </div>
</div>
<div class = "works">
    <div class = "works-container container">
        <div class = "title works-title">{!! $functioneazaTitlu !!}</div>
            <div class = "works-container-inside">
                <div class = "works-left">
                    <img src = "images/cum-functioneaza.png" class = "full-width mobile-hidden">
                    <img src = "images/cum-functioneaza-mobile.png" class = "full-width desktop-hidden">
                    <a href = "functioneaza" class = "vezi-verde desktop-hidden">{{__('site.vezi-multe')}}</a>
                </div>
                <div class = "works-right">
                    <div class = "works-right-description">{!! $functioneazaDescriere !!}</div>
                  @if($functioneazaBullets)
                    @foreach($functioneazaBullets as $bullet)
                    <div class = "description-row-container">
                        <div class = "bullet"></div>
                        <div class = "description-row-text">{{$bullet}}</div>
                    </div>
                  @endforeach
                @endif
                    <a href = "functioneaza" class = "vezi-verde mobile-hidden">{{__('site.vezi-multe')}}</a>
                </div>
            </div>
    </div>
</div>
<div class = "package">
    <div class = "container package-container">
        <div class = "title title-package">{{__('site.pachete-titlu')}}</div>
        <div class = "packages">
            <div class = "package-item">
                <div class = "package-title">{{__('site.pachet-basic')}}</div>
                <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere1')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere2')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere3')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere4')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere5')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-descriere6')}}</div>
                <div class = "pret-container">
                    <div class = "euro">&euro;</div>
                    <div class = "pret">19</div>
                    <div class = "procent">.95/{{__('site.luna')}}</div>
                </div>
                <a class = "comanda-btn">{{__('site.comanda')}}</a>
            </div>
            <div class = "pachet-centru">
                <div class = "pachet-centru-inside">
                    <div class = "pachet-centru-container">
                            <div class = "recomandarea-noastra"><div class = "recomandarea-noastra-text">{{__('site.pachet-start-recomandare')}}</div></div>
                            <div class = "package-title">{{__('site.pachet-start')}}</div>
                            <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start1')}}</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start2')}}</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start3')}}</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start4')}}</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start5')}}</div>
                            <div class = "pachet-discount-text">{{__('site.basic-start6')}}</div>
                            <div class = "pret-container">
                                <div class = "euro">&euro;</div>
                                <div class = "pret">49</div>
                                <div class = "procent">.95/{{__('site.luna')}}</div>
                            </div>
                            <a class = "comanda-btn">{{__('site.comanda')}}</a>
                    </div>
                </div>
            </div>
            <div class = "package-item">
                <div class = "package-title">{{__('site.pachet-enterprise')}}</div>
                <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise1')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise2')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise3')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise4')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise5')}}</div>
                <div class = "pachet-discount-text">{{__('site.basic-enterprise6')}}</div>
                <div class = "pret-container">
                    <div class = "euro">&euro;</div>
                    <div class = "pret">99</div>
                    <div class = "procent">.95/{{__('site.luna')}}</div>
                </div>
                <a class = "comanda-btn">{{__('site.comanda')}}</a>
            </div>
        </div>
        <div class="swiper-container pacheteSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class = "pachet-centru">
                        <div class = "pachet-centru-inside">
                            <div class = "pachet-centru-container">
                                    <div class = "recomandarea-noastra"><div class = "recomandarea-noastra-text">{{__('site.pachet-start-recomandare')}}</div></div>
                                    <div class = "package-title">{{__('site.pachet-start')}}</div>
                                    <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start1')}}</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start2')}}</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start3')}}</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start4')}}</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start5')}}</div>
                                    <div class = "pachet-discount-text">{{__('site.basic-start6')}}</div>
                                    <div class = "pret-container">
                                        <div class = "euro">&euro;</div>
                                        <div class = "pret">49</div>
                                        <div class = "procent">.95/{{__('site.luna')}}</div>
                                    </div>
                                    <a class = "comanda-btn">{{__('site.comanda')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class = "package-item">
                        <div class = "package-title">{{__('site.pachet-basic')}}</div>
                        <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere1')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere2')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere3')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere4')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere5')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-descriere6')}}</div>
                        <div class = "pret-container">
                            <div class = "euro">&euro;</div>
                            <div class = "pret">19</div>
                            <div class = "procent">.95/{{__('site.luna')}}</div>
                        </div>
                        <a class = "comanda-btn">{{__('site.comanda')}}</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class = "package-item">
                        <div class = "package-title">{{__('site.pachet-enterprise')}}</div>
                        <div class = "pachet-discount">{{__('site.discount-pachete')}}!</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise1')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise2')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise3')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise4')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise5')}}</div>
                        <div class = "pachet-discount-text">{{__('site.basic-enterprise6')}}</div>
                        <div class = "pret-container">
                            <div class = "euro">&euro;</div>
                            <div class = "pret">99</div>
                            <div class = "procent">.95/{{__('site.luna')}}</div>
                        </div>
                        <a class = "comanda-btn">{{__('site.comanda')}}</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination package-pagination"></div>
        </div>
        <a href = "tarife" class = "compara">{{__('site.compara')}}</a>
    </div>
</div>
<div class = "container">
    <div class = "title title-choose">{{__('site.de-ce-alegi')}}</div>
    <div class = "choose-picoly">
        <div class = "choose-item">
            {{-- <div class = "choose-img"><img src = "images/clienti.svg" class = "full-width"></div> --}}
            <div class = "choose-title"><div class = "choose-img"><img src = "images/clienti.svg" class = "full-width"></div>{!! $WhyTitlu1 !!}</div>
            <div class = "choose-text">{!! $WhyDescriere1 !!}</div>
        </div>
        <div class = "choose-item">
            {{-- <div class = "choose-img"><img src = "images/personal.svg" class = "full-width"></div> --}}
            <div class = "choose-title"><div class = "choose-img"><img src = "images/personal.svg" class = "full-width"></div>{!! $WhyTitlu2 !!}</div>
            <div class = "choose-text">{!! $WhyDescriere2 !!}</div>
        </div>
        <div class = "choose-item">
            {{-- <div class = "choose-img"><img src = "images/volum.svg" class = "full-width"></div> --}}
            <div class = "choose-title"><div class = "choose-img"><img src = "images/volum.svg" class = "full-width"></div>{!! $WhyTitlu3 !!}</div>
            <div class = "choose-text">{!! $WhyDescriere3 !!}</div>
        </div>
    </div>
</div>
<div class = "aplicatie">
    <div class = "container aplicatie-container">
        <div class = "aplicatie-container-title">{{__('site.ap-picoly')}}</div>
        <div class = 'aplicatie-container-subtitle'>{{__('site.descarca-text')}}</div>
        <a href = "{!! strip_tags($google) !!}" class = "google-img"><img src = "images/google.svg"></a>
        <a href = "{!! strip_tags($apple) !!}" class = "google-img"><img src = "images/apple.svg"></a>
        <a href = "{!! strip_tags($huawei) !!}" class = "google-img"><img src = "images/huawei.svg"></a>
        <div class = "telefon telefon1 " data-aos="fade-up"><img src = "images/telefon1.svg"></div>
        <div class = "telefon telefon2" data-aos="fade-down" data-aos-delay="200"><img src = "images/telefon2.svg"></div>
        <div class = "telefon telefon3" data-aos="fade-up" data-aos-delay="400"><img src = "images/telefon3.svg"></div>

    </div>
</div>
<div class = "container">
    <div class = "questions-container">
        <div class = "title ">{{__('site.intrebari')}}<br>{{__('site.raspuns')}}</div>
        <div class = "subtitle">{!! $intrebari !!}</div>
        <div class = "options-left">
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
        </div>
    </div>
</div>
@if($articole)
<div class = "noutati">
    <div class = "noutati-container">
        <div class = "title ">{{__('site.noutati')}}</div>
        <div class = "noutati-subtitle">{!! $indexNoutatiDescriere !!}</div>

        <div class = "noutati-swioer">
            <div class="swiper-container noutatiSwiper">
                <div class="swiper-wrapper">
                  @foreach($articole as $articol)
                    <div class="swiper-slide">
                        <div class = "noutati-item">
                            <div class = "noutati-numar">{{$articol->shortData}}</div>
                            <div class = "noutati-title">{{$articol->title}}</div>
                            <div class = "noutati-descriere">{!!Str::limit($articol->description,140,'...')!!}</div>
                            <div class = "nouati-imagine"><img src = "{{ thumb('width:300', $articol->image) }}" class = "full-width-cover"></div>
                            <div class = "news-informatii">
                                <div class = "news-informatii-data">{{$articol->longData}}</div>
                                <a class = "news-informatii-link" href = "articol/{{$articol->slug}}">{{__('site.vezi-multe')}}</a>
                            </div>
                            <div class = "nouati-imagine noutati-imagine-mobile"><img src = "{{ thumb('width:300', $articol->image) }}" class = "full-width-cover"></div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
            <div class="swiper-pagination noutati-pagination"></div>
        </div>
    </div>
</div>
@endif
<div class = "index-contact container">
    <div class = "index-contact-stanga">
        <div class = "contact-title">Contact</div>
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
    <form action='{{ action("ContactController@send_message") }}' method="post" class = "index-contact-dreapta">
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
            <div class = "terms-text">{{__('site.acord')}} <a href = "prelucrar" class=  "politica-text-contact">{{__('site.politica')}}</a></div>
        </div>
        <button class = "trimite-index" type="submit">{{__('site.trimite')}}</button>
    </form>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){

         $indexNoutatiSlides = 3.7;
        if(screen.width<=1920){
          $indexNoutatiSlides = 2.7;
        }
        $loop = true;
        if(screen.width<=1520){
            $indexNoutatiSlides = 2.1;
        }
        if(screen.width<=1366){
            $indexNoutatiSlides = 2;
        }
        if(screen.width<=1024){
            $indexNoutatiSlides = 1;
            $loop = false;
        }
        var noutatiSwiper = new Swiper(".noutatiSwiper", {
            slidesPerView: $indexNoutatiSlides,
            spaceBetween: 60,
            freeMode: $loop,
            loop:$loop,
            pagination: {
            el: ".noutati-pagination",
            clickable: true,
            },
        });

        var IndexBanner = new Swiper(".indexBannerSwiper", {
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            pagination: {
              el: ".swiper-pagination",
            },
            autoplay: {
                delay: 1500,
                {{-- disableOnInteraction: false, --}}
              },
          });

          var pacheteSwiper = new Swiper(".pacheteSwiper", {
            slidesPerView: 1,
            spaceBetween: 60,
            pagination: {
            el: ".package-pagination",
            clickable: true,
            },
        });
    })
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