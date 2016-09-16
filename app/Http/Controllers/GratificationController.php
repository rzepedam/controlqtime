<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\GratificationRequest;
use Controlqtime\Core\Contracts\GratificationRepoInterface;

class GratificationController extends Controller
{
    /**
     * @var GratificationRepoInterface
     */
    protected $gratification;

    /**
     * GratificationController constructor.
     * @param GratificationRepoInterface $gratification
     */
    public function __construct(GratificationRepoInterface $gratification)
    {
        $this->gratification = $gratification;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.gratifications.index');
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getGratifications()
    {
        $gratifications = $this->gratification->all();

        return $gratifications;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.gratifications.create');
    }

    /**
     * @param GratificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GratificationRequest $request)
    {
        $this->gratification->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/gratifications'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $gratification = $this->gratification->find($id);

        return view('maintainers.gratifications.edit', compact('gratification'));
    }

    /**
     * @param GratificationRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GratificationRequest $request, $id)
    {
        $this->gratification->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/gratifications'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->gratification->delete($id);

        return redirect()->route('gratifications.index');
    }

}
