<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\PositionRequest;
use Controlqtime\Core\Contracts\PositionRepoInterface;

class PositionController extends Controller
{
    /**
     * @var PositionRepoInterface
     */
    protected $position;

    /**
     * PositionController constructor.
     * @param PositionRepoInterface $position
     */
    public function __construct(PositionRepoInterface $position)
    {
        $this->position = $position;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.positions.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getPositions()
    {
        $positions = $this->position->all();

        return $positions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.positions.create');
    }

    /**
     * @param PositionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PositionRequest $request)
    {
	    $position = $this->position->onlyTrashed('name', $request->get('name'));
	
	    if (! $position)
	    {
		    $this->position->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/positions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $position = $this->position->find($id);

        return view('maintainers.positions.edit', compact('position'));
    }

    /**
     * @param PositionRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PositionRequest $request, $id)
    {
        $this->position->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/positions'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->position->delete($id);

        return redirect()->route('positions.index');
    }
}
