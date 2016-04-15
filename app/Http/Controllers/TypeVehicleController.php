<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TypeVehicleController extends Controller
{
    public function index()
    {
        return view('maintainers.type-vehicles.index');
    }
}
