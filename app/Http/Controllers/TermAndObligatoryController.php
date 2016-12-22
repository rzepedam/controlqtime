<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Http\Requests\TermAndObligatoryRequest;

class TermAndObligatoryController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var TermAndObligatory
	 */
	protected $termAndObligatory;
	
	/**
	 * TermAndObligatoryController constructor.
	 *
	 * @param Log               $log
	 * @param TermAndObligatory $termAndObligatory
	 */
	public function __construct(Log $log, TermAndObligatory $termAndObligatory)
	{
		$this->log               = $log;
		$this->termAndObligatory = $termAndObligatory;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.terms-and-obligatories.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getTermsAndObligatories()
	{
		$termAndObligatories = $this->termAndObligatory->all();
		
		return $termAndObligatories;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.terms-and-obligatories.create');
	}
	
	/**
	 * @param TermAndObligatoryRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(TermAndObligatoryRequest $request)
	{
		// Al estar desactivado el elemento "predeterminado", no envía nada al Backend.
		// Es necesario agregar su comportamiento manualmente para su actualización.
		$data = $request->all();
		
		if ( ! array_key_exists('default', $data) )
		{
			$data['default'] = false;
		}
		
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->termAndObligatory->create($data);
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/terms-and-obligatories']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TermAndObligatory: " . $e->getMessage());
			
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
			$termAndObligatory = $this->termAndObligatory->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $termAndObligatory->restore();
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
		$termAndObligatory = $this->termAndObligatory->findOrFail($id);
		
		return view('maintainers.terms-and-obligatories.edit', compact('termAndObligatory'));
	}
	
	/**
	 * @param TermAndObligatoryRequest $request
	 * @param                          $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(TermAndObligatoryRequest $request, $id)
	{
		// Al estar desactivado el elemento "predeterminado", no envía nada al Backend.
		// Es necesario agregar su comportamiento manualmente para su correcta actualización.
		$data = $request->all();
		
		if ( ! array_key_exists('default', $data) )
		{
			$data['default'] = false;
		}
		
		try
		{
			$this->termAndObligatory->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/terms-and-obligatories']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TermAndObligatory: " . $e->getMessage());
			
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
		try
		{
			$this->termAndObligatory->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('terms-and-obligatories.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete TermAndObligatory: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
