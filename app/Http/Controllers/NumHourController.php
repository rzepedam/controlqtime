<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\NumHourRequest;
use Controlqtime\Core\Contracts\NumHourRepoInterface;

class NumHourController extends Controller
{
	/**
	 * @var NumHourRepoInterface
	 */
	protected $numHour;
	
	/**
	 * NumHourController constructor.
	 *
	 * @param NumHourRepoInterface $numHour
	 */
	public function __construct(NumHourRepoInterface $numHour)
	{
		$this->numHour = $numHour;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.num-hours.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getNumHours()
	{
		$numHours = $this->numHour->all();
		
		return $numHours;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.num-hours.create');
	}
	
	/**
	 * @param NumHourRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(NumHourRequest $request)
	{
		$num_hour = $this->numHour->onlyTrashed('name', $request->get('name'));
		
		if (! $num_hour)
		{
			$this->numHour->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/num-hours'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$numHour = $this->numHour->find($id);
		
		return view('maintainers.num-hours.edit', compact('numHour'));
	}
	
	/**
	 * @param NumHourRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(NumHourRequest $request, $id)
	{
		$this->numHour->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/num-hours'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->numHour->delete($id);
		
		return redirect()->route('num-hours.index');
	}
}
