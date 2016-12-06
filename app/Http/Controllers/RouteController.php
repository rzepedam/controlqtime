<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Http\Requests\RouteRequest;

class RouteController extends Controller
{
	/**
	 * @var Route
	 */
	protected $route;
	
	/**
	 * @var Terminal
	 */
	protected $terminal;
	
	/**
	 * RouteController constructor.
	 *
	 * @param Route    $route
	 * @param Terminal $terminal
	 */
	public function __construct(Route $route, Terminal $terminal)
	{
		$this->route    = $route;
		$this->terminal = $terminal;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.routes.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getRoutes()
	{
		$routes = $this->route->with(['terminal'])->get();
		
		return $routes;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$terminals = $this->terminal->pluck('name', 'id');
		
		return view('maintainers.routes.create', compact('terminals'));
	}
	
	/**
	 * @param RouteRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(RouteRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->route->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/routes'
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
			$route = $this->route->onlyTrashed()->where('name', $request->get('name'))->where('terminal_id', $request->get('terminal_id'))->firstOrFail();
			
			return $route->restore();
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
		$route     = $this->route->findOrFail($id);
		$terminals = $this->terminal->pluck('name', 'id');
		
		return view('maintainers.routes.edit', compact('route', 'terminals'));
	}
	
	/**
	 * @param RouteRequest $request
	 * @param              $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(RouteRequest $request, $id)
	{
		try
		{
			$this->route->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/routes'
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
		$this->route->destroy($id);
		
		return redirect()->route('routes.index');
	}
}
