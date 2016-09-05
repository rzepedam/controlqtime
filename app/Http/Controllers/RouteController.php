<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\RouteRepoInterface;
use Controlqtime\Http\Requests\RouteRequest;
use Controlqtime\Core\Contracts\TerminalRepoInterface;

class RouteController extends Controller
{
    protected $route;
    protected $terminal;

    public function __construct(RouteRepoInterface $route, TerminalRepoInterface $terminal)
    {
        $this->route = $route;
        $this->terminal = $terminal;
    }

    public function index()
    {
        return view('maintainers.routes.index');
    }

    public function getRoutes()
    {
        $routes = $this->route->all(['terminal']);
        return $routes;
    }

    public function create()
    {
        $terminals = $this->terminal->lists('name', 'id');
        return view('maintainers.routes.create', compact('terminals'));
    }

    public function store(RouteRequest $request)
    {
        $this->route->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/routes'
		));
    }

    public function edit($id)
    {
        $terminals = $this->terminal->lists('name', 'id');
        $route = $this->route->find($id);
        return view('maintainers.routes.edit', compact('route', 'terminals'));
    }

    public function update(RouteRequest $request, $id)
    {
        $this->route->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/routes'
		));
    }

    public function destroy($id)
    {
        $this->route->delete($id);
        return redirect()->route('maintainers.routes.index');
    }
}
