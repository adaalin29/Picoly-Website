@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title functioneaza-title">{!! $functioneazaTitlu !!}</div>
    <div class = "subtitle tarife-subtitle">{!! $functioneazaDescriere !!}</div>
    <div class = "functioneaza-pasi">
        <div class = "functioneaza-pas-container">
            <div class = "functioneaza-pas-linie"></div>
            <div class = "functioneaza-pas-left">
                <div class = "functioneaza-left-numar">1</div>
                <div class = "functioneaza-pas-inside-right">
                    <div class = "functioneaza-title">{!! $functioneazaTitlu1 !!}</div>
                    <div class = "functioneaza-text">{!! $functioneazaDescriere1 !!}</div>
                </div>
            </div>
            <div class = "functioneaza-pas-right">
                <div class = "functioneaza-pas-image"><img src = "{{ thumb('width:300', $functioneazaImagine1) }}" class = "full-width-cover"></div>
                <div class = "functioneaza-telefon"><img src = "images/telefon1.svg" class = "full-width"></div>
            </div>
        </div>
        <div class = "functioneaza-pas-container">
            <div class = "functioneaza-pas-linie"></div>
            <div class = "functioneaza-pas-left">
                <div class = "functioneaza-left-numar">2</div>
                <div class = "functioneaza-pas-inside-right">
                    <div class = "functioneaza-title">{!! $functioneazaTitlu2 !!}</div>
                    <div class = "functioneaza-text">{!! $functioneazaDescriere2 !!}</div>
                </div>
            </div>
            <div class = "functioneaza-pas-right">
                <div class = "functioneaza-pas-image"><img src = "{{ thumb('width:300', $functioneazaImagine2) }}" class = "full-width-cover"></div>
                <div class = "functioneaza-telefon"><img src = "images/telefon1.svg" class = "full-width"></div>
            </div>
        </div>
        <div class = "functioneaza-pas-container">
            <div class = "functioneaza-pas-left">
                <div class = "functioneaza-left-numar">3</div>
                <div class = "functioneaza-pas-inside-right">
                    <div class = "functioneaza-title">{!! $functioneazaTitlu3 !!}</div>
                    <div class = "functioneaza-text">{!! $functioneazaDescriere3 !!}</div>
                </div>
            </div>
            <div class = "functioneaza-pas-right">
                <div class = "functioneaza-pas-image"><img src = "{{ thumb('width:300', $functioneazaImagine3) }}" class = "full-width-cover"></div>
                <div class = "functioneaza-telefon"><img src = "images/telefon1.svg" class = "full-width"></div>
            </div>
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
@endsection