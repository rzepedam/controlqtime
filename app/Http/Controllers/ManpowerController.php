<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Manpower;
use App\Gender;
use App\Rating;
use App\Region;
use App\Province;
use App\Commune;

class ManpowerController extends Controller
{
    public function index(Request $request)
    {
        $manpowers = Manpower::name($request->get('table_search'))->orderBy('full_name')->paginate(25);
        return view('human-resources.manpowers.index', compact('manpowers'));
    }

    public function create()
    {
        $genders = Gender::lists('name', 'id');
        $ratings = Rating::lists('name', 'id');
        $regions = Region::lists('name', 'id');
        $provinces = Province::lists('name', 'id');
        $communes = Commune::lists('name', 'id');
        return view('human-resources.manpowers.create', compact('genders', 'ratings', 'regions', 'provinces', 'communes'));
    }

    public function store()
    {

    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
