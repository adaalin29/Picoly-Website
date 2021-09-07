<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('statice') }}'><i class='nav-icon la la-text-height'></i> Texte statice</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('article') }}'><i class='nav-icon la la-copy'></i> Articole</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('project') }}'><i class='nav-icon la la-pen-alt'></i> Proiecte</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i> Assets</a>
    <ul class="nav-dropdown-items">
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('video') }}'><i class='nav-icon la la-video'></i> Pagina Assets - Videoclipuri</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('banner') }}'><i class='nav-icon la la-comment'></i>Pagina Assets Bannere</a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('option') }}'><i class='nav-icon la la-expand'></i> Texte administrabile Optiuni</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('reseller') }}'><i class='nav-icon la la-headphones'></i>Texte administrabile pagina Reselleri</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('affiliate') }}'><i class='nav-icon la la-random'></i>Texte administrabile pagina Affiliates</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('field') }}'><i class='nav-icon la la-sync'></i> Campuri formular affiliate program</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i> Preturi</a>
    <ul class="nav-dropdown-items">
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('rate') }}'><i class='nav-icon la la-globe'></i> Preturi</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('rate-information') }}'><i class='nav-icon la la-question'></i> Informatii tarife tabel</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-phone-volume"></i> Mesaje clienti</a>
  <ul class="nav-dropdown-items">
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('message') }}'><i class='nav-icon la la-envelope-open'></i> Mesaje contact</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('message-affiliate') }}'><i class='nav-icon la la-paper-plane'></i> Message Afiliati</a></li>
  </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('faq') }}'><i class='nav-icon la la-question'></i> Intrebari FAQ</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('payment-method') }}'><i class='nav-icon la la-parachute-box'></i> Texte admininstrabile metode de plata</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('index-swiper') }}'><i class='nav-icon la la-file-image'></i> Bannere index</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i class='nav-icon la la-money-bill'></i> Comenzi</a></li>
