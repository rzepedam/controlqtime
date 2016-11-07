<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ActivateCompanyInterface;

class ActivateCompany extends Eloquent implements ActivateCompanyInterface
{
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	
	/**
	 * ActivateCompany constructor.
	 *
	 * @param CompanyRepoInterface $company
	 */
	public function __construct(CompanyRepoInterface $company)
	{
		
		$this->company = $company;
	}
	
	public function checkStateCompany($id)
	{
		$company = $this->company->find($id);
		
		if ($company->images_rol->isEmpty())
			return $this->saveStateDisableCompany($company);
		
		if ($company->images_patent->isEmpty())
			return $this->saveStateDisableCompany($company);
		
		if ($company->images_carnet->isEmpty())
			return $this->saveStateDisableCompany($company);
		
		
		return $this->saveStateEnableCompany($company);
	}
	
	/**
	 * @param $company
	 *
	 * @return mixed
	 */
	public function saveStateDisableCompany($company)
	{
		$company->state = 'disable';
		
		return $company->save();
	}
	
	/**
	 * @param $company
	 *
	 * @return mixed
	 */
	private function saveStateEnableCompany($company)
	{
		$company->state = 'enable';
		
		return $company->save();
	}
}
