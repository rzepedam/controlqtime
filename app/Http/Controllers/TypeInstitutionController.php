<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeInstitutionRequest;

class TypeInstitutionController extends Controller
{
    protected $type_institution;

    public function __construct(TypeInstitutionRepoInterface $type_institution)
    {
        $this->type_institution = $type_institution;
    }

    public function index()
    {
        return view('maintainers.type-institutions.index');
    }

    public function getTypeInstitutions()
    {
        $type_institutions = $this->type_institution->all();
        return $type_institutions;
    }

    public function create()
    {
        return view('maintainers.type-institutions.create');
    }

    public function store(TypeInstitutionRequest $request)
    {
        $this->type_institution->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-institutions'
		));
    }

    public function edit($id)
    {
        $type_institution = $this->type_institution->find($id);
        return view('maintainers.type-institutions.edit', compact('type_institution'));
    }

    public function update($id, TypeInstitutionRequest $request)
    {
        $this->type_institution->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-institutions'
		));
    }

    public function destroy($id)
    {
        $this->type_institution->delete($id);
        return redirect()->route('type-institutions.index');
    }
}
