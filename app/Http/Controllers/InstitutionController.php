<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\InstitutionRequest;
use Controlqtime\Core\Contracts\InstitutionRepoInterface;
use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;

class InstitutionController extends Controller
{
    /**
     * @var InstitutionRepoInterface
     */
    protected $institution;

    /**
     * @var TypeInstitutionRepoInterface
     */
    protected $type_institution;

    /**
     * InstitutionController constructor.
     * @param InstitutionRepoInterface $institution
     * @param TypeInstitutionRepoInterface $type_institution
     */
    public function __construct(InstitutionRepoInterface $institution, TypeInstitutionRepoInterface $type_institution)
    {
        $this->institution      = $institution;
        $this->type_institution = $type_institution;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.institutions.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getInstitutions()
    {
        $institutions = $this->institution->all(['typeInstitution']);

        return $institutions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $type_institutions = $this->type_institution->lists('name', 'id');

        return view('maintainers.institutions.create', compact('type_institutions'));
    }

    /**
     * @param InstitutionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InstitutionRequest $request)
    {
        $this->institution->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/institutions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $institution       = $this->institution->find($id);
        $type_institutions = $this->type_institution->lists('name', 'id');

        return view('maintainers.institutions.edit', compact('institution', 'type_institutions'));
    }

    /**
     * @param InstitutionRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InstitutionRequest $request, $id)
    {
        $this->institution->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/institutions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->institution->delete($id);

        return redirect()->route('institutions.index');
    }
}
