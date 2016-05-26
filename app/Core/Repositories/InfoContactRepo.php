<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\InfoContactRepoInterface;
use Controlqtime\Core\Entities\InfoContact;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class InfoContactRepo implements InfoContactRepoInterface{

	use OperationEntityArray, WhereMethodsTrait;

	protected $model;

	public function __construct(InfoContact $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_contacts']; $i ++)
		{

			$id = $request['id_contact'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new InfoContact([
					'name_contact'        	=> $request['name_contact'][ $i ],
					'email_contact' 		=> $request['email_contact'][ $i ],
					'address_contact'       => $request['address_contact'][ $i ],
					'tel_contact'        	=> $request['tel_contact'][ $i ],
				]);

				$entity->certifications()->save($this->model);

			} else
			{
				$this->model               		= $this->model->find($id);
				$this->model->name_contact      = $request['name_contact'][ $i ];
				$this->model->email_contact 	= $request['email_contact'][ $i ];
				$this->model->address_contact   = $request['address_contact'][ $i ];
				$this->model->tel_contact       = $request['tel_contact'][ $i ];

				$this->model->save();
			}
		}
	}
	
}