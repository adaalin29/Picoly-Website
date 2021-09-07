@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">{{__('site.assets')}}</div>
    <div class = "subtitle tarife-subtitle">{!! $descriere !!}</div>
    <div class = "reseller-container">
        <div class = "reseller-title">{!! $titlu1 !!}</div>
        <div class = "reseller-text">{!! $descriere1 !!}</div>
        <div class = "reseller-bullets-container">
            <div class="description-row-container">
                <div class="bullet description-bullet"></div>
                <a href = "" class="description-row-text-link" style = "cursor:pointer;">{{__('site.brosura')}}</a>
            </div>
            <div class="description-row-container">
                <div class="bullet description-bullet"></div>
                <a data-fancybox="video-gallery" data-src = "{!! strip_tags($tutorial) !!}" class="description-row-text-link" style = "cursor:pointer;">{{__('site.tutorial')}}</a>
            </div>
        </div>
        <div class = "tutoriale-container">
          @if($videos)
            @foreach($videos as $video)
              <div class=  "tutorial-container">
                <a class="serve-smart-right tutorial" data-fancybox="video-gallery" data-src="{{$video->video}}">
                    <img src="https://img.youtube.com/vi/{{$video->videoId}}/0.jpg" class="full-width-cover">
                    <div class="play-icon">
                        <img src="images/play-white.svg" class="full-width play-white">
                        <img src="images/play-red.svg" class="full-width play-red">
                    </div>
                </a>
                <div class = "tutorial-text">{{$video->description}}</div>
              </div>
            @endforeach
          @endif
        </div>
        <div class = "reseller-title">{!! $titlu2 !!}</div>
        <div class = "reseller-text">{!! $descriere2 !!}</div>
        <div class = "logos-container">
          @if($banners)
            @foreach($banners as $banner)
              <a data-fancybox="single" href = "{{ thumb('width:2560', $banner->image) }} " class = "logo-item">
                <div class = "logo-image"><img src = "{{ thumb('width:200', $banner->image) }} " class = "full-width"></div>
                <div class = "logo-text">{{$banner->description}}</div>
              </a>
            @endforeach
          @endif
        </div>
    </div>


</div>
@endsection