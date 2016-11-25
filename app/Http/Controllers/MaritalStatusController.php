<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\MaritalStatusRequest;
use Controlqtime\Core\Contracts\MaritalStatusRepoInterface;

class MaritalStatusController extends Controller
{
    /**
     * @var MaritalStatusRepoInterface
     */
    protected $maritalStatus;

    /**
     * MaritalStatusController constructor.
     * @param MaritalStatusRepoInterface $maritalStatus
     */
    public function __construct(MaritalStatusRepoInterface $maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getMaritalStatuses()
    {
        $maritalStatus = $this->maritalStatus->all();

        return $maritalStatus;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.marital-statuses.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.marital-statuses.create');
    }

    /**
     * @param MaritalStatusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MaritalStatusRequest $request)
    {
	    $marital_status = $this->maritalStatus->onlyTrashed('name', $request->get('name'));
	
	    if (! $marital_status)
	    {
		    $this->maritalStatus->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/marital-statuses'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $maritalStatus = $this->maritalStatus->find($id);

        return view('maintainers.marital-statuses.edit', compact('maritalStatus'));
    }

    /**
     * @param MaritalStatusRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MaritalStatusRequest $request, $id)
    {
        $this->maritalStatus->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/marital-statuses'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->maritalStatus->delete($id);

        return redirect()->route('marital-statuses.index');
    }
}
