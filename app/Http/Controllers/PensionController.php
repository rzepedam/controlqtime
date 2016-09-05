<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\PensionRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\PensionRequest;

class PensionController extends Controller
{
    protected $pension;

    public function __construct(PensionRepoInterface $pension)
    {
        $this->pension = $pension;
    }

    public function index()
    {
        return view('maintainers.pensions.index');
    }
    
    public function getPensions() {
        $pensions = $this->pension->all();
        return $pensions;
    }

    public function create()
    {
        return view('maintainers.pensions.create');
    }

    public function store(PensionRequest $request)
    {
        $this->pension->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/pensions'
		));
    }

    public function edit($id)
    {
        $pension = $this->pension->find($id);
        return view('maintainers.pensions.edit', compact('pension'));
    }

    public function update(PensionRequest $request, $id)
    {
        $this->pension->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/pensions'
		));
    }

    public function destroy($id)
    {
        $this->pension->delete($id);
        return redirect()->route('maintainers.pensions.index');
    }
}
