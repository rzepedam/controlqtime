<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\PeriodicityRepoInterface;
use Controlqtime\Http\Requests\PeriodicityRequest;

class PeriodicityController extends Controller
{
	/**
	 * @var PeriodicityRepoInterface
	 */
	protected $periodiocity;

	/**
	 * PeriodicityController constructor.
	 * @param PeriodicityRepoInterface $periodiocity
	 */
	public function __construct(PeriodicityRepoInterface $periodiocity)
	{
		$this->periodiocity = $periodiocity;
	}

	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getPeriodicities()
	{
		$periodicities = $this->periodiocity->all();
		return $periodicities;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
    {
        return view('maintainers.periodicities.index');
    }

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
    {
    	return view('maintainers.periodicities.create');
    }

	/**
	 * @param PeriodicityRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(PeriodicityRequest $request)
    {
    	$this->periodiocity->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/periodicities'
		));
    }


	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
    {
    	$periodicity = $this->periodiocity->find($id);
        return view('maintainers.periodicities.edit', compact('periodicity'));
    }


	/**
	 * @param PeriodicityRequest $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(PeriodicityRequest $request, $id)
    {
        $this->periodiocity->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/periodicities'
		));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
    {
        $this->periodiocity->delete($id);
		return redirect()->route('periodicities.index');
    }
}
