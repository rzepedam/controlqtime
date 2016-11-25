<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeDisabilityRequest;
use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;

class TypeDisabilityController extends Controller
{
    /**
     * @var TypeDisabilityRepoInterface
     */
    protected $type_disability;

    /**
     * TypeDisabilityController constructor.
     * @param TypeDisabilityRepoInterface $type_disability
     */
    public function __construct(TypeDisabilityRepoInterface $type_disability)
    {
        $this->type_disability = $type_disability;
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeDisabilities()
    {
        $type_disabilities = $this->type_disability->all();

        return $type_disabilities;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-disabilities.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-disabilities.create');
    }

    /**
     * @param TypeDisabilityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeDisabilityRequest $request)
    {
	    $typeDisability = $this->type_disability->onlyTrashed('name', $request->get('name'));
	
	    if (! $typeDisability)
	    {
		    $this->type_disability->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-disabilities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_disability = $this->type_disability->find($id);

        return view('maintainers.type-disabilities.edit', compact('type_disability'));
    }

    /**
     * @param TypeDisabilityRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeDisabilityRequest $request, $id)
    {
        $this->type_disability->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-disabilities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_disability->delete($id);

        return redirect()->route('type-disabilities.index');
    }
}
