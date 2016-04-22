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

        $response = array(
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);

    }
    
    public function update($id)
    {
        $round = Round::findOrFail($id);
        $round->status = 'closed';
        $round->save();

        $response = array(
            'url' => '/operations/route-sheets'
        );

        return response()->json([
            $response
        ], 200);

    }
    
    public function destroy($id)
    {
        $round = Round::findOrFail($id);
        $round->delete();

        $response = array(
            'success' => true
        );

        return response()->json([
            $response
        ], 200);
    }
}
