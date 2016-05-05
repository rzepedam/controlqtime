<?php

namespace Controlqtime\Providers;

use Controlqtime\Http\ViewComposers\BaseComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(
            ['maintainers.companies.edit'],
            BaseComposer::class
        );
    }

    public function register()
    {
        //
    }
}
