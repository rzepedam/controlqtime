<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\MutualityRequest;
use Controlqtime\Core\Contracts\MutualityRepoInterface;

class MutualityController extends Controller
{
    /**
     * @var MutualityRepoInterface
     */
    protected $mutuality;

    /**
     * MutualityController constructor.
     * @param MutualityRepoInterface $mutuality
     */
    public function __construct(MutualityRepoInterface $mutuality)
    {
        $this->mutuality = $mutuality;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.mutualities.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getMutualities()
    {
        $mutualities = $this->mutuality->all();

        return $mutualities;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.mutualities.create');
    }

    /**
     * @param MutualityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MutualityRequest $request)
    {
	    $mutuality = $this->mutuality->onlyTrashed('name', $request->get('name'));
	
	    if (! $mutuality)
	    {
		    $this->mutuality->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/mutualities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $mutuality = $this->mutuality->find($id);

        return view('maintainers.mutualities.edit', compact('mutuality'));
    }

    /**
     * @param MutualityRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MutualityRequest $request, $id)
    {
        $this->mutuality->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/mutualities'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->mutuality->delete($id);

        return redirect()->route('mutualities.index');
    }
}
