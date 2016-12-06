<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Http\Requests\TypeContractRequest;

class TypeContractController extends Controller
{
	/**
	 * @var TypeContract
	 */
	protected $typeContract;
	
	/**
	 * TypeContractController constructor.
	 *
	 * @param TypeContract $typeContract
	 */
	public function __construct(TypeContract $typeContract)
	{
		$this->typeContract = $typeContract;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-contracts.index');
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getTypeContracts()
	{
		$typeContracts = $this->typeContract->all();
		
		return $typeContracts;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-contracts.create');
	}
	
	/**
	 * @param TypeContractRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(TypeContractRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->typeContract->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-contracts'
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
			$numHour = $this->typeContract->onlyTrashed()->where('name', $request->get('name'))->where('dur', $request->get('dur'))->firstOrFail();
			
			return $numHour->restore();
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
		$typeContract = $this->typeContract->findOrFail($id);
		
		return view('maintainers.type-contracts.edit', compact('typeContract'));
	}
	
	/**
	 * @param TypeContractRequest $request
	 * @param                     $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(TypeContractRequest $request, $id)
	{
		try
		{
			$this->typeContract->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/type-contracts'
			]);
		} catch ( Exception $e )
		{
			return response()->json(['success' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->typeContract->destroy($id);
		
		return redirect()->route('type-contracts.index');
	}
}
