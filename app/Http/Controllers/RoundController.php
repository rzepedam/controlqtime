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
        Session::flash('success', 'El Recorrido ' . $request->round . ' fue asociado satisfactoriamente al bus con Patente ' . $request->vehicle . '.');

        $response = array(
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);

    }
    
    public function update(Request $request)
    {
        dd($request->all());
    }
}
