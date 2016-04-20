<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoundRequest;
use App\Round;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class RoundController extends Controller
{
    public function store(RoundRequest $request)
    {
        Round::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');

        $response = array(
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);

    }
}
