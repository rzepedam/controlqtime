<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeSpecialityRequest;
use Controlqtime\Core\Contracts\TypeSpecialityRepoInterface;

class TypeSpecialityController extends Controller
{
    /**
     * @var TypeSpecialityRepoInterface
     */
    protected $type_speciality;

    /**
     * TypeSpecialityController constructor.
     * @param TypeSpecialityRepoInterface $type_speciality
     */
    public function __construct(TypeSpecialityRepoInterface $type_speciality)
    {
        $this->type_speciality = $type_speciality;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-specialities.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeSpecialities()
    {
        $type_specialities = $this->type_speciality->all();

        return $type_specialities;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-specialities.create');
    }

    /**
     * @param TypeSpecialityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeSpecialityRequest $request)
    {
        $this->type_speciality->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-specialities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_speciality = $this->type_speciality->find($id);

        return view('maintainers.type-specialities.edit', compact('type_speciality'));
    }

    /**
     * @param TypeSpecialityRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeSpecialityRequest $request, $id)
    {
        $this->type_speciality->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-specialities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_speciality->delete($id);

        return redirect()->route('type-specialities.index');
    }
}
