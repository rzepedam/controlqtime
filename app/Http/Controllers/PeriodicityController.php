<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Http\Requests\PeriodicityRequest;

class PeriodicityController extends Controller
{
	/**
	 * @var Periodicity
	 */
	protected $periodiocity;
	
	/**
	 * PeriodicityController constructor.
	 *
	 * @param Periodicity $periodiocity
	 */
	public function __construct(Periodicity $periodiocity)
	{
		$this->periodiocity = $periodiocity;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.periodicities.index');
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
	public function create()
	{
		return view('maintainers.periodicities.create');
	}
	
	/**
	 * @param PeriodicityRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(PeriodicityRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->periodiocity->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/periodicities'
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
			$periodicity = $this->periodiocity->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $periodicity->restore();
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
		$periodicity = $this->periodiocity->findOrFail($id);
		
		return view('maintainers.periodicities.edit', compact('periodicity'));
	}
	
	/**
	 * @param PeriodicityRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(PeriodicityRequest $request, $id)
	{
		try
		{
			$this->periodiocity->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/periodicities'
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
		$this->periodiocity->destroy($id);
		
		return redirect()->route('periodicities.index');
	}
}
