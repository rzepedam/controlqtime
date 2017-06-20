<?php

namespace Controlqtime\Core\Entities;

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

    public function stateToNull($visit)
    {
        if (!is_null($visit->state)) {
            $visit->state = null;
            $visit->save();

            return false;
        }
    }

    public function checkStateVisit($visit)
    {
        switch ($visit->type_visit_id) {
            case 1:
            case 5:
            {
                if ($visit->images_induction->isEmpty()) {
                    $this->stateToNull($visit);
                }
            }

            case 2:
            {
                if ($visit->images_company->isEmpty() || $visit->images_forecast->isEmpty() || $visit->images_insurrance->isEmpty() || $visit->images_induction->isEmpty()) {
                    $this->stateToNull($visit);
                }
            }

            case 3:
            {
                if ($visit->images_company->isEmpty() || $visit->images_visa->isEmpty() || $visit->images_forecast->isEmpty() || $visit->images_insurrance->isEmpty() || $visit->images_induction->isEmpty()) {
                    $this->stateToNull($visit);
                }
            }

            case 4:
            {
                $this->stateToNull($visit);
            }
        }

        $visit->state = 'pending';

        return $visit->save();
    }
}
