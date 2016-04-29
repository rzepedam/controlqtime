<?php

namespace Controlqtime\Http\Requests\Forms;

use Controlqtime\Http\Requests\Request;

abstract class SanitizedRequest extends Request{

    private $clean              = false;

    public function all() {
        return $this->sanitize(parent::all());
    }

    protected function sanitize(Array $inputs){

        if($this->clean)
            return $inputs;

        foreach($inputs as $i => $item) {
            if (is_string($item))
                $inputs[$i] = trim($item);
        }

        $this->replace($inputs);
        $this->clean = true;

        return $inputs;
    }
}