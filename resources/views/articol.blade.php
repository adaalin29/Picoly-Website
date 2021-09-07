@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">{{__('site.articol')}}</div>
    <div class = "articol-subtitlu">{{$articol->title}}</div>
    <div class = "articol-data">{{$articol->longData}}</div>

    <div class = "articol-container">
        <div class = "articol-imagine"><img src = "{{ thumb('width:300', $articol->image) }}" class = "full-width-cover"></div>
        <div class = "articol-text">{!! $articol->description !!}</div>
    </div>
</div>
@if($alteArticole)
<div class = "noutati noutati-articol noutati-articol-mobile">
    <div class = "noutati-container">
        <div class = "title iti-recomandam-title">{{__('site.iti-recomandam')}}</div>

        <div class = "noutati-swioer">
            <div class="swiper-container noutatiSwiper">
                <div class="swiper-wrapper">
                  @foreach($alteArticole as $articol)
                    <div class="swiper-slide">
                        <div class = "noutati-item">
                            <div class = "noutati-numar">{{$articol->shortData}}</div>
                            <div class = "noutati-title">{{$articol->title}}</div>
                            <div class = "noutati-descriere">{!!Str::limit($articol->description,140,'...')!!}</div>
                            <div class = "nouati-imagine"><img src = "{{ thumb('width:300', $articol->image) }} " class = "full-width-cover"></div>
                            <div class = "news-informatii">
                                <div class = "news-informatii-data">{{$articol->longData}}</div>
                                <a class = "news-informatii-link" href = "articol/{{$articol->slug}}">{{__('site.vezi-multe')}}</a>
                            </div>
                            <div class = "nouati-imagine noutati-imagine-mobile"><img src = "{{ thumb('width:300', $articol->image) }} " class = "full-width-cover"></div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
@endif
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
            el: ".swiper-pagination",
            clickable: true,
            },
        });
    })
</script>
@endpush