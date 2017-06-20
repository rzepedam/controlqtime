<?php

namespace Controlqtime\Http\Middleware;

use Closure;
use Controlqtime\Core\Entities\Visit;

class CheckVisitIdInFormVisit
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $visit = Visit::findOrFail(request('id'));
        dd($visit);

        return $next($request);
    }
}
