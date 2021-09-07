@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title tarife-title">{{__('site.articole')}}</div>
    <div class = "articole-container">
      @if($articole)
        @foreach($articole as $articol)
        <div class = "noutati-item articol-noutati-item">
            <div class = "noutati-numar">{{$articol->shortData}}</div>
            <div class = "noutati-title">{{$articol->title}}</div>
            <div class = "noutati-descriere">{!!Str::limit($articol->description,240,'...')!!}</div>
            <div class = "nouati-imagine articol-nautati-imagine"><img src = "{{ thumb('width:300', $articol->image) }} " class = "full-width-cover"></div>
            <div class = "news-informatii articol-news-informatii">
                <div class = "news-informatii-data">{{$articol->longData}}</div>
                <a class = "news-informatii-link" href = "articol/{{$articol->slug}}">{{__('site.vezi-multe')}}</a>
            </div>
            <div class = "nouati-imagine articol-nautati-imagine noutati-imagine-mobile"><img src = "{{ thumb('width:300', $articol->image) }} " class = "full-width-cover"></div>
        </div>
        @endforeach
      @endif
    </div>
<!--     <a class="mobile comanda-btn pachete-item-comanda-btn buton-centru">{{__('site.incarca')}}</a> -->
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.pricing-switch').click(function(){
            if ($(this).is(":checked")){
                console.log('da');
            }else{
                console.log('nu');
            }
        })
    })
</script>
@endpush