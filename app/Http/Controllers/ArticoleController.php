<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Statice;

use App\Models\Article;
use Carbon\Carbon;

class ArticoleController extends Controller
{
    public function index() {
      Carbon::setlocale(\Lang::getLocale());
      $articles = Article::orderBy('date')->get();
      if($articles){
        foreach($articles as &$article){
          $article->shortData = Carbon::parse($article->data)->format('d/m');
          $article->longData = Carbon::parse($article->data)->translatedFormat('j F Y');
        }
      }
      return view('articole',[
        'articole'=>$articles,
      ]);
    }
  
   public function articol($url_slug) {
     Carbon::setlocale(\Lang::getLocale());
     
     $articol = Article::where('slug',$url_slug)->first();
     $articol->longData = Carbon::parse($articol->data)->translatedFormat('j F Y');
     
     $otherArtiles = Article::where('slug','!=',$url_slug)->get();
     if($otherArtiles){
       foreach($otherArtiles as &$article){
          $article->shortData = Carbon::parse($article->data)->format('d/m');
          $article->longData = Carbon::parse($article->data)->translatedFormat('j F Y');
        }
     }
//      dd($articol->toArray());
     
     
      return view('articol',[
        'articol'=>$articol,
        'alteArticole'=>$otherArtiles,
      ]);
    }

   
}