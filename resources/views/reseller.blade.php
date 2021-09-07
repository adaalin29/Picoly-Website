@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">Reseller</div>
    <div class = "subtitle tarife-subtitle">{!! $subtitle !!}</div>
    <div class = "reseller-container">
        <div class = "reseller-bullets-container">
          @if($resellers)
            @foreach($resellers as $reseller)
              <div class = "reseller-title">{{$reseller->title}}</div>
              @if($reseller->subtitle)
                <div class = "reseller-text">{{$reseller->subtitle}}</div>
              @endif
              @if($reseller->bullets)
                @foreach($reseller->bullets as $bullet)
                  <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">{{$bullet}}</div>
                  </div>
                @endforeach
              @endif
            @endforeach
          @endif
        </div>
        <a href = "contact" class = "comanda-btn pachete-item-comanda-btn comanda-btn-red buton-centru">{{__('site.contacteaza-ne')}}</a>
        
    </div>


</div>
@endsection