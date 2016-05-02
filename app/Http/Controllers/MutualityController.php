<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests;
use Controlqtime\Core\Contracts\MutualityRepoInterface;
use Controlqtime\Http\Requests\MutualityRequest;

class MutualityController extends Controller
{
    protected $mutuality;

    public function __construct(MutualityRepoInterface $mutuality)
    {
        $this->mutuality = $mutuality;
    }

    public function index()
    {
    	$mutualities = $this->mutuality->all();
    	return view('maintainers.mutualities.index', compact('mutualities'));
    }

    public function create()
    {
    	return view('maintainers.mutualities.create');
    }

    public function store(MutualityRequest $request)
    {
    	$this->mutuality->create($request->all());
        return redirect()->route('maintainers.mutualities.index');
    }

    public function edit($id)
    {
        $mutuality = $this->mutuality->find($id);
        return view('maintainers.mutualities.edit', compact('mutuality'));
    }

    public function update(MutualityRequest $request, $id)
    {
        $this->mutuality->update($request->all(), $id);
        return redirect()->route('maintainers.mutualities.index');
    }

    public function destroy($id)
    {
        $this->mutuality->delete($id);
        return redirect()->route('maintainers.mutualities.index');
    }
}
