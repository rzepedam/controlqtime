<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Http\Requests\TypeProfessionalLicenseRequest;

class TypeProfessionalLicenseController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var TypeProfessionalLicense
	 */
	protected $typeProfessionalLicense;
	
	/**
	 * TypeProfessionalLicenseController constructor.
	 *
	 * @param Log                     $log
	 * @param TypeProfessionalLicense $typeProfessionalLicense
	 */
	public function __construct(Log $log, TypeProfessionalLicense $typeProfessionalLicense)
	{
		$this->log                     = $log;
		$this->typeProfessionalLicense = $typeProfessionalLicense;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-professional-licenses.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getTypeProfessionalLicenses()
	{
		$typeProfessionalLicenses = $this->typeProfessionalLicense->all();
		
		return $typeProfessionalLicenses;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.type-professional-licenses.create');
	}
	
	/**
	 * @param TypeProfessionalLicenseRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(TypeProfessionalLicenseRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->typeProfessionalLicense->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-professional-licenses']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store TypeProfessionalLicense: " . $e->getMessage());
			
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
			$typeProfessionalLicense = $this->typeProfessionalLicense->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeProfessionalLicense->restore();
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
		$typeProfessionalLicense = $this->typeProfessionalLicense->findOrFail($id);
		
		return view('maintainers.type-professional-licenses.edit', compact('typeProfessionalLicense'));
	}
	
	/**
	 * @param TypeProfessionalLicenseRequest $request
	 * @param                                $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeProfessionalLicenseRequest $request, $id)
	{
		try
		{
			$this->typeProfessionalLicense->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/type-professional-licenses']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update TypeProfessionalLicense: " . $e->getMessage());
			
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
			$this->typeProfessionalLicense->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('type-professional-licenses.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete TypeProfessionalLicense: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
