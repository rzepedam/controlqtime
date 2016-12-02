<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Http\Requests\TermAndObligatoryRequest;

class TermAndObligatoryController extends Controller
{
	protected $termAndObligatory;
	
	public function __construct(TermAndObligatory $termAndObligatory)
	{
		$this->termAndObligatory = $termAndObligatory;
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
	public function index()
	{
		return view('maintainers.terms-and-obligatories.index');
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
		// Es necesario agregar su comportamiento manualmente para su correcta actualización.
		$data = $request->all();
		
		if ( ! array_key_exists('default', $data) )
		{
			$data['default'] = false;
		}
		
		if ( ! $this->restore($request) )
		{
			$this->termAndObligatory->create($data);
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/terms-and-obligatories'
		]);
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
		$termAndObligatory = $this->termAndObligatory->find($id);
		
		return view('maintainers.terms-and-obligatories.edit', compact('termAndObligatory'));
	}
	
	/**
	 * @param TermAndObligatoryRequest $request
	 * @param $id
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
		
		$this->termAndObligatory->findOrFail($id)->fill($request->all())->saveOrFail();
		session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/terms-and-obligatories'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->termAndObligatory->delete($id);
		
		return redirect()->route('terms-and-obligatories.index');
	}
}
