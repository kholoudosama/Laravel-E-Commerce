<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
