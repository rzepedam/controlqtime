<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TrademarkRepoInterface;
use Controlqtime\Http\Requests\TrademarkRequest;
use Controlqtime\Http\Requests;

class TrademarkController extends Controller
{
    private $trademark;

    public function __construct(TrademarkRepoInterface $trademark)
    {
        $this->trademark = $trademark;
    }
    public function index()
    {
        $trademarks = $this->trademark->all();
        return view('maintainers.trademarks.index', compact('trademarks'));
    }

    public function create()
    {
        return view('maintainers.trademarks.create');
    }

    public function store(TrademarkRequest $request)
    {
        $this->trademark->create($request->all());
        return redirect()->route('maintainers.trademarks.index');
    }

    public function edit($id)
    {
        $trademark = $this->trademark->find($id);
        return view('maintainers.trademarks.edit', compact('trademark'));
    }

    public function update(TrademarkRequest $request, $id)
    {
        $this->trademark->update($request->all(), $id);
        return redirect()->route('maintainers.trademarks.index');
    }

    public function destroy($id)
    {
        $this->trademark->delete($id);
        return redirect()->route('maintainers.trademarks.index');
    }
}
