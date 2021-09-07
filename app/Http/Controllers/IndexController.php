<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Statice;

use App\Models\Article;
use App\Models\Project;
use App\Models\Video;
use App\Models\Banner;
use App\Models\Option;
use App\Models\Reseller;
use App\Models\Affiliate;
use App\Models\Rate;
use App\Models\RateInformation;
use App\Models\Faq;
use App\Models\PaymentMethod;
use App\Models\IndexSwiper;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index() {
      
      $playStore = Statice::where('key','play-link')->first();
      $appStore = Statice::where('key','apple-link')->first();
      $appGallery = Statice::where('key','gallery-link')->first();
      
      $facebook = Statice::where('key','facebook')->first();
      $youtube = Statice::where('key','youtube')->first();
      $twitter = Statice::where('key','twitter')->first();
      $instagram = Statice::where('key','instagram')->first();
      
      $descriere = Statice::where('key','contact-descriere')->first();
      $program = Statice::where('key','contact-program')->first();
      $telefon = Statice::where('key','contact-telefon')->first();
      $email = Statice::where('key','contact-email')->first();
      $adresa = Statice::where('key','contact-adresa')->first();
      
      $intrebari = Statice::where('key','ai-intrebari-descriere')->first();
      
      $servesteTitlu = Statice::where('key','serveste-titlu')->first();
      $servesteSubtitlu = Statice::where('key','serveste-subtitlu')->first();
      $servesteDescriere = Statice::where('key','serveste-descriere')->first();
      $servesteVideoclip = Statice::where('key','serveste-videoclip')->first();
      $videoUrl = parse_url($servesteVideoclip, PHP_URL_QUERY);
      parse_str($videoUrl, $args);
      $servesteVideo = isset($args['v']) ? $args['v'] : false;
      
      $functioneazaTitlu = Statice::where('key','index-functioneaza-titlu')->first();
      $functioneazaDescriere = Statice::where('key','index-functioneaza-descriere')->first();
      $functioneazaBullets = Statice::where('key','index-functioneaza-bullets')->first();
//       dd($functioneazaBullets);
      $functioneazaBulletsFormated = json_decode($functioneazaBullets->custom_field,true);
        $bulletsFormatedArr = [];
          foreach($functioneazaBulletsFormated as $bulletElement){
            $element = $bulletElement['bullet'];
            array_push($bulletsFormatedArr,$element);
          }
       $functioneazaBulletsFormated = $bulletsFormatedArr;
      
      $WhyTitlu1 = Statice::where('key','index-why-title1')->first();
      $WhyTitlu2 = Statice::where('key','index-why-title2')->first();
      $WhyTitlu3 = Statice::where('key','index-why-title3')->first();
      $WhyDescriere1 = Statice::where('key','index-why-description1')->first();
      $WhyDescriere2 = Statice::where('key','index-why-description2')->first();
      $WhyDescriere3 = Statice::where('key','index-why-description3')->first();
      
      $indexNoutatiDescriere = Statice::where('key','index-noutati-descriere')->first();
      
      $optiuniTitlu = Statice::where('key','optiuni-titlu')->first();
      $optiuniSubtitlu = Statice::where('key','optiuni-subtitlu')->first();
      $options = Option::get();
      foreach($options as &$option){
        $option->bullets = json_decode($option->custom_field,true);
        $bulletsFormated = [];
          foreach($option->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            array_push($bulletsFormated,$element);
          }
       $option->bullets = $bulletsFormated;
      }
      
      Carbon::setlocale(\Lang::getLocale());
      $articles = Article::orderBy('date')->get();
      if($articles){
        foreach($articles as &$article){
          $article->shortData = Carbon::parse($article->data)->format('d/m');
          $article->longData = Carbon::parse($article->data)->translatedFormat('j F Y');
        }
      }
      
      $faqs = Faq::where('index_visible',1)->get();
      foreach($faqs as &$faq){
        $faq->bullets = json_decode($faq->custom_field,true);
        $bulletsFormated = [];
          foreach($faq->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            if($bulletElement['bullet']){
              array_push($bulletsFormated,$element);
            }else{
              break;
            }
          }
       $faq->bullets = $bulletsFormated;
      }
      
      $rates = Rate::get();
      $rateInformations = RateInformation::where('index_visible',1)->get();
      foreach($rates as &$rate){
        $rate->month = explode('.', $rate->month);
        $rate->year = explode('.', $rate->year);
      }
      
      $indexSwiper = IndexSwiper::get();
      if($indexSwiper){
        foreach($indexSwiper as &$index){
          $videoUrl = parse_url($index->video, PHP_URL_QUERY);
          parse_str($videoUrl, $args);
          $index->videoId = isset($args['v']) ? $args['v'] : false;
        }
      }
      
      return view('index',[
        'articole'=>$articles,
        'google'=>$playStore->description,
        'apple'=>$appStore->description,
        'huawei'=>$appGallery->description,
        
        'facebook'=>$facebook->description,
        'youtube'=>$youtube->description,
        'twitter'=>$twitter->description,
        'instagram'=>$instagram->description,
        'descriere'=>$descriere->description,
        'program'=>$program->description,
        'telefon'=>$telefon->description,
        'email'=>$email->description,
        'adresa'=>$adresa->description,
        'optiuni'=>$options,
        'optiuniTitlu'=>$optiuniTitlu->description,
        'optiuniSubtitlu'=>$optiuniSubtitlu->description,
        'faqs'=>$faqs,
        'intrebari'=>$intrebari->description,
        'rates'=>$rates,
        'rateInformations'=>$rateInformations,
        'servesteTitlu'=>$servesteTitlu->description,
        'servesteSubtitlu'=>$servesteSubtitlu->description,
        'servesteDescriere'=>$servesteDescriere->description,
        'servesteVideoclip'=>$servesteVideoclip->description,
        'servesteVideo'=>$servesteVideo,
        'functioneazaTitlu'=>$functioneazaTitlu->description,
        'functioneazaDescriere'=>$functioneazaDescriere->description,
        'functioneazaBullets'=>$functioneazaBulletsFormated,
        
        'WhyTitlu1'=>$WhyTitlu1->description,
        'WhyTitlu2'=>$WhyTitlu2->description,
        'WhyTitlu3'=>$WhyTitlu3->description,
        'WhyDescriere1'=>$WhyDescriere1->description,
        'WhyDescriere2'=>$WhyDescriere2->description,
        'WhyDescriere3'=>$WhyDescriere3->description,
        'indexNoutatiDescriere'=>$indexNoutatiDescriere->description,
        'indexSwiper'=>$indexSwiper,
      ]);
    }

    public function tarife() {
      
      $descriere = Statice::where('key','tarife-descriere')->first();
      
      $playStore = Statice::where('key','play-link')->first();
      $appStore = Statice::where('key','apple-link')->first();
      $appGallery = Statice::where('key','gallery-link')->first();
      
      $rates = Rate::get();
      $rateInformations = RateInformation::get();
      foreach($rates as &$rate){
        $rate->month = explode('.', $rate->month);
        $rate->year = explode('.', $rate->year);
      }
      
//       dd($rates->toArray());
      return view('tarife',[
        'google'=>$playStore->description,
        'apple'=>$appStore->description,
        'huawei'=>$appGallery->description,
        'descriere'=>$descriere->description,
        'rates'=>$rates,
        'rateInformations'=>$rateInformations,
      ]);
    }

    public function contact() {
        return view('contact');
    }

    public function reseller() {
      
      $subtitle = Statice::where('key','reseller-description')->first();
      
      $resellers = Reseller::get();
      foreach($resellers as &$reseller){
        $reseller->bullets = json_decode($reseller->custom_fields,true);
        $bulletsFormated = [];
          foreach($reseller->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            if($bulletElement['bullet']){
              array_push($bulletsFormated,$element);
            }else{
              break;
            }
          }
       $reseller->bullets = $bulletsFormated;
      }
      
      return view('reseller', [
        
        'subtitle'=>$subtitle->description,
        'resellers'=>$resellers,
      ]);
    }

    public function afiliati() {
      
      $subtitle = Statice::where('key','faq-description')->first();
      
      $affiliates = Affiliate::get();
      foreach($affiliates as &$affiliate){
        $affiliate->bullets = json_decode($affiliate->custom_fields,true);
        $bulletsFormated = [];
          foreach($affiliate->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            if($bulletElement['bullet']){
              array_push($bulletsFormated,$element);
            }else{
              break;
            }
          }
       $affiliate->bullets = $bulletsFormated;
      }
      return view('afiliati',[
        
        'subtitle'=>$subtitle->description,
        'afiliati'=>$affiliates,
      ]);
    }

    public function faq() {
      
      $descriere = Statice::where('key','faq-descriere')->first();
      
      $faqs = Faq::get();
      foreach($faqs as &$faq){
        $faq->bullets = json_decode($faq->custom_field,true);
        $bulletsFormated = [];
          foreach($faq->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            if($bulletElement['bullet']){
              array_push($bulletsFormated,$element);
            }else{
              break;
            }
          }
       $faq->bullets = $bulletsFormated;
      }
      
      $paymentMethods = PaymentMethod::get();
      foreach($paymentMethods as &$paymentMethod){
        $paymentMethod->bullets = json_decode($paymentMethod->custom_field,true);
        $bulletsFormated = [];
          foreach($paymentMethod->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            if($bulletElement['bullet']){
              array_push($bulletsFormated,$element);
            }else{
              break;
            }
          }
       $paymentMethod->bullets = $bulletsFormated;
      }
      
      return view('faq',[
        'descriere'=>$descriere->description,
        'faqs'=>$faqs,
        'paymentMethods'=>$paymentMethods,
      ]);
    }
    public function proiecte() {
      $proiecte = Project::get();
      $playStore = Statice::where('key','play-link')->first();
      $appStore = Statice::where('key','apple-link')->first();
      $appGallery = Statice::where('key','gallery-link')->first();
      $proiecteDescriere = Statice::where('key','proiecte-descriere')->first();
      
      return view('proiecte',[
        'proiecte'=>$proiecte,
        'google'=>$playStore->description,
        'apple'=>$appStore->description,
        'huawei'=>$appGallery->description,
        'proiecteDescriere'=>$proiecteDescriere->description,
        
      ]);
    }

    public function assets() {
      
      $descriere = Statice::where('key','assets-descriere')->first();
      $titlu1 = Statice::where('key','assets-titlu1')->first();
      $titlu2 = Statice::where('key','assets-titlu2')->first();
      $descriere1 = Statice::where('key','assets-descriere1')->first();
      $descriere2 = Statice::where('key','assets-descriere2')->first();
      $tutorial = Statice::where('key','assets-tutorial')->first();
      
      $videos = Video::get();
      if($videos){
        foreach($videos as $video){
          $videoUrl = parse_url($video->video, PHP_URL_QUERY);
          parse_str($videoUrl, $args);
          $video->videoId = isset($args['v']) ? $args['v'] : false;
        }
      }
      $banners = Banner::get();
      
      return view('assets',[
        'videos'=>$videos,
        'banners'=>$banners,
        'descriere'=>$descriere->description,
        'descriere1'=>$descriere1->description,
        'descriere2'=>$descriere2->description,
        'titlu1'=>$titlu1->description,
        'titlu2'=>$titlu2->description,
        'tutorial'=>$tutorial->description,
      ]);
    }
    public function functioneaza() {
      
      $functioneazaTitlu = Statice::where('key','functioneaza-titlu')->first();
      $functioneazaTitlu1 = Statice::where('key','functioneaza-titlu1')->first();
      $functioneazaTitlu2 = Statice::where('key','functioneaza-titlu2')->first();
      $functioneazaTitlu3 = Statice::where('key','functioneaza-titlu3')->first();
      $functioneazaDescriere = Statice::where('key','functioneaza-subtitlu')->first();
      $functioneazaDescriere1 = Statice::where('key','functioneaza-descriere1')->first();
      $functioneazaDescriere2 = Statice::where('key','functioneaza-descriere2')->first();
      $functioneazaDescriere3 = Statice::where('key','functioneaza-descriere3')->first();
      $functioneazaImagine1 = Statice::where('key','functioneaza-imagine1')->first();
      $functioneazaImagine2 = Statice::where('key','functioneaza-imagine2')->first();
      $functioneazaImagine3 = Statice::where('key','functioneaza-imagine3')->first();
      
      $optiuniTitlu = Statice::where('key','optiuni-titlu')->first();
      $optiuniSubtitlu = Statice::where('key','optiuni-subtitlu')->first();
      $options = Option::get();
      foreach($options as &$option){
        $option->bullets = json_decode($option->custom_field,true);
        $bulletsFormated = [];
          foreach($option->bullets as $bulletElement){
            $element = $bulletElement['bullet'];
            array_push($bulletsFormated,$element);
          }
       $option->bullets = $bulletsFormated;
      }
      
      return view('functioneaza',[
        'optiuni'=>$options,
        'optiuniTitlu'=>$optiuniTitlu->description,
        'optiuniSubtitlu'=>$optiuniSubtitlu->description,
        
        'functioneazaTitlu'=>$functioneazaTitlu->description,
        'functioneazaTitlu1'=>$functioneazaTitlu1->description,
        'functioneazaTitlu2'=>$functioneazaTitlu2->description,
        'functioneazaTitlu3'=>$functioneazaTitlu3->description,
        'functioneazaDescriere'=>$functioneazaDescriere->description,
        'functioneazaDescriere1'=>$functioneazaDescriere1->description,
        'functioneazaDescriere2'=>$functioneazaDescriere2->description,
        'functioneazaDescriere3'=>$functioneazaDescriere3->description,
        'functioneazaImagine1'=>$functioneazaImagine1->image,
        'functioneazaImagine2'=>$functioneazaImagine2->image,
        'functioneazaImagine3'=>$functioneazaImagine3->image,
      ]);
    }
    public function formularComanda() {
        return view('formular-comanda-picoly');
    }

    public function termeni() {
      $text = Statice::where('key','termeni')->first();
      
      return view('termeni',[
        'text'=>$text->description,
      ]);
    }

    public function gdpr() {
      $text = Statice::where('key','gdpr')->first();
      
      return view('gdpr',[
        'text'=>$text->description,
      ]);
    }

    public function cookie() {
      $text = Statice::where('key','cookie')->first();
      
      return view('cookie',[
        'text'=>$text->description,
      ]);
    }

    public function prelucrare() {
      $text = Statice::where('key','caracter')->first();
      
      return view('prelucrare',[
        'text'=>$text->description,
      ]);
    }
}