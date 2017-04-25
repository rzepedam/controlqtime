<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\WebServices\Biometry\Biometry;
use Illuminate\Database\Eloquent\Model as Eloquent;

class ActivateVisit extends Eloquent
{
	/**
	 * @var Visit
	 */
	protected $visit;

	/**
	 * ActivateVisit constructor.
	 */
	public function __construct()
	{
		$this->visit = new Visit();
	}

	public function checkStateVisit($visit)
	{
		if ( $visit->images_company->isEmpty() || $visit->images_induction->isEmpty() || $visit->images_insurrance->isEmpty() || $visit->images_forecast->isEmpty() )
		{
			if ( ! is_null($visit->state) )
			{
				$visit->state = null;
				$visit->save();
			}

			return false;
		}

		$visit->state = 'pending';
		return $visit->save();
	}
}
