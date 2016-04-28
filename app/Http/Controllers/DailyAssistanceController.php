<?php

namespace App\Http\Controllers;

use App\DailyAssistance;
use App\Manpower;
use Illuminate\Http\Request;

use App\Http\Requests;

class DailyAssistanceController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function startAssistance(Request $request)
    {
        $manpower = Manpower::find($request->get('manpower_id'));
        $manpower->status = 'unavailable';
        $manpower->save();
        DailyAssistance::create($request->all());

        $response = array(
            'success'   => true,
            'name'      => $manpower->full_name,
            'url'       => '/human-resources/manpowers',
        );

        return response()->json([$response], 200);
    }


    /**
     * @param Request $request
     *
     * @param string $idManpower
     *
     * @param string $idAssistance
     *
     * @return mixed
     */
    public function updateAssistance(Request $request)
    {
        dd($request->all());
        dd($request->all());
        $manpower = Manpower::findOrFail();
        $manpower->status = 'available';
        $manpower->save();
        
        return view('human-resources.daily-assistance.edit', compact('manpower'));
    }

}
