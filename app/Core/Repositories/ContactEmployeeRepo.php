<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\ContactEmployee;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Contracts\ContactEmployeeRepoInterface;

class ContactEmployeeRepo implements ContactEmployeeRepoInterface
{
	
	use OperationEntityArray, WhereMethodsTrait;
	
	/**
	 * @var ContactEmployee
	 */
	protected $model;
	
	/**
	 * ContactEmployeeRepo constructor.
	 *
	 * @param ContactEmployee $model
	 */
	public function __construct(ContactEmployee $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_contacts']; $i++)
		{
			
			$id = $request['id_contact'][$i];
			
			if ($id == 0)
			{
				$this->model = new ContactEmployee([
					'contact_relationship_id' => $request['contact_relationship_id'][$i],
					'name_contact'            => $request['name_contact'][$i],
					'email_contact'           => $request['email_contact'][$i],
					'address_contact'         => $request['address_contact'][$i],
					'tel_contact'             => $request['tel_contact'][$i],
				]);
				
				$entity->contactEmployees()->save($this->model);
				
			} else
			{
				$this->model                          = $this->model->find($id);
				$this->model->contact_relationship_id = $request['contact_relationship_id'][$i];
				$this->model->name_contact            = $request['name_contact'][$i];
				$this->model->email_contact           = $request['email_contact'][$i];
				$this->model->address_contact         = $request['address_contact'][$i];
				$this->model->tel_contact             = $request['tel_contact'][$i];
				
				$this->model->save();
			}
		}
	}
	
}