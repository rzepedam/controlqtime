<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Http\Requests\NumHourRequest;

class NumHourController extends Controller
{
	/**
	 * @var NumHour
	 */
	protected $numHour;
	
	/**
	 * NumHourController constructor.
	 *
	 * @param NumHour $numHour
	 */
	public function __construct(NumHour $numHour)
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
		if ( ! $this->restore($request) )
		{
			$this->numHour->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/num-hours'
		]);
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$numHour = $this->numHour->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $numHour->restore();
		} catch ( Exception $e )
		{
			return false;
		}
		
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$numHour = $this->numHour->findOrFail($id);
		
		return view('maintainers.num-hours.edit', compact('numHour'));
	}
	
	/**
	 * @param NumHourRequest $request
	 * @param                $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(NumHourRequest $request, $id)
	{
		try
		{
			$this->numHour->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/num-hours'
			]);
		} catch ( Exception $e )
		{
			return response()->json(['success' => false]);
		}
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
