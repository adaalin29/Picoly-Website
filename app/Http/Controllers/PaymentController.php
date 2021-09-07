<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\Rate;
use Validator;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function checkout(Request $request){  

        $form_data = $request->only(['name','phone','email','terms','package_id','type']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'phone'   => ['required','min:10'],
            'email'   => ['required','email'],
            'terms'   => ['required'],
            'package_id'   => ['required'],
            'type'   => ['required'],
        ];
      
        $validationMessages = [
            'name.min'   => __('site.input-name-min'),
            'name.required'    =>  __('site.input-name'),
            'email.email'    => __('site.input-email-min'),
            'email.required'    => __('site.input-email'),
            'phone.min'   => __('site.input-phone-min'),
            'phone.required'    => __('site.input-phone'),
            'terms.required'    => __('site.input-terms'),
        ];
        $validator = Validator::make($form_data, $validationRules, $validationMessages);
        if ($validator->fails())
            return ['success' => false, 'error' => $validator->errors()->all()];  
        else{
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            if($request->type =="monthly"){

                $order->total = Rate::select('month','year')->where('id',$request->package_id)->firstOrFail()->month;
                $exp_date = Carbon::now()->addMonth()->format('Y-m-d');
                $order->type = $request->type;

            }elseif($request->type =="yearly"){
                $order->total = Rate::select('month','year')->where('id',$request->package_id)->firstOrFail()->year;
                $exp_date = Carbon::now()->addYear()->format('Y-m-d');
                $order->type = $request->type;
            }else{
                $order->total = 0;
                $exp_date = Carbon::now()->addDays(15)->format('Y-m-d');
                $order->type = 'trial';
            } 
            $order->status = "pending";
            $order->package_id = $request->package_id;
            $order->exp_date = $exp_date;
            // dd($order);
            $packageId = null;
            if($order->package_id && $order->package_id == 1){
                if($order->type == "monthly"){
                    $packageId = 'price_1JSzinLA67XcgZCOeMjvaytp';
                }elseif($order->type == "yearly"){
                    $packageId = 'price_1JSzjELA67XcgZCOjcmJCWnS';
                }else{
                    return ['success' => false,'successMessage'=>  'Ups a aparut o eroare la procesarea platii'];
                }
            }elseif($order->package_id && $order->package_id == 2){
                if($order->type == "monthly"){
                    $packageId = 'price_1JSzjwLA67XcgZCO8rPV9Qfj';
                }elseif($order->type == "yearly"){
                    $packageId = 'price_1JSzkGLA67XcgZCOg3yfB6w2';
                }else{
                    return ['success' => false,'successMessage'=>  'Ups a aparut o eroare la procesarea platii'];
                }
            }elseif($order->package_id && $order->package_id == 3){
                if($order->type == "monthly"){
                    $packageId = 'price_1JSzkXLA67XcgZCOOxqbSgUl';
                }elseif($order->type == "yearly"){
                    $packageId = 'price_1JSzkvLA67XcgZCO7NAkDCmZ';
                }else{
                    return ['success' => false,'successMessage'=>  'Ups a aparut o eroare la procesarea platii'];
                }
            }
            else{
                return ['success' => false,'successMessage'=>  'Ups a aparut o eroare la procesarea platii 601'];
            }
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $url = env('APP_URL');
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price' => $packageId,
                    'quantity' => 1,
                ]],
                'payment_method_types' => [
                    'card',
                ],
                'mode' => 'payment',
                'success_url' => $url . '/plata-succes?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $url . '/plata-refuzata?session_id={CHECKOUT_SESSION_ID}',
            ]);
            $order->order_id = $checkout_session->id;
            $order->save();
            return ['success' => true,'successMessage'=>  __('site.plata-redirect'),'url'=>$checkout_session->url];
        }
    }
    public function successPayment(Request $request){
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $sessionData = $stripe->checkout->sessions->retrieve(
            $request->session_id,
            []
        );
        if($sessionData->payment_status && $sessionData->payment_status == "paid"){
            $order = Order::where('order_id',$sessionData->id)->first();
            $order->status = "success";
        }else{
            $order->status = "failed";
        }
        $order->save();
        $user = [
            'name'=>$order->name,
            'email'=>$order->email,
            'phone'=>$order->phone,
            'package'=>Rate::where('id',$order->package_id)->firstOrFail()->name,
            'type'=>$order->type,
            'exp_date'=>$order->exp_date,
            'status'=>$order->status,

        ];
        $response = $this->generateAccount($user);
        $response = json_decode($response);
        if($response->success == true){
            return view('plata-succes',[
                'user'=>$response,
            ]);
        }
        return view('plata-succes',[
            'message'=>'A aparut o eroare la crearea utilizatorului',
        ]); 
    }

    public function declinedPayment(Request $request){

        $order = Order::where('order_id',$request->session_id)->first();
        $order->status = "failed";
        $order->save();

        return view('plata-refuzata');
    }

    public function generateAccount($user){
        if($user && $user['status'] =='success'){
            // dd(JSON_encode($user,true));
            $header = array('token'=>'JiJPyOFV9JHyk6OHruyRr8Y1hh3lTKJN','user'=>JSON_encode($user,true));
            $client = new \GuzzleHttp\Client();
            $request = $client->post('https://picoly.touch-media.ro/api/picoly/create-user',[
                'headers' => $header,
                // 'input'=>[
                //     'data'=>'data',
                // ],
            ]);
            // return 'da';
            return $response = $request->getBody();
            // return ['success'=>true,'user'=>$user];
        }else{
            // return ['success'=>false];
        }
        // return $user;
    }
}
