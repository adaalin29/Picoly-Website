<!DOCTYPE html>
<html>

<head>
  <base href="{{ URL::to('/') }}" />
  <title>Picoly</title>
  <meta charset="utf-8" />
  <meta name="description" content="@yield('description')" />
  <meta name="keywords" content="@yield('keywords')" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/swiper.min.css" rel="stylesheet" type="text/css" />
  <link href="css/aos.css" rel="stylesheet" type="text/css" />
  <link href="css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="css/fancybox.min.css" rel="stylesheet" type="text/css" />
  @stack('styles')
</head>

<body>
  
  <div id="page">
    <div class = "sidenav-mobile">
      <div class = "container">
        <div class = "sidenav-title-container">
          <div class = "close-sidenav"><img src="images/remove-item.svg" class="full-width"></div>
          <div class = "sidenav-title">{{__('site.sidenav-meniu')}}</div>
        </div>
        <div class = "menu-container">
          <a href = "formular-comanda-picoly"  class = "menu-access-clienti">{{__('site.access')}}</a>
          <a href = "tel:+40 766 32 17 53" class = "call">{{__('site.suna-la')}}: <span>+40 766 32 17 53</span></a>
          <div class = "sidenav-menu-items">
            <a href = "/" class = "sidenav-menu-item">{{__('site.acasa')}}</a>
            <a href = "tarife" class = "sidenav-menu-item">{{__('site.tarife')}}</a>
            <a href = "functioneaza" class = "sidenav-menu-item">{{__('site.cum')}}</a>
            <a href = "reseller" class = "sidenav-menu-item">Reseller</a>
            <a href = "afiliati" class = "sidenav-menu-item">{{__('site.afiliati')}}</a>
            <a href = "articole" class = "sidenav-menu-item">{{__('site.articole')}}</a>
            <a href = "contact" class = "sidenav-menu-item">Contact</a>
          </div>
          <div class = "select-language-text">{{__('site.selecteaza-limba')}}</div>
          <div class = "select-language-container">
            <a href = "locale/ro" class="language-img"><img src="images/romania.svg" class="full-width"></a>
            <a href = "locale/en" class="language-img"><img src="images/english.svg" class="full-width"></a>
          </div>
          <div class = 'meniu-social'>
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
      </div>
    </div>
    @include('parts.header')
    <div id="wrapper" class="slide-right">
      <main id="content">
        @yield('content')
        <div class = "message-button"><img src = "images/message.svg" class = "full-width"></div>
      </main>
        @include('parts.footer')
    </div>
  </div>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>
    <script src="js/swiper.min.js" type="text/javascript"></script>
    <script src="js/aos.js" type="text/javascript"></script>
    <script src="js/notify.js" type="text/javascript"></script>
    <script src="js/fancybox.min.js" type="text/javascript"></script>
  
  @stack('scripts')
</body>

</html>