<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TerminalRequest;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;

class TerminalController extends Controller
{
    /**
     * @var TerminalRepoInterface
     */
    protected $terminal;

    /**
     * @var RegionRepoInterface
     */
    protected $region;

    /**
     * @var ProvinceRepoInterface
     */
    protected $province;

    /**
     * @var CommuneRepoInterface
     */
    protected $commune;

    /**
     * TerminalController constructor.
     * @param TerminalRepoInterface $terminal
     * @param RegionRepoInterface $region
     * @param ProvinceRepoInterface $province
     * @param CommuneRepoInterface $commune
     */
    public function __construct(TerminalRepoInterface $terminal, RegionRepoInterface $region, ProvinceRepoInterface $province, CommuneRepoInterface $commune)
    {
        $this->terminal = $terminal;
        $this->region   = $region;
        $this->province = $province;
        $this->commune  = $commune;
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getTerminals()
    {
        $terminals = $this->terminal->all(['commune']);

        return $terminals;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.terminals.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $regions   = $this->region->lists('name', 'id');
        $provinces = $this->province->lists('name', 'id');
        $communes  = $this->commune->lists('name', 'id');

        return view('maintainers.terminals.create', compact(
            'regions', 'provinces', 'communes'
        ));
    }

    /**
     * @param TerminalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TerminalRequest $request)
    {
        $this->terminal->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/terminals'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $terminal  = $this->terminal->find($id);
        $regions   = $this->region->lists('name', 'id');
        $provinces = $this->province->lists('name', 'id');
        $communes  = $this->commune->lists('name', 'id');

        return view('maintainers.terminals.edit', compact(
            'terminal', 'regions', 'provinces', 'communes'
        ));
    }

    /**
     * @param TerminalRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TerminalRequest $request, $id)
    {
        $this->terminal->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/terminals'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $terminal = $this->terminal->find($id, ['commune']);

        return view('maintainers.terminals.show', compact('terminal'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->terminal->delete($id);

        return redirect()->route('terminals.index');
    }
}
