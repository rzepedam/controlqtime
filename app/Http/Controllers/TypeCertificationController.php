<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeCertificationRequest;

class TypeCertificationController extends Controller
{
    private $type_certification;

    public function __construct(TypeCertificationRepoInterface $type_certification)
    {
        $this->type_certification = $type_certification;
    }

    public function index()
    {
        return view('maintainers.type-certifications.index');
    }

    public function getTypeCertifications() {
        $type_certifications = $this->type_certification->all();
        return $type_certifications;
    }

    public function create()
    {
        return view('maintainers.type-certifications.create');
    }

    public function store(TypeCertificationRequest $request)
    {
        $this->type_certification->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-certifications'
		));
    }

    public function edit($id)
    {
        $type_certification = $this->type_certification->find($id);
        return view('maintainers.type-certifications.edit', compact('type_certification'));
    }

    public function update(TypeCertificationRequest $request, $id)
    {
        $this->type_certification->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-certifications'
		));
    }

    public function destroy($id)
    {
        $this->type_certification->delete($id);
        return redirect()->route('maintainers.type-certifications.index');
    }
}
