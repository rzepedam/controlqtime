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
        $routes = $this->route->all(['terminal']);
        return view('maintainers.routes.index', compact('routes'));
    }

    public function create()
    {
        $terminals = $this->terminal->lists('name', 'id');
        return view('maintainers.routes.create', compact('terminals'));
    }

    public function store(RouteRequest $request)
    {
        $this->route->create($request->all());
        return redirect()->route('maintainers.routes.index');
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
        return redirect()->route('maintainers.routes.index');
    }

    public function destroy($id)
    {
        $this->route->delete($id);
        return redirect()->route('maintainers.routes.index');
    }
}
