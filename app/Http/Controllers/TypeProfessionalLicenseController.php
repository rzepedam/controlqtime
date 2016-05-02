<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeProfessionalLicenseRequest;


class TypeProfessionalLicenseController extends Controller
{
    protected $type_professional_license;

    public function __construct(TypeProfessionalLicenseRepoInterface $type_professional_license)
    {
        $this->type_professional_license = $type_professional_license;
    }

    public function index()
    {
        $type_professional_licenses = $this->type_professional_license->all();
        return view('maintainers.type-professional-licenses.index', compact('type_professional_licenses'));
    }

    public function create()
    {
        return view('maintainers.type-professional-licenses.create');
    }

    public function store(TypeProfessionalLicenseRequest $request)
    {
        $this->type_professional_license->create($request->all());
        return redirect()->route('maintainers.type-professional-licenses.index');
    }

    public function edit($id)
    {
        $type_professional_license = $this->type_professional_license->find($id);
        return view('maintainers.type-professional-licenses.edit', compact('type_professional_license'));
    }

    public function update(TypeProfessionalLicenseRequest $request, $id)
    {
        $this->type_professional_license->update($request->all(), $id);
        return redirect()->route('maintainers.type-professional-licenses.index');
    }

    public function destroy($id)
    {
        $this->type_professional_license->delete($id);
        return redirect()->route('maintainers.type-professional-licenses.index');
    }
}
