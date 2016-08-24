<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\CommuneRepoInterface;
use Controlqtime\Core\Contracts\ProvinceRepoInterface;
use Controlqtime\Core\Contracts\RegionRepoInterface;
use Controlqtime\Core\Contracts\TerminalRepoInterface;
use Controlqtime\Http\Requests\TerminalRequest;

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
		$this->region = $region;
		$this->province = $province;
		$this->commune = $commune;
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

	public function create()
	{
		$regions = $this->region->lists('name', 'id');
		$provinces = $this->province->lists('name', 'id');
		$communes = $this->commune->lists('name', 'id');

		return view('maintainers.terminals.create', compact(
			'regions', 'provinces', 'communes'
		));
	}

	public function store(TerminalRequest $request)
	{
		$this->terminal->create($request->all());

		return redirect()->route('maintainers.terminals.index');
	}

	public function edit($id)
	{
		$terminal = $this->terminal->find($id);
		$regions = $this->region->lists('name', 'id');
		$provinces = $this->province->lists('name', 'id');
		$communes = $this->commune->lists('name', 'id');

		return view('maintainers.terminals.edit', compact(
			'terminal', 'regions', 'provinces', 'communes'
		));
	}

	public function update(TerminalRequest $request, $id)
	{
		$this->terminal->update($request->all(), $id);

		return redirect()->route('maintainers.terminals.index');
	}

	public function destroy($id)
	{
		$this->terminal->delete($id);

		return redirect()->route('maintainers.terminals.index');
	}
}
