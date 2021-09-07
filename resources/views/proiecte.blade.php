@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">{{__('site.proiecte')}}</div>
    <div class = "subtitle tarife-subtitle">{!! $proiecteDescriere !!}</div>
    <div class = "proiecte-container">
      @if($proiecte)
        @foreach($proiecte as $proiect)
          <a href = "" class = "proiect">
            <div class ="proiect-overlay">
                <img src = "{{ thumb('width:200', $proiect->logo) }}" class = "restaurant-logo">
            </div>
            <img src = "{{ thumb('width:200', $proiect->image) }}" class = "full-width-cover">
          </a>
        @endforeach
      @endif
    </div>
</div>
<div class = "aplicatie aplicatie-tarif">
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
@endsection