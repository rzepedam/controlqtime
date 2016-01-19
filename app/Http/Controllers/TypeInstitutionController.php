<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TypeInstitution;

class TypeInstitutionController extends Controller
{
    public function index()
    {
        $type_institutions = TypeInstitution::orderBy('name', 'ASC')->paginate(20);
        return view('maintainers.type-institutions.index', compact('type_institutions'));
    }

    public function edit($id)
    {
        $type_institution = TypeInstitution::findOrFail($id);
        return view('maintainers.type-institutions.edit', compact('type_institution'));
    }
}
