@extends('parts.template') @section('content')
    <div class="container">
        <div class="title">{{ __('site.plata-succes') }}</div>
        <div class="subtitle tarife-subtitle" style = "margin-top:20px">{{__('site.bun-venit')}}</div>
        <div class="reseller-container" style="margin-top:40px;">

            <div class="reseller-bullets-container">
                <div class="reseller-title">{{__('site.date-conectare')}}</div>
                <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">Emai: {{$user->email}}</div>
                </div>
                <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">{{__('site.password')}}: {{$user->password}}</div>
                </div>
                <div class="reseller-title">{{__('site.how-connect')}}</div>
                <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">Textul asta este doar pentru a intelege functionalitatea, nici decum nu e versiunea finala:</div>
                </div>
                <div class="description-row-container">
                    <div class="bullet description-bullet"></div>
                    <div class="description-row-text">Cu datele astea te loghezi in picoly.touch-media.ro/admin, de acolo iti vezi restaurantul si ca sa ai acces in dashboard, trebuie sa generezi un waiter</div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
