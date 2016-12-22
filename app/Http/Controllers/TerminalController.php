<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Controlqtime\Http\Requests\TerminalRequest;

class TerminalController extends Controller
{
	/**
	 * @var Commune
	 */
	protected $commune;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Province
	 */
	protected $province;
	
	/**
	 * @var Region
	 */
	protected $region;
	
	/**
	 * @var Terminal
	 */
	protected $terminal;
	
	/**
	 * TerminalController constructor.
	 *
	 * @param Commune  $commune
	 * @param Log      $log
	 * @param Province $province
	 * @param Region   $region
	 * @param Terminal $terminal
	 */
	public function __construct(Commune $commune, Log $log, Province $province, Region $region, Terminal $terminal)
	{
		$this->commune  = $commune;
		$this->log      = $log;
		$this->province = $province;
		$this->region   = $region;
		$this->terminal = $terminal;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.terminals.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getTerminals()
	{
		$terminals = $this->terminal->with(['commune'])->get();
		
		return $terminals;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$communes  = $this->commune->pluck('name', 'id');
		$provinces = $this->province->pluck('name', 'id');
		$regions   = $this->region->pluck('name', 'id');
		
		return view('maintainers.terminals.create', compact(
			'regions', 'provinces', 'communes'
		));
	}
	
	/**
	 * @param TerminalRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(TerminalRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->terminal->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/terminals']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Terminal: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$terminal = $this->terminal->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $terminal->restore();
		} catch ( Exception $e )
		{
			return false;
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$communes  = $this->commune->pluck('name', 'id');
		$provinces = $this->province->pluck('name', 'id');
		$regions   = $this->region->pluck('name', 'id');
		$terminal  = $this->terminal->findOrFail($id);
		
		return view('maintainers.terminals.edit', compact(
			'communes', 'provinces', 'regions', 'terminal'
		));
	}
	
	/**
	 * @param TerminalRequest $request
	 * @param                 $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(TerminalRequest $request, $id)
	{
		try
		{
			$this->terminal->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/terminals']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Terminal: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$terminal = $this->terminal->with(['commune'])->findOrFail($id);
		
		return view('maintainers.terminals.show', compact('terminal'));
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		try
		{
			$this->terminal->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('terminals.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete Terminal: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
