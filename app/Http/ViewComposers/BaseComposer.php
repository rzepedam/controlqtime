<?php

namespace Controlqtime\Http\ViewComposers;

use Illuminate\Support\Facades\Route;

class BaseComposer
{
    public function compose($view)
    {
        $view->current_route = end((explode('.', Route::currentRouteName())));
    }
}