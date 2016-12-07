<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Http\Requests\TypeSpecialityRequest;

class TypeSpecialityController extends Controller
{
	/**
	 * @var TypeSpeciality
	 */
	protected $typeSpeciality;
	
	/**
	 * TypeSpecialityController constructor.
	 *
	 * @param TypeSpeciality $typeSpeciality
	 */
	public function __construct(TypeSpeciality $typeSpeciality)
	{
		$this->typeSpeciality = $typeSpeciality;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-specialities.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeSpecialities()
	{
		$type_specialities = $this->typeSpeciality->all();
		
		return $type_specialities;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-specialities.create');
	}
	
	/**
	 * @param TypeSpecialityRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeSpecialityRequest $request)
	{
		if ( ! $this->restore($request) )
		{
			$this->typeSpeciality->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-specialities'
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
			$typeSpeciality = $this->typeSpeciality->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeSpeciality->restore();
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
		$typeSpeciality = $this->typeSpeciality->findOrFail($id);
		
		return view('maintainers.type-specialities.edit', compact('typeSpeciality'));
	}
	
	/**
	 * @param TypeSpecialityRequest $request
	 * @param                       $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeSpecialityRequest $request, $id)
	{
		try
		{
			$this->typeSpeciality->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json([
				'success' => true,
				'url'     => '/maintainers/type-specialities'
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
		$this->typeSpeciality->destroy($id);
		
		return redirect()->route('type-specialities.index');
	}
}
