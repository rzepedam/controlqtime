<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Http\Requests\FuelRequest;
use Controlqtime\Http\Requests;

class FuelController extends Controller
{
    protected $fuel;

    public function __construct(FuelRepoInterface $fuel)
    {
        $this->fuel = $fuel;
    }
    
    public function index()
    {
        return view('maintainers.fuels.index');
    }

    public function getFuels() {
        $fuels = $this->fuel->all();
        return $fuels;
    }

    public function create()
    {
        return view('maintainers.fuels.create');
    }

    public function store(FuelRequest $request)
    {
        $this->fuel->create($request->all());
        return redirect()->route('maintainers.fuels.index');
    }
    
    public function edit($id)
    {
        $fuel = $this->fuel->find($id);
        return view('maintainers.fuels.edit', compact('fuel'));
    }

    public function update(FuelRequest $request, $id)
    {
        $this->fuel->update($request->all(), $id);
        return redirect()->route('maintainers.fuels.index');
    }
    
    public function destroy($id)
    {
        $this->fuel->delete($id);
        return redirect()->route('maintainers.fuels.index');
    }
}
