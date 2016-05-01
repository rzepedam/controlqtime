<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeCertificationRequest;

class TypeCertificationController extends Controller
{
    private $type_certification;

    public function __construct(BaseRepoInterface $type_certification)
    {
        $this->type_certification = $type_certification;
    }

    public function index()
    {
        $type_certifications = $this->type_certification->all();
        return view('maintainers.type-certifications.index', compact('type_certifications'));
    }

    public function create()
    {
        return view('maintainers.type-certifications.create');
    }

    public function store(TypeCertificationRequest $request)
    {
        $this->type_certification->create($request->all());
        return redirect()->route('maintainers.type-certifications.index');
    }

    public function edit($id)
    {
        $type_certification = $this->type_certification->find($id);
        return view('maintainers.type-certifications.edit', compact('type_certification'));
    }

    public function update(TypeCertificationRequest $request, $id)
    {
        $this->type_certification->update($request->all(), $id);
        return redirect()->route('maintainers.type-certifications.index');
    }

    public function destroy($id)
    {
        $this->type_certification->delete($id);
        return redirect()->route('maintainers.type-certifications.index');
    }
}