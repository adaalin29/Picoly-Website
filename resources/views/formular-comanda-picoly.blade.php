@extends('parts.template') @section('content')
<div class = "container">
    <form>
        <div class = "title tarife-title">{{__('site.comanda')}}</div>
        <div class = "subtitle tarife-subtitle tarife-subtitle-formular">Completează formularul de mai jos si implementează sistemul Picoly în locația ta!</div>
        <div class = "fomrular-title">Pachet Start-Up</div>

        <div class = "fomrular-linie-title">Date personale</div>
        <div class = "formular-container">
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">{{__('site.nume')}}*</div>
                    <input type="text" name="name" placeholder="{{__('site.nume-input')}}" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">{{__('site.prenume')}}*</div>
                    <input type="text" name="name" placeholder="{{__('site.prenume-input')}}" class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">{{__('site.email')}}*</div>
                    <input type="email" name="name" placeholder="{{__('site.email-input')}}" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Telefon*</div>
                    <input type="number" name="name" placeholder="Introdu numarul de telefon" class="">
                </div>
            </div>
        </div>
        <div class = "fomrular-linie-title">Date firma</div>
        <div class = "formular-container">
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Nume firma*</div>
                    <input type="text" name="name" placeholder="Introdu numele firmei" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Cod fiscal*</div>
                    <input type="text" name="name" placeholder="Cod unic de inregistrare" class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Adresa</div>
                    <input type="email" name="name" placeholder="Introdu adresa de facturare" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Nr. Inreg. reg. com*</div>
                    <input type="number" name="name" placeholder="EX: J00/12345/95" class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Localitate*</div>
                    <input type="email" name="name" placeholder="Localitate" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Judet / Sector*</div>
                    <input type="number" name="name" placeholder="Judetul" class="">
                </div>
            </div>
        </div>
        <div class = "fomrular-linie-title">Date firma</div>
        <div class = "forumular-container-inside">
            <div class="terms-container">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                    <span></span>
                </label>
                <div class="terms-text">Imi configurez acum datele locatiei</div>
            </div>
            <div class="terms-container">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                    <span></span>
                </label>
                <div class="terms-text">Imi configurez mai tarziu datele locatiei</div>
            </div>
            <div class="terms-container">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                    <span></span>
                </label>
                <div class="terms-text">Doresc sa imi configurati voi aceste date</div>
            </div>
        </div>
        <div class = "formular-text">Te rugam sa introduci datele necesare pentru configurarea contului tau, pentru a putea accesa si utiliza aplicatie Picoly in locatia ta.</div>
        <div class = "formular-container">
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Numele locatiei*</div>
                    <input type="text" name="name" placeholder="EX: Restaurant Picoly" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Email contabilitate*</div>
                    <input type="email" name="name" placeholder="Adresa de email contabilitate." class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Email Admin / Reviews*</div>
                    <input type="email" name="name" placeholder="Adresa de email." class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Website Locatie / Meniu</div>
                    <input type="text" name="name" placeholder="https://" class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Adresa livrare echipament</div>
                    <input type="email" name="name" placeholder="Adresa de livrare" class="">
                    <div class = "subnota">Adresa la care vom trimite etichetele, suportii, tableta, etc.</div>
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Persoana de contact Livrare / Instalare</div>
                    <input type="number" name="name" placeholder="Nume si prenume" class="">
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Telefon persoana de contact Livrare / Instalare</div>
                    <input type="number" name="name" placeholder="Numar de telefon" class="">
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Numele sefilor de tura</div>
                    <input type="number" name="name" placeholder="Numele (ex: Mihai, Ioana, Andrei )" class="">
                    <div class = "subnota">Introduceti numele fiecarui sef de tura urmat de virgula.</div>
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Sablon personalizat</div>
                    <div class = "forumular-container-inside formular-container-inside-row">
                        <div class="terms-container">
                            <label class="checkbox">
                                <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                                <span></span>
                            </label>
                            <div class="terms-text">Da</div>
                        </div>
                        <div class="terms-container">
                            <label class="checkbox">
                                <input type="checkbox" id="accept-privacy" name="terms" value="checkbox">
                                <span></span>
                            </label>
                            <div class="terms-text">Nu</div>
                        </div>
                    </div>
                    <div class = "subnota">Introduceti numele fiecarui sef de tura urmat de virgula.</div>
                </div>
                <div class = "formular-item">
                    
                </div>
            </div>
            <div class = "formular-item-row">
                <div class = "formular-item">
                    <div class = "formular-item-text">Incarca Logo</div>
                    <div class = "incarca-container">
                        <div class = "upload-input">Upload</div>
                        <div class = "incarca-text">or drag files here.</div>
                    </div>
                    <div class = "subnota">Dacă dorești, poți încărca meniul locației tale, iar clienții îl vor vedea în aplicația Picoly pentru telefon.</div>
                </div>
                <div class = "formular-item">
                    <div class = "formular-item-text">Incarca Logo</div>
                    <div class = "incarca-container">
                        <div class = "upload-input">Upload</div>
                        <div class = "incarca-text">or drag files here.</div>
                    </div>
                    <div class = "subnota">Dacă dorești, poți încărca meniul locației tale, iar clienții îl vor vedea în aplicația Picoly pentru telefon.</div>
                </div>
            </div>
        </div>
        <div class = "fomrular-linie-title">Configurare Categorii Mese</div>
        <div class = "formular-container">
            <div class = "formular-configurare-item">
                <div class = "formular-configurare-item-title-container">
                    <div class = "formular-configurare-item-remove"><img src = "images/remove-item.svg" class = "full-width"></div>
                    <div class = "formular-configurare-item-title">Categorie 1</div>
                </div>

                <div class = "formular-container-inside formular-container-inside-custom">
                    <div class = "formular-item">
                        <div class = "formular-item-text">Ex: Terasa, Interior, Camere, Piscina</div>
                        <input type="number" name="name" placeholder="Numele categoriei notat aici va aparea in inferfata de administrare" class="">
                        <div class = "subnota">Pentru a putea a identifica ușor zona din care vin cererile clienților, împarte locația ta pe categorii.</div>
                    </div>
                    <div class = "formular-item">
                        <div class = "formular-item-text">Numar</div>
                        <input type="number" name="name" placeholder="Ex: 10" class="">
                        <div class = "subnota">Numărul total al Meselor / Camerelor / Șezlongurilor etc. din categoria menționată</div>
                    </div>
                </div>
            </div>
            <div class = "adauga-btn">Adauga Categorie</div>
        </div>
        <div class = "fomrular-linie-title">Produse Opționale</div>
        <div class = "formular-container">
            <div class = "formular-configurare-item">
                <div class = "formular-configurare-item-title-container">
                    <div class = "formular-configurare-item-remove"><img src = "images/remove-item.svg" class = "full-width"></div>
                    <div class = "formular-configurare-item-title">Categorie 1</div>
                </div>

                <div class = "formular-container-inside formular-container-inside-custom">
                    <div class = "formular-item">
                        <div class = "formular-item-text">Stikere & Etichete pentru mese & Tablete</div>
                        <div class="fake-input">
                            <select class="select-domain">
                                <option value="">Selecteaza</option>
                                <option value="">Select 1</option>
                              </select>
                              <img src="images/arrow-right.svg">
                        </div>
                        <div class = "subnota">Alege să îți furnizăm produsele de care ai nevoie din listă!</div>
                    </div>
                    <div class = "formular-item">
                        <div class = "formular-item-text">Cantitate</div>
                        <input type="number" name="name" placeholder="Ex: 10" class="">
                        <div class = "subnota">Numărul total al Meselor / Camerelor / Șezlongurilor etc. din categoria menționată</div>
                    </div>
                    <div class = "formular-item">
                        <div class = "formular-item-text">Total</div>
                        <div class = "formular-pret">0,0 lei</div>
                    </div>
                </div>
            </div>
            <div class = "adauga-btn">Adauga produs</div>
        </div>
        <div class = "formular-container">
            <div class = "formular-configurare-item">
                <div class = "formular-configurare-item-title-container">
                    <div class = "formular-configurare-item-remove"><img src = "images/remove-item.svg" class = "full-width"></div>
                    <div class = "formular-configurare-item-title">Produs 1</div>
                </div>

                <div class = "formular-container-inside formular-container-inside-custom ">
                    <div class = "formular-item">
                        <div class = "formular-item-text">Cupon de reducere</div>
                        <input type="number" name="name" placeholder="Adresa de livrare" class="">
                        <div class = "subnota">Numărul total al Meselor / Camerelor / Șezlongurilor etc. din categoria menționată</div>
                    </div>
                    <div class = "formular-item">
                        <div class = "formular-item-text">Reducere</div>
                        <div class = "formular-pret">0,0 lei</div>
                    </div>
                </div>
                <div class = "formular-container-inside formular-container-inside-custom">
                    <div class = "formular-item observatii-item">
                        <div class = "formular-item-text">Observatii</div>
                        <textarea name="message" placeholder="Mesajul tau" class=""></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class = "fomrular-linie-title formular-linie-sus">Payment</div>
        <div class = "total-container">
            <div class = "total-container-inside">
                <div class = "total-row">
                    <div class = "total-left">Subtotal</div>
                    <div class = "total-right">0,0 lei</div>
                </div>
                <div class = "total-row">
                    <div class = "total-left">TVA</div>
                    <div class = "total-right">----</div>
                </div>
            </div>
            <div class = "total-container-inside total-container-inside-no-border">
                <div class = "total-row">
                    <div class = "total-left total-left-red">TOTAL</div>
                    <div class = "total-right total-left-red">0,0 lei</div>
                </div>
            </div>
        </div>
        <button type = "submit" class = "formular-comanda-button">Trimite</button>
    </form>
</div>
@endsection