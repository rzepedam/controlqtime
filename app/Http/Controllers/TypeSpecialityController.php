<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeSpecialityRequest;


class TypeSpecialityController extends Controller
{
    protected $type_speciality;

    public function __construct(TypeSpecialityRepoInterface $type_speciality)
    {
        $this->type_speciality = $type_speciality;
    }

    public function index()
    {
        return view('maintainers.type-specialities.index');
    }

    public function getTypeSpecialities() {
        $type_specialities = $this->type_speciality->all();
        return $type_specialities;
    }

    public function create()
    {
        return view('maintainers.type-specialities.create');
    }

    public function store(TypeSpecialityRequest $request)
    {
        $this->type_speciality->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-specialities'
		));
    }

    public function edit($id)
    {
        $type_speciality = $this->type_speciality->find($id);
        return view('maintainers.type-specialities.edit', compact('type_speciality'));
    }

    public function update(TypeSpecialityRequest $request, $id)
    {
        $this->type_speciality->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-specialities'
		));
    }

    public function destroy($id)
    {
        $this->type_speciality->delete($id);
        return redirect()->route('type-specialities.index');
    }
}
