<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\EngineCubicRequest;
use Controlqtime\Core\Contracts\EngineCubicRepoInterface;

class EngineCubicController extends Controller
{
    /**
     * @var EngineCubicRepoInterface
     */
    protected $engine_cubic;

    /**
     * EngineCubicController constructor.
     * @param EngineCubicRepoInterface $engine_cubic
     */
    public function __construct(EngineCubicRepoInterface $engine_cubic)
    {
        $this->engine_cubic = $engine_cubic;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.measuring-units.engine-cubics.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getEngineCubics()
    {
        $engine_cubics = $this->engine_cubic->all();

        return $engine_cubics;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.measuring-units.engine-cubics.create');
    }

    /**
     * @param EngineCubicRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EngineCubicRequest $request)
    {
        $this->engine_cubic->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/measuring-units/engine-cubics'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $engine_cubic = $this->engine_cubic->find($id);

        return view('maintainers.measuring-units.engine-cubics.edit', compact('engine_cubic'));
    }

    /**
     * @param EngineCubicRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EngineCubicRequest $request, $id)
    {
        $this->engine_cubic->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/measuring-units/engine-cubics'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->engine_cubic->delete($id);

        return redirect()->route('engine-cubics.index');
    }
}
