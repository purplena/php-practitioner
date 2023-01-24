<?php

namespace App\Controllers; 

class PagesController
{
     public function home()
     {
          return view('index');

     }

     public function account()
     {
          return view('account');
     }

     public function log()
     {
          return view('log');
     }

     public function about()
     {
          $company = 'Laracast'; 
          return view('about', ['company' => $company]);
     }

     public function contact()
     {
          $telephone = '034464891002';
          return view('contact', ['telephone' => $telephone]);
     }

}