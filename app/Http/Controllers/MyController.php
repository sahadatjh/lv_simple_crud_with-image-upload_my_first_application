<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function AboutPage(){
    	return view('pages.about');
    }
}
