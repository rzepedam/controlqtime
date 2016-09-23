<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeCertificationRequest;
use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;

class TypeCertificationController extends Controller
{
    /**
     * @var TypeCertificationRepoInterface
     */
    protected $type_certification;

    /**
     * TypeCertificationController constructor.
     * @param TypeCertificationRepoInterface $type_certification
     */
    public function __construct(TypeCertificationRepoInterface $type_certification)
    {
        $this->type_certification = $type_certification;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-certifications.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeCertifications()
    {
        $type_certifications = $this->type_certification->all();

        return $type_certifications;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-certifications.create');
    }

    /**
     * @param TypeCertificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeCertificationRequest $request)
    {
        $this->type_certification->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-certifications'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_certification = $this->type_certification->find($id);

        return view('maintainers.type-certifications.edit', compact('type_certification'));
    }

    /**
     * @param TypeCertificationRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeCertificationRequest $request, $id)
    {
        $this->type_certification->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-certifications'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_certification->delete($id);

        return redirect()->route('type-certifications.index');
    }
}
