<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\DegreeRequest;

class DegreeController extends Controller
{
    protected $degree;

    public function __construct(DegreeRepoInterface $degree)
    {
        $this->degree = $degree;
    }

	public function index()
    {
        return view('maintainers.degrees.index');
    }

    public function getDegrees() {
        $degrees = $this->degree->all();
        return $degrees;
    }

    public function create()
    {
        return view('maintainers.degrees.create');
    }

    public function store(DegreeRequest $request)
    {
        $this->degree->create($request->all());
        return redirect()->route('maintainers.degrees.index');
    }

    public function edit($id)
    {
        $degree = $this->degree->find($id);
        return view('maintainers.degrees.edit', compact('degree'));
    }

    public function update(DegreeRequest $request, $id)
    {
        $this->degree->update($request->all(), $id);
        return redirect()->route('maintainers.degrees.index');
    }

    public function destroy($id)
    {
        $this->degree->delete($id);
        return redirect()->route('maintainers.degrees.index');
    }
    
}
