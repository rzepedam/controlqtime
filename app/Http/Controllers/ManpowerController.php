<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Manpower;

class ManpowerController extends Controller
{
    public function index(Request $request)
    {
        $manpowers = Manpower::name($request->get('table_search'))->orderBy('name')->paginate(50);
        return view('human-resources.manpowers.index', compact('manpowers'));
    }

    public function create()
    {

    }
}
