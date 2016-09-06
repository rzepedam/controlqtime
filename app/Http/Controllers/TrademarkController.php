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
        return view('maintainers.trademarks.index');
    }
    
    public function getTrademarks() {
        $trademarks = $this->trademark->all();
        return $trademarks;
    }

    public function create()
    {
        return view('maintainers.trademarks.create');
    }

    public function store(TrademarkRequest $request)
    {
        $this->trademark->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/trademarks'
		));
    }

    public function edit($id)
    {
        $trademark = $this->trademark->find($id);
        return view('maintainers.trademarks.edit', compact('trademark'));
    }

    public function update(TrademarkRequest $request, $id)
    {
        $this->trademark->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/trademarks'
		));
    }

    public function destroy($id)
    {
        $this->trademark->delete($id);
        return redirect()->route('trademarks.index');
    }
}
