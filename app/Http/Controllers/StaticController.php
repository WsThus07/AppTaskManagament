<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function portfolio() {
        return view('portfolio');
    }

    public function contact() {
        return view('contact');
    }

}
