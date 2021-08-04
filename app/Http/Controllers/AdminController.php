<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 //dashboard page
   public function dashboard(){
    return view('admin.dashboard');
  }

  //admin add category
   
               public function orders(){
                return view('admin.orders');
                                }
         
}
