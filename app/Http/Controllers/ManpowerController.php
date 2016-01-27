<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Manpower;
use App\Gender;
use App\Rating;
use App\Commune;
use App\Http\Requests\ManpowerStep1Request;

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
        $communes = Commune::lists('name', 'id');
        return view('human-resources.manpowers.create', compact('genders', 'ratings', 'communes'));
    }

    public function step1(ManpowerStep1Request $request)
    {
        $rules = [
            'male_surname'      => 'require|max:30',
            'female_surname'    => 'require|max:30',
            'first_name'        => 'require|max:30',
            'second_name'       => 'max:30',
            'rut'               => 'require|integer|max:12',
            'birthday'          => 'require|date_format:d/m/Y|before:' . $today,
            'gender_id'         => 'require',
            'area_id'           => 'require',
            'rating_id'         => 'require',
            'commune_id'        => 'require',
            'address'           => 'require',
            'email'             => 'require|unique:manpowers,email',
            'phone1'            => 'require|max:20',
            'phone2'            => 'max:20'
        ];
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $manpower = Manpower::findOrFail($id);
        return view('human-resources.manpowers.show', compact('manpower'));
    }
}
