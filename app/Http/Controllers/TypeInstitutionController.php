<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeInstitutionRequest;
use Controlqtime\Core\Contracts\TypeInstitutionRepoInterface;

class TypeInstitutionController extends Controller
{
    /**
     * @var TypeInstitutionRepoInterface
     */
    protected $type_institution;

    /**
     * TypeInstitutionController constructor.
     * @param TypeInstitutionRepoInterface $type_institution
     */
    public function __construct(TypeInstitutionRepoInterface $type_institution)
    {
        $this->type_institution = $type_institution;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeInstitutions()
    {
        $type_institutions = $this->type_institution->all();

        return $type_institutions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-institutions.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-institutions.create');
    }

    /**
     * @param TypeInstitutionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeInstitutionRequest $request)
    {
        $this->type_institution->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-institutions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_institution = $this->type_institution->find($id);

        return view('maintainers.type-institutions.edit', compact('type_institution'));
    }

    /**
     * @param $id
     * @param TypeInstitutionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, TypeInstitutionRequest $request)
    {
        $this->type_institution->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-institutions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_institution->delete($id);

        return redirect()->route('type-institutions.index');
    }
}
