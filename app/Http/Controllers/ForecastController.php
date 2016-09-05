<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\ForecastRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\ForecastRequest;

class ForecastController extends Controller
{
    protected $forecast;

    public function __construct(ForecastRepoInterface $forecast)
    {
        $this->forecast = $forecast;
    }

    public function index()
    {
        return view('maintainers.forecasts.index');
    }

    public function getForecasts() {
        $forecasts = $this->forecast->all();
        return $forecasts;
    }

    public function create()
    {
        return view('maintainers.forecasts.create');
    }

    public function store(ForecastRequest $request)
    {
        $this->forecast->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/forecasts'
		));
    }

    public function edit($id)
    {
        $forecast = $this->forecast->find($id);
        return view('maintainers.forecasts.edit', compact('forecast'));
    }

    public function update(ForecastRequest $request, $id)
    {
        $this->forecast->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/forecasts'
		));
    }

    public function destroy($id)
    {
        $this->forecast->delete($id);
        return redirect()->route('maintainers.forecasts.index');
    }

}
