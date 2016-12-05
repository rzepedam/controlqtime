<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Http\Requests\PositionRequest;

class PositionController extends Controller
{
	/**
	 * @var Position
	 */
	protected $position;
	
	/**
	 * PositionController constructor.
	 *
	 * @param Position $position
	 */
	public function __construct(Position $position)
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
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(PositionRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->position->create($request->all());
		}
		
		session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/positions'
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
			$position = $this->position->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $position->restore();
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
		$position = $this->position->findOrFail($id);
		
		return view('maintainers.positions.edit', compact('position'));
	}
	
	/**
	 * @param PositionRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(PositionRequest $request, $id)
	{
		try
		{
			$this->position->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'    => '/maintainers/positions'
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
		$this->position->destroy($id);
		session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
		
		return redirect()->route('positions.index');
	}
	
}
