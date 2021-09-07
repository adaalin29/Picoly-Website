@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title">{{__('site.caracter')}}</div>
    <div class = "reseller-container">
        <div class = "reseller-text">{!! $text !!}</div>
    </div>
</div>
@endsection