<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;

use Controlqtime\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home');
    }
}
