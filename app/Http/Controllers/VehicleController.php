<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VehicleController extends Controller
{
    public function index()
    {
        return view('maintainers.vehicles.index');
    }
}
