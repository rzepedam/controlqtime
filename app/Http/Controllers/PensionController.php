<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\PensionRequest;

class PensionController extends Controller
{
    protected $pension;

    public function __construct(BaseRepoInterface $pension)
    {
        $this->pension = $pension;
    }

    public function index()
    {
        $pensions = $this->pension->all();
        return view('maintainers.pensions.index', compact('pensions'));
    }

    public function create()
    {
        return view('maintainers.pensions.create');
    }

    public function store(PensionRequest $request)
    {
        $this->pension->create($request->all());
        return redirect()->route('maintainers.pensions.index');
    }

    public function edit($id)
    {
        $pension = $this->pension->find($id);
        return view('maintainers.pensions.edit', compact('pension'));
    }

    public function update(PensionRequest $request, $id)
    {
        $this->pension->update($request->all(), $id);
        return redirect()->route('maintainers.pensions.index');
    }

    public function destroy($id)
    {
        $this->pension->delete($id);
        return redirect()->route('maintainers.pensions.index');
    }
}
