<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Route;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Http\Requests\RouteRequest;

class RouteController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
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
	 * @param Log      $log
	 * @param Route    $route
	 * @param Terminal $terminal
	 */
	public function __construct(Log $log, Route $route, Terminal $terminal)
	{
		$this->log      = $log;
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
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->route->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/routes']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Route: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
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
			
			return response()->json(['status' => true, 'url' => '/maintainers/routes']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Route: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		try
		{
			$this->route->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('routes.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete Route: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
