<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\RouteRequest;
use Controlqtime\Core\Contracts\RouteRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;

class RouteController extends Controller
{
	/**
	 * @var RouteRepoInterface
	 */
	protected $route;
	
	/**
	 * @var TerminalRepoInterface
	 */
	protected $terminal;
	
	/**
	 * RouteController constructor.
	 *
	 * @param RouteRepoInterface $route
	 * @param TerminalRepoInterface $terminal
	 */
	public function __construct(RouteRepoInterface $route, TerminalRepoInterface $terminal)
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
		$routes = $this->route->all(['terminal']);
		
		return $routes;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$terminals = $this->terminal->lists('name', 'id');
		
		return view('maintainers.routes.create', compact('terminals'));
	}
	
	/**
	 * @param RouteRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(RouteRequest $request)
	{
		$route = $this->route->onlyTrashedComposed('name', 'terminal_id', $request->get('name'), $request->get('terminal_id'));
		
		if ( ! $route )
		{
			$this->route->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/routes'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$terminals = $this->terminal->lists('name', 'id');
		$route     = $this->route->find($id);
		
		return view('maintainers.routes.edit', compact('route', 'terminals'));
	}
	
	/**
	 * @param RouteRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(RouteRequest $request, $id)
	{
		$this->route->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/routes'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->route->delete($id);
		
		return redirect()->route('routes.index');
	}
}
