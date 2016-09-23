<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\DegreeRequest;
use Controlqtime\Core\Contracts\DegreeRepoInterface;

class DegreeController extends Controller
{
    /**
     * @var \Controlqtime\Core\Contracts\DegreeRepoInterface
     */
    protected $degree;

    /**
     * DegreeController constructor.
     *
     * @param \Controlqtime\Core\Contracts\DegreeRepoInterface $degree
     */
    public function __construct(DegreeRepoInterface $degree)
    {
        $this->degree = $degree;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.degrees.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getDegrees()
    {
        $degrees = $this->degree->all();

        return $degrees;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.degrees.create');
    }

    /**
     * @param \Controlqtime\Http\Requests\DegreeRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DegreeRequest $request)
    {
        $this->degree->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/degrees'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $degree = $this->degree->find($id);

        return view('maintainers.degrees.edit', compact('degree'));
    }

    /**
     * @param \Controlqtime\Http\Requests\DegreeRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DegreeRequest $request, $id)
    {
        $this->degree->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/degrees'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->degree->delete($id);

        return redirect()->route('degrees.index');
    }

}
