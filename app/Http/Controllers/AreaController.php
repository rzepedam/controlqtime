<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Http\Requests\AreaRequest;

class AreaController extends Controller
{
	/**
	 * @var Area
	 */
	protected $area;
	
	/**
	 * @var Terminal
	 */
	protected $terminal;
	
	/**
	 * AreaController constructor.
	 *
	 * @param Area     $area
	 * @param Terminal $terminal
	 */
	public function __construct(Area $area, Terminal $terminal)
	{
		$this->area     = $area;
		$this->terminal = $terminal;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.areas.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getAreas()
	{
		$areas = $this->area->with(['terminal'])->get();
		
		return $areas;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$terminals = $this->terminal->pluck('name', 'id');
		
		return view('maintainers.areas.create', compact('terminals'));
	}
	
	/**
	 * @param AreaRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(AreaRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->area->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/areas'
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
			$area = $this->area->onlyTrashed()->where('name', $request->get('name'))->where('terminal_id', $request->get('terminal_id'))->firstOrFail();
			
			return $area->restore();
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
		$area      = $this->area->findOrFail($id);
		$terminals = $this->terminal->pluck('name', 'id');
		
		return view('maintainers.areas.edit', compact(
			'area', 'terminals'
		));
	}
	
	/**
	 * @param AreaRequest $request
	 * @param             $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(AreaRequest $request, $id)
	{
		try
		{
			$this->area->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/areas'
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
		$this->area->destroy($id);
		
		return redirect()->route('areas.index');
	}
}
