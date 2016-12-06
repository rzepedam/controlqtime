<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Http\Requests\TypeInstitutionRequest;

class TypeInstitutionController extends Controller
{
	/**
	 * @var TypeInstitution
	 */
	protected $typeInstitution;
	
	/**
	 * TypeInstitutionController constructor.
	 *
	 * @param TypeInstitution $typeInstitution
	 */
	public function __construct(TypeInstitution $typeInstitution)
	{
		$this->typeInstitution = $typeInstitution;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-institutions.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeInstitutions()
	{
		$typeInstitutions = $this->typeInstitution->all();
		
		return $typeInstitutions;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-institutions.create');
	}
	
	/**
	 * @param TypeInstitutionRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeInstitutionRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->typeInstitution->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-institutions'
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
			$typeInstitution = $this->typeInstitution->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeInstitution->restore();
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
		$typeInstitution = $this->typeInstitution->findOrFail($id);
		
		return view('maintainers.type-institutions.edit', compact('typeInstitution'));
	}
	
	/**
	 * @param                        $id
	 * @param TypeInstitutionRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update($id, TypeInstitutionRequest $request)
	{
		try
		{
			$this->typeInstitution->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/type-institutions'
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
		$this->typeInstitution->destroy($id);
		
		return redirect()->route('type-institutions.index');
	}
}
