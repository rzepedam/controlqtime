<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\InstitutionRepoInterface;
use Controlqtime\Http\Requests\InstitutionRequest;
use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;

class InstitutionController extends Controller
{
    protected $institution;
    protected $type_institution;

    public function __construct(InstitutionRepoInterface $institution, TypeInstitutionRepoInterface $type_institution)
    {
        $this->institution = $institution;
        $this->type_institution = $type_institution;
    }

    public function index()
    {
        return view('maintainers.institutions.index');
    }

    public function getInstitutions() {
        $institutions = $this->institution->all(['typeInstitution']);
        return $institutions;
    }

    public function create()
    {
        $type_institutions = $this->type_institution->lists('name', 'id');
        return view('maintainers.institutions.create', compact('type_institutions'));
    }

    public function store(InstitutionRequest $request)
    {
        $this->institution->create($request->all());
        return redirect()->route('maintainers.institutions.index');
    }

    public function edit($id)
    {
        $institution = $this->institution->find($id);
        $type_institutions = $this->type_institution->lists('name', 'id');
        return view('maintainers.institutions.edit', compact('institution', 'type_institutions'));
    }

    public function update(InstitutionRequest $request, $id)
    {
        $this->institution->update($request->all(), $id);
        return redirect()->route('maintainers.institutions.index');
    }

    public function destroy($id)
    {
        $this->institution->delete($id);
        return redirect()->route('maintainers.institutions.index');
    }
}
