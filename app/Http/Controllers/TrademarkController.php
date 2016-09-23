<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TrademarkRequest;
use Controlqtime\Core\Contracts\TrademarkRepoInterface;

class TrademarkController extends Controller
{
    /**
     * @var TrademarkRepoInterface
     */
    protected $trademark;

    /**
     * TrademarkController constructor.
     * @param TrademarkRepoInterface $trademark
     */
    public function __construct(TrademarkRepoInterface $trademark)
    {
        $this->trademark = $trademark;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.trademarks.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTrademarks()
    {
        $trademarks = $this->trademark->all();

        return $trademarks;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.trademarks.create');
    }

    /**
     * @param TrademarkRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TrademarkRequest $request)
    {
        $this->trademark->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/trademarks'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $trademark = $this->trademark->find($id);

        return view('maintainers.trademarks.edit', compact('trademark'));
    }

    /**
     * @param TrademarkRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TrademarkRequest $request, $id)
    {
        $this->trademark->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/trademarks'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->trademark->delete($id);

        return redirect()->route('trademarks.index');
    }
}
