<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Gratification;
use Controlqtime\Http\Requests\GratificationRequest;

class GratificationController extends Controller
{
	/**
	 * @var Gratification
	 */
	protected $gratification;
	
	/**
	 * GratificationController constructor.
	 *
	 * @param Gratification $gratification
	 */
	public function __construct(Gratification $gratification)
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
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(GratificationRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->gratification->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/gratifications'
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
			$gratification = $this->gratification->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $gratification->restore();
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
		$gratification = $this->gratification->findOrFail($id);
		
		return view('maintainers.gratifications.edit', compact('gratification'));
	}
	
	/**
	 * @param GratificationRequest $request
	 * @param                      $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(GratificationRequest $request, $id)
	{
		try
		{
			$this->gratification->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/gratifications'
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
		$this->gratification->destroy($id);
		
		return redirect()->route('gratifications.index');
	}
	
}
