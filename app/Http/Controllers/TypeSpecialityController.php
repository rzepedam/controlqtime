<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeSpecialityRequest;


class TypeSpecialityController extends Controller
{
    protected $type_speciality;

    public function __construct(BaseRepoInterface $type_speciality)
    {
        $this->type_speciality = $type_speciality;
    }

    public function index()
    {
        $type_specialities = $this->type_speciality->all();
        return view('maintainers.type-specialities.index', compact('type_specialities'));
    }

    public function create()
    {
        return view('maintainers.type-specialities.create');
    }

    public function store(TypeSpecialityRequest $request)
    {
        $this->type_speciality->create($request->all());
        return redirect()->route('maintainers.type-specialities.index');
    }

    public function edit($id)
    {
        $type_speciality = $this->type_speciality->find($id);
        return view('maintainers.type-specialities.edit', compact('type_speciality'));
    }

    public function update(TypeSpecialityRequest $request, $id)
    {
        $this->type_speciality->update($request->all(), $id);
        return redirect()->route('maintainers.type-specialities.index');
    }

    public function destroy($id)
    {
        $this->type_speciality->delete($id);
        return redirect()->route('maintainers.type-specialities.index');
    }
}
