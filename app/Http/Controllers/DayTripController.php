<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\DayTripRequest;
use Controlqtime\Core\Contracts\DayTripRepoInterface;

class DayTripController extends Controller
{
    /**
     * @var DayTripRepoInterface
     */
    protected $dayTrip;

    /**
     * DayTripController constructor.
     *
     * @param DayTripRepoInterface $dayTrip
     */
    public function __construct(DayTripRepoInterface $dayTrip)
    {
        $this->dayTrip = $dayTrip;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.day-trips.index');
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getDayTrips()
    {
        $dayTrips = $this->dayTrip->all();

        return $dayTrips;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.day-trips.create');
    }

    /**
     * @param DayTripRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DayTripRequest $request)
    {
	    $day_trip = $this->dayTrip->onlyTrashed('name', $request->get('name'));
	
	    if (! $day_trip)
	    {
		    $this->dayTrip->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/day-trips'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $dayTrip = $this->dayTrip->find($id);

        return view('maintainers.day-trips.edit', compact('dayTrip'));
    }

    /**
     * @param \Controlqtime\Http\Requests\DayTripRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DayTripRequest $request, $id)
    {
        $this->dayTrip->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/day-trips'
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->dayTrip->delete($id);

        return redirect()->route('day-trips.index');
    }
}
