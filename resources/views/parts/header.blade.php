<header id="header" @if(Request::path() !='/') class = "header-pages" @endif>
    <div class="container">
        <div class = "header-container">
            <div class = "sidenav"><img src = "images/sidenav.svg" class = "full-width"></div>
            <a href = "/" class = "header-logo"><img src = "images/logo.svg" class = "full-width" alt = "Picoly"></a>
            <div class = "header-menu-container">
                <a href = "tarife" class = "header-menu-item">{{__('site.tarife')}}</a>
                <a href = "functioneaza" class = "header-menu-item">{{__('site.cum')}}</a>
                <a href = "reseller" class = "header-menu-item">Reseller</a>
                <a href = "afiliati" class = "header-menu-item">{{__('site.afiliati')}}</a>
                <a href = "articole" class = "header-menu-item">{{__('site.articole')}}</a>
                <a href = "contact" class = "header-menu-item">Contact</a>
            </div>
            <div class = "header-menu-right">
                <a href = "formular-comanda-picoly" class = "header-acces-clienti-btn">{{__('site.access')}}</a>
                <div class = "language-container">
                    <div class = "language-img"><img  @if(App::getLocale() =="ro") src = "images/romania.svg" @else src = "images/english.svg"  @endif class = "full-width"></div>
                    <div class = "language-arrow"><img src = "images/arrow.svg" class = "full-width"></div>
                  <div class = "language-container-active">
                    <a href = "locale/ro" class = "language-img"><img src = "images/romania.svg" class = "full-width"></a>
                    <a href = "locale/en" class = "language-img"><img src = "images/english.svg" class = "full-width"></a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</header>