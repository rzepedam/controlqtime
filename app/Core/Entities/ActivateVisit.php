<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Controlqtime\Core\WebServices\Biometry\Biometry;

class ActivateVisit extends Eloquent
{
	/**
	 * @var Biometry
	 */
	private $biometry;
	
	/**
	 * @var SignInVisit
	 */
	protected $visit;
	
	/**
	 * ActivateVisit constructor.
	 *
	 */
	public function __construct()
	{
		$this->biometry = new Biometry();
		$this->visit    = new SignInVisit();
	}
	
	/**
	 * Únicamente deshabilita a Visita de Biometry y CQTime si este está habilitado
	 *
	 * @param $visit
	 *
	 * @return mixed
	 */
	public function saveStateDisableVisit($visit)
	{
		if ( $visit->state != 'disable' )
		{
			$this->biometry->delete($visit);
		}
		
		$visit->state     = 'disable';
		
		return $visit->save();
	}
	
	/**
	 * Únicamente habilita a Visita de Biometry y CQTime si este está deshabilitado
	 *
	 * @param $visit
	 *
	 * @return mixed
	 */
	public function saveStateEnableVisit($visit)
	{
		if ( $visit->state != 'enable' )
		{
			$this->biometry->create($visit);
		}
		
		$visit->state = 'enable';
		
		return $visit->save();
	}
}
