<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\ForecastRequest;
use Controlqtime\Core\Contracts\ForecastRepoInterface;

class ForecastController extends Controller
{
    /**
     * @var ForecastRepoInterface
     */
    protected $forecast;

    /**
     * ForecastController constructor.
     * @param ForecastRepoInterface $forecast
     */
    public function __construct(ForecastRepoInterface $forecast)
    {
        $this->forecast = $forecast;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.forecasts.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getForecasts()
    {
        $forecasts = $this->forecast->all();

        return $forecasts;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.forecasts.create');
    }

    /**
     * @param ForecastRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ForecastRequest $request)
    {
        $this->forecast->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/forecasts'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $forecast = $this->forecast->find($id);

        return view('maintainers.forecasts.edit', compact('forecast'));
    }

    /**
     * @param ForecastRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ForecastRequest $request, $id)
    {
        $this->forecast->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/forecasts'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->forecast->delete($id);

        return redirect()->route('forecasts.index');
    }

}
