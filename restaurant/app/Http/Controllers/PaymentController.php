<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\User;


class PaymentController extends Controller
{
    //
    public function index(Request $request){
        return view("payment.page");
    }
    public function callback(){

        $response = json_decode($this->verify_payment(request('reference')));
        if($response){
            if($response->status){
                $data = $response->data;
                return view('payment.callback', compact('data'));
            }
            else{
                return back()->withError($response->message);
            }
            
        }
        else{
            return back()->withError("Something went wrong");
        }
        
    }
    // public function get_total(){
    //     $total = 0; 
    //     array(session('cart')-> $id => $details);
    //     $total += $details['price'] * $details['quantity'];
    // }
    
                      
    public function make_payment(Request $request){
        $formdata = [
            'email' => Auth::user()->emailAddress,
            'name' => Auth::user()->fullname,
            'number' => request('number'),
            'amount' => $cart['total'] * 100 + 500,
            'currency' => "NGN",
            'callback_url' => route('payment.callback')
        ];
        $pay = json_decode($this->initiate_payment($formdata));
        if($pay){
            if($pay->status){
                return redirect($pay->data->authorization_url);
            }
            else{
                return back()->withError($pay->message);
            }
            
        }
        else{
            return back()->withError("Something went wrong");
        }
        
    }
    public function initiate_payment($formdata){
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formdata);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ". "sk_test_45dbbc56878007fccb391a3e4c9558f0d84d9611",
            "Cache-Control: no-cache"
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
    public function verify_payment($reference){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10, 
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ". "sk_test_45dbbc56878007fccb391a3e4c9558f0d84d9611",
                "Cache-Control: no-cache"
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    // public function register(Request $request){
    //     return view("payment.registration");
    // }
    // public function create(Request $request){
    //     $form_data = $request->validate([
    //         'email' => 'required|email',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'phone' => 'required',
    //         'password' => 'required|min=6|confirmed',
    //         'password_confirmation' => 'required'
    //     ]);
    //     $guest = new User();


        
    // }
}
