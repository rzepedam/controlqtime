<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Disease;

class DiseaseController extends Controller
{
    public function index(Request $request)
    {
        $diseases = Disease::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.diseases.index', compact('diseases'));
    }
}
