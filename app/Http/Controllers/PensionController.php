<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\PensionRequest;
use Controlqtime\Core\Contracts\PensionRepoInterface;

class PensionController extends Controller
{
    /**
     * @var PensionRepoInterface
     */
    protected $pension;

    /**
     * PensionController constructor.
     * @param PensionRepoInterface $pension
     */
    public function __construct(PensionRepoInterface $pension)
    {
        $this->pension = $pension;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.pensions.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getPensions()
    {
        $pensions = $this->pension->all();

        return $pensions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.pensions.create');
    }

    /**
     * @param PensionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PensionRequest $request)
    {
        $this->pension->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/pensions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $pension = $this->pension->find($id);

        return view('maintainers.pensions.edit', compact('pension'));
    }

    /**
     * @param PensionRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PensionRequest $request, $id)
    {
        $this->pension->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/pensions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->pension->delete($id);

        return redirect()->route('pensions.index');
    }
}
