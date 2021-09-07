<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Statice;
use App\Models\Message;
use Validator;
use App\Mail\SendMessage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
      $facebook = Statice::where('key','facebook')->first();
      $youtube = Statice::where('key','youtube')->first();
      $twitter = Statice::where('key','twitter')->first();
      $instagram = Statice::where('key','instagram')->first();
      
      $descriere = Statice::where('key','contact-descriere')->first();
      $program = Statice::where('key','contact-program')->first();
      $telefon = Statice::where('key','contact-telefon')->first();
      $email = Statice::where('key','contact-email')->first();
      $adresa = Statice::where('key','contact-adresa')->first();

      return view('contact',[
        'facebook'=>$facebook->description,
        'youtube'=>$youtube->description,
        'twitter'=>$twitter->description,
        'instagram'=>$instagram->description,
        'descriere'=>$descriere->description,
        'program'=>$program->description,
        'telefon'=>$telefon->description,
        'email'=>$email->description,
        'adresa'=>$adresa->description,
      ]);
    }

    public function send_message(Request $request){
      
//         $email = Statice::where('key','contact-email')->first();
 
        $form_data = $request->only(['name','email', 'message','phone','terms']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'message'   => ['required','min:10'],
            'phone'   => ['required','min:10'],
            'terms'   => ['required'],
          
        ];
      
        $validationMessages = [
            'name.min'   => __('site.input-name-min'),
            'name.required'    => __('site.input-name'),
            'email.email'    => __('site.input-email-min'),
            'phone.min'   => __('site.input-phone-min'),
            'message.min'   => __('site.input-message-min'),
            'email.required'    => __('site.input-email'),
            'message.required'    => __('site.input-message'),
            'phone.required'    => __('site.input-phone'),
            'terms.required'    => __('site.input-terms'),
        ];
        $validator = Validator::make($form_data, $validationRules, $validationMessages);
        if ($validator->fails())
            return ['success' => false, 'error' => $validator->errors()->all()];  
        else{
            $message = new Message();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->message = $request->message;
            $message->save();
            Mail::to('alin@touch-media.ro')->send(new SendMessage($request->all()));
             
            return ['success' => true,'successMessage'=>  'Mesajul a fost trimis cu succes!'];
        }
              
    }
}