<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Http\Requests\TypeCompanyRequest;

class TypeCompanyController extends Controller
{
	/**
	 * @var TypeCompany
	 */
	protected $typeCompany;
	
	/**
	 * TypeCompanyController constructor.
	 *
	 * @param TypeCompany $typeCompany
	 */
	public function __construct(TypeCompany $typeCompany)
	{
		$this->typeCompany = $typeCompany;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-companies.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeCompanies()
	{
		$type_companies = $this->typeCompany->all();
		
		return $type_companies;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-companies.create');
	}
	
	/**
	 * @param TypeCompanyRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeCompanyRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->typeCompany->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-companies'
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
			$typeCompany = $this->typeCompany->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeCompany->restore();
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
		$typeCompany = $this->typeCompany->findOrFail($id);
		
		return view('maintainers.type-companies.edit', compact('typeCompany'));
	}
	
	/**
	 * @param TypeCompanyRequest $request
	 * @param                    $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeCompanyRequest $request, $id)
	{
		try
		{
			$this->typeCompany->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/type-companies'
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
		$this->typeCompany->destroy($id);
		
		return redirect()->route('type-companies.index');
	}
}
