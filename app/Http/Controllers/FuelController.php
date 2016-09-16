<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\FuelRequest;
use Controlqtime\Core\Contracts\FuelRepoInterface;

class FuelController extends Controller
{
    /**
     * @var FuelRepoInterface
     */
    protected $fuel;

    /**
     * FuelController constructor.
     * @param FuelRepoInterface $fuel
     */
    public function __construct(FuelRepoInterface $fuel)
    {
        $this->fuel = $fuel;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.fuels.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getFuels()
    {
        $fuels = $this->fuel->all();

        return $fuels;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.fuels.create');
    }

    /**
     * @param FuelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FuelRequest $request)
    {
        $this->fuel->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/fuels'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $fuel = $this->fuel->find($id);

        return view('maintainers.fuels.edit', compact('fuel'));
    }

    /**
     * @param FuelRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FuelRequest $request, $id)
    {
        $this->fuel->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/fuels'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->fuel->delete($id);

        return redirect()->route('fuels.index');
    }
}
