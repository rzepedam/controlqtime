<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Trademark;
use Controlqtime\Http\Requests\TrademarkRequest;

class TrademarkController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Trademark
	 */
	protected $trademark;
	
	/**
	 * TrademarkController constructor.
	 *
	 * @param Log       $log
	 * @param Trademark $trademark
	 */
	public function __construct(Log $log, Trademark $trademark)
	{
		$this->log       = $log;
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
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TrademarkRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->trademark->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/trademarks']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Trademark: " . $e->getMessage());
			
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
			$trademark = $this->trademark->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $trademark->restore();
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
		$trademark = $this->trademark->findOrFail($id);
		
		return view('maintainers.trademarks.edit', compact('trademark'));
	}
	
	/**
	 * @param TrademarkRequest $request
	 * @param                  $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TrademarkRequest $request, $id)
	{
		try
		{
			$this->trademark->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/trademarks']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Trademark: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->trademark->destroy($id);
		
		return redirect()->route('trademarks.index');
	}
}
