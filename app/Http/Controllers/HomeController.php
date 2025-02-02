<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $myVar = 'Hello World';

        $contactoInfo = $this->getContactInfo();

        //dd($contactoInfo); //Fazer debug

        return view('home', compact('myVar', 'contactoInfo'));
    }

    private function getContactInfo(){
        $contactoInfo = [
            'nome' => 'Paula', 
            'emial' => 'paula@gmail.com'
        ];

        return $contactoInfo;
    }
}

