<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\ForecastRequest;

class ForecastController extends Controller
{
    protected $forecast;

    public function __construct(BaseRepoInterface $forecast)
    {
        $this->forecast = $forecast;
    }

    public function index()
    {
        $forecasts = $this->forecast->all();
        return view('maintainers.forecasts.index', compact('forecasts'));
    }

    public function create()
    {
        return view('maintainers.forecasts.create');
    }

    public function store(ForecastRequest $request)
    {
        $this->forecast->create($request->all());
        return redirect()->route('maintainers.forecasts.index');
    }

    public function edit($id)
    {
        $forecast = $this->forecast->find($id);
        return view('maintainers.forecasts.edit', compact('forecast'));
    }

    public function update(ForecastRequest $request, $id)
    {
        $this->forecast->update($request->all(), $id);
        return redirect()->route('maintainers.forecasts.index');
    }

    public function destroy($id)
    {
        $this->forecast->delete($id);
        return redirect()->route('maintainers.forecasts.index');
    }

}
