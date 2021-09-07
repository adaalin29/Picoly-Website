@extends('parts.template') @section('content')
    <div class="container">
        <div class="title tarife-title">{{ __('site.tarife') }}</div>
        <div class="subtitle tarife-subtitle">{!! $descriere !!}</div>
        <div class="pachete-item pachete-item-custom pricing-mobile">
            <div class="pachete-item-titlu-custom">Pricing</div>
            <div class="pachete-item-text-custom">{{ __('site.toate-preturile') }}</div>
            <div class="switch-container">
                <div class="switch-text">{{ __('site.lunar') }}</div>
                <label class="switch">
                    <input class="pricing-switch" type="checkbox">
                    <span class="slider round"></span>
                </label>
                <div class="switch-text">{{ __('site.anual') }}</div>
            </div>
        </div>
        @if ($rates)
            <div class="pachete-contianer">
                <div class="pachete-item pachete-item-custom">
                    <div class="pachete-item-titlu-custom">{{ __('site.pret') }}</div>
                    <div class="pachete-item-text-custom">{{ __('site.toate-preturile') }}</div>
                    <div class="switch-container">
                        <div class="switch-text">{{ __('site.lunar') }}</div>
                        <label class="switch">
                            <input class="pricing-switch" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <div class="switch-text">{{ __('site.anual') }}</div>
                    </div>
                </div>
                @foreach ($rates as $rate)
                    <div class="pachete-item">
                        <div class="pachet-titlu">{{ $rate->name }}</div>
                        <div class="pachet-item-discount">{{ $rate->discount }}</div>
                        <div class="pret-container lunar">
                            <div class="euro">&euro;</div>
                            <div class="pret">{{ $rate->month[0] }}</div>
                            <div class="procent">.{{ $rate->month[1] }}/{{ __('site.luna') }}</div>
                        </div>
                        <div class="pret-container anual">
                            <div class="euro">&euro;</div>
                            <div class="pret">{{ $rate->year[0] }}</div>
                            <div class="procent">.{{ $rate->year[1] }}/{{ __('site.an') }}</div>
                        </div>
                        <a class="comanda-btn pachete-item-comanda-btn" id = {{$rate->id}}>{{ __('site.comanda-acum') }}</a>
                    </div>
                @endforeach
            </div>

            <div class="tarife-table">
                @php $index = 0;@endphp
                @foreach ($rateInformations as $item)
                    @php $index++; @endphp
                    <div class="tarife-table-text-mobile">{{ $item->description }}</div>
                    <div class="tarife-row" @if ($index % 2 == 1) style = "background-color:#F5F5F5 " @endif>
                        <div class="tarife-element tarife-element-text tarife-element tarife-element-text-custom">
                            <div class="tarife-element-text">{{ $item->description }}</div>
                        </div>
                        <div class="tarife-element">
                            @if (strtolower($item->field_1) == 'yes')
                                <div class="tarife-check"><img src="images/check.svg" class="full-width"></div>
                            @elseif(strtolower($item->field_1) =='no')
                                <div class="tarife-check"><img src="images/remove.svg" class="full-width"></div>
                            @else
                                <div class="tarife-element-text-center">{{ $item->field_1 }}</div>
                            @endif
                        </div>
                        <div class="tarife-element">
                            @if (strtolower($item->field_2) == 'yes')
                                <div class="tarife-check"><img src="images/check.svg" class="full-width"></div>
                            @elseif(strtolower($item->field_2) =='no')
                                <div class="tarife-check"><img src="images/remove.svg" class="full-width"></div>
                            @else
                                <div class="tarife-element-text-center">{{ $item->field_2 }}</div>
                            @endif
                        </div>

                        <div class="tarife-element">
                            @if (strtolower($item->field_3) == 'yes')
                                <div class="tarife-check"><img src="images/check.svg" class="full-width"></div>
                            @elseif(strtolower($item->field_3) =='no')
                                <div class="tarife-check"><img src="images/remove.svg" class="full-width"></div>
                            @else
                                <div class="tarife-element-text-center">{{ $item->field_3 }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <form class="do_order" action='{{ action("PaymentController@checkout") }}' method="post">
          {{ csrf_field() }}
            <div class="fomrular-linie-title">Introdu datele personale:</div>
            <div class="formular-container">
                <div class="formular-item-row">
                    <div class="formular-item">
                        <div class="formular-item-text">{{ __('site.nume') }}*</div>
                        <input type="text" name="name" placeholder="{{ __('site.nume-input') }}" class="">
                        <input type="hidden" name="package_id">
                        <input type="hidden" name="type">
                    </div>
                    <div class="formular-item">
                        <div class="formular-item-text">{{ __('site.telefon') }}*</div>
                        <input type="number" name="phone" placeholder="{{ __('site.telefon-input') }}" class="">
                    </div>
                </div>
                <div class="formular-item-row">
                    <div class="formular-item">
                        <div class="formular-item-text">Email*</div>
                        <input type="text" name="email" placeholder="{{ __('site.email-input') }}" class="">
                    </div>
                    {{-- <div class="formular-item">
                        <div class="formular-item-text">Telefon*</div>
                        <input type="number" name="name" placeholder="Introdu numarul de telefon" class="">
                    </div> --}}
                </div>
                <div class="formular-item-row">
                    <div class="terms-container">
                        <label class="checkbox">
                            <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                            <span></span>
                        </label>
                        <div class="terms-text">I agree with <a href="" class="politica-text-contact">data privacy
                                policy.</a></div>
                    </div>
                </div>
                <div class="formular-item-row">
                    <div class="total-row">
                        <div class="total-left total-left-red">TOTAL</div>
                        <div class="total-right total-left-red">0,0 lei</div>
                    </div>
                </div>


                <button class="trimite" type="submit">{{ __('site.plateste') }}</button>
            </div>
        </form>
    </div>
    <div class="aplicatie aplicatie-tarif">
        <div class="container aplicatie-container">
            <div class="aplicatie-container-title">{{ __('site.ap-picoly') }}</div>
            <div class='aplicatie-container-subtitle'>{{ __('site.descarca-text') }}</div>
            <a href="{!! strip_tags($google) !!}" class="google-img"><img src="images/google.svg"></a>
            <a href="{!! strip_tags($apple) !!}" class="google-img"><img src="images/apple.svg"></a>
            <a href="{!! strip_tags($huawei) !!}" class="google-img"><img src="images/huawei.svg"></a>
            <div class="telefon telefon1 " data-aos="fade-up"><img src="images/telefon1.svg"></div>
            <div class="telefon telefon2" data-aos="fade-down" data-aos-delay="200"><img src="images/telefon2.svg"></div>
            <div class="telefon telefon3" data-aos="fade-up" data-aos-delay="400"><img src="images/telefon3.svg"></div>

        </div>
    </div>
@endsection
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
 $.ajaxSetup({

   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
   }
 });
 var $formContact = $('.do_order');
 $('.trimite').on('click', function (event) {
   event.preventDefault();
   $.ajax({
     method: 'POST',
     url: '{{ action("PaymentController@checkout") }}',
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
         window.location.replace(res.url);
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
    <script>
        $(document).ready(function() {
            $('.pricing-switch').click(function() {
                if ($(this).is(":checked")) {
                    $('.lunar').hide().fadeOut();
                    $('.anual').show().fadeIn().css('display', 'flex');
                } else {
                    $('.lunar').show().fadeIn();
                    $('.anual').hide().fadeOut()
                }
            })

            $('.pachete-item-comanda-btn').click(function() {
                $('.do_order').css('height', '700px');
                $('html, body').animate({
                    scrollTop: $(".do_order").offset().top
                }, 2000);
                if ($('.pricing-switch').is(":checked")) {
                    $integer = parseInt($(this).parent().find('.anual').find('.pret').html());
                    $decimals = parseFloat($(this).parent().find('.anual').find('.procent').html().slice(1,
                        3)) / 100;
                        $("[name='type']").val('yearly');
                } else {
                    $integer = parseInt($(this).parent().find('.lunar').find('.pret').html());
                    $decimals = parseFloat($(this).parent().find('.lunar').find('.procent').html().slice(1,
                        3)) / 100;
                        $("[name='type']").val('monthly');
                }
                $total = $integer + $decimals;
                $('.total-right').html($total + ' €');
                $("[name='package_id']").val($(this).attr('id'));
            })
        })
    </script>
@endpush
