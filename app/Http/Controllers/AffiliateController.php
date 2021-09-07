<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Statice;
use App\Models\MessageAffiliate;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Affiliate;
use App\Models\Field;

class AffiliateController extends Controller
{
     public function afiliati() {
       
       $fields = Field::get();
      
      $subtitle = Statice::where('key','affiliate-description')->first();
      
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
        'fields'=>$fields,
      ]);
    }
  
  public function send_affiliate(Request $request){
      
//         $email = Statice::where('key','contact-email')->first();
 
        $form_data = $request->only(['name','email', 'observation','phone','field','terms','privacy','promote']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'phone'   => ['required','min:10'],
            'terms'   => ['required'],
            'field'   => ['required'],
            'privacy'   => ['required'],
          
        ];
      
        $validationMessages = [
            'name.min'   => __('site.input-name-min'),
            'email.email'    => __('site.input-email-min'),
            'phone.min'   => __('site.input-phone-min'),
            'name.required'    => __('site.input-name'),
            'email.required'    => __('site.input-email'),
            'phone.required'    => __('site.input-phone'),
            'terms.required'    => __('site.input-terms'),
            'privacy.required'    => __('site.input-privacy'),
        ];
        $validator = Validator::make($form_data, $validationRules, $validationMessages);
        if ($validator->fails())
            return ['success' => false, 'error' => $validator->errors()->all()];  
        else{
            $message = new MessageAffiliate();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->field = $request->field;
            $message->promote = $request->promote;
            $message->observation = $request->observation;
            $message->save();
            // Mail::to('alin@touch-media.ro')->send(new SendMessage($request->all()));
            
            return ['success' => true,'successMessage'=>  'Mesajul a fost trimis cu succes!'];
        }
              
    }
}