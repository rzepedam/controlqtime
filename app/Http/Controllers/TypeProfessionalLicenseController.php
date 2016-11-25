<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeProfessionalLicenseRequest;
use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;

class TypeProfessionalLicenseController extends Controller
{
	/**
	 * @var TypeProfessionalLicenseRepoInterface
	 */
	protected $type_professional_license;
	
	/**
	 * TypeProfessionalLicenseController constructor.
	 *
	 * @param TypeProfessionalLicenseRepoInterface $type_professional_license
	 */
	public function __construct(TypeProfessionalLicenseRepoInterface $type_professional_license)
	{
		$this->type_professional_license = $type_professional_license;
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
		$type_professional_licenses = $this->type_professional_license->all();
		
		return $type_professional_licenses;
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
		$typeProfessionalLicense = $this->type_professional_license->onlyTrashed('name', $request->get('name'));
		
		if (! $typeProfessionalLicense)
		{
			$this->type_professional_license->create($request->all());
		}
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-professional-licenses'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$type_professional_license = $this->type_professional_license->find($id);
		
		return view('maintainers.type-professional-licenses.edit', compact('type_professional_license'));
	}
	
	/**
	 * @param TypeProfessionalLicenseRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(TypeProfessionalLicenseRequest $request, $id)
	{
		$this->type_professional_license->update($request->all(), $id);
		
		return response()->json([
			'success' => true,
			'url'     => '/maintainers/type-professional-licenses'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->type_professional_license->delete($id);
		
		return redirect()->route('type-professional-licenses.index');
	}
}
