<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeDisabilityRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\TypeDisabilityRequest;

class TypeDisabilityController extends Controller
{
    private $type_disability;

    public function __construct(TypeDisabilityRepoInterface $type_disability)
    {
        $this->type_disability = $type_disability;
    }

    public function index()
    {
        return view('maintainers.type-disabilities.index');
    }

    public function getTypeDisabilities() {
        $type_disabilities = $this->type_disability->all();
        return $type_disabilities;
    }

    public function create()
    {
        return view('maintainers.type-disabilities.create');
    }

    public function store(TypeDisabilityRequest $request)
    {
        $this->type_disability->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-disabilities'
		));
    }

    public function edit($id)
    {
        $type_disability = $this->type_disability->find($id);
        return view('maintainers.type-disabilities.edit', compact('type_disability'));
    }

    public function update(TypeDisabilityRequest $request, $id)
    {
        $this->type_disability->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-disabilities'
		));
    }

    public function destroy($id)
    {
        $this->type_disability->delete($id);
        return redirect()->route('maintainers.type-disabilities.index');
    }
}
