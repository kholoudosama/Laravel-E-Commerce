<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //home page
    public function home(){
      return view('client.home');
    }

     //cart page
     public function cart(){
        return view('client.cart');
      }

      //shop page
     public function shop(){
        return view('client.shop');
      }

            //shop checkout

      public function checkout(){
        return view('client.checkout');
      }

            //shop login

      public function login(){
        return view('client.login');
      }

            //shop signup

      public function signup(){
        return view('client.signup');
      }
            //shop signup

      public function createaccount(Request $request){

        $this->validate($request,['email' => 'email|required|unique:clients' ,
                                  'password' => 'required|min:4' ]);
        $client=new Client();
        $client->email=$request->input('email');
        $client->password=bcrypt($request->input('password'));  //hash password
        
        $client->save();

        return back()->with('status' , 'Your account has been created successfully');
      }
      

        //shop signup

        public function accsesaccount(Request $request){

          $this->validate($request,['email' => 'email|required' ,
                                    'password' => 'required' ]);
          $client=Client::where('email' ,$request->input('email'))->first(); //email check
          if($client){
              if(Hash::check($request->input('password'),$client->password)){
                 Session::put('client',$client);
                 return redirect('/shop');
                 //return back()->with('status','Your Email Is ' .Session::get('client')->email);

              }else{
                return back()->with('error','Wrong Password or Email !');

              }

          }else{
            return back()->with('error','You Do not Have account');

          }
      }
      
      public function logout(){
        Session::forget('client');
        return back();
      }

}


