<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Controlqtime\Core\Entities\Visit;
use Controlqtime\Mail\VisitCompleteForm;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\ActivateVisit;
use Controlqtime\Http\Requests\FormVisitRequest;

class FormVisitController extends Controller
{
	/**
	 * @var ActivateVisit
	 */
	private $activateVisit;

	/**
	 * @var Log
	 */
	protected $log;

	/**
	 * @var Visit
	 */
	protected $visit;

	/**
	 * FormVisitController constructor.
	 *
	 * @param ActivateVisit $activateVisit
	 * @param Log $log
	 * @param Visit $visit
	 */
	public function __construct(ActivateVisit $activateVisit, Log $log, Visit $visit)
	{
		//$this->middleware('guest');
		$this->activateVisit = $activateVisit;
		$this->log           = $log;
		$this->visit         = $visit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$visit = $this->visit->with(['formVisit'])->where('key', request('key'))->firstOrFail();

		switch ( $visit->type_visit_id )
		{
			case 1:
			case 5:
				return view('sign-in-visits.visits.forms.aut', compact('visit'));
				break;

			case 2:
				return view('sign-in-visits.visits.forms.rep_prov_nac', compact('visit'));
				break;

			case 3:
				return view('sign-in-visits.visits.forms.rep_prov_ext', compact('visit'));
				break;
		}
	}

	
	/**
	 * @param  Controlqtime\Http\Requests\FormVisitRequest $request
	 * @return \Illuminate\Http\Response                    
	 */
	public function store(FormVisitRequest $request)
	{
		DB::beginTransaction();

		try
		{
			$visit = $this->visit->with(['imageable'])->findOrFail(request('id'));
			$visit->formVisit()->create(request()->all());
			if ( $this->activateVisit->checkStateVisit($visit) )
			{
				Mail::to($visit->user)->send(new VisitCompleteForm($visit));
			}
			DB::commit();

			return response()->json(['status' => true]);
		} catch ( Exception $e )
		{
			$this->log->error('Error Store FormVisit: ' . $e->getMessage());
			DB::rollBack();

			return response()->json(['status' => false, 'message' => 'Hubo un error en el servidor. Comunique con personal especializado.']);
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Controlqtime\Http\Requests\FormVisitRequest $request
	 * @param string $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(FormVisitRequest $request, $id)
	{
		DB::beginTransaction();

		try
		{
			$visit = $this->visit->findOrFail($id);
			$visit->formVisit->update($request->all());
			if ( $this->activateVisit->checkStateVisit($visit) )
			{
				Mail::to($visit->user)->send(new VisitCompleteForm($visit));
			}
			DB::commit();

			return response()->json(['status' => true, 'url' => '/']);
		} catch ( Exception $e )
		{
			$this->log->error('Error Update FormVisit: ' . $e->getMessage());
			DB::rollBack();

			return response()->json(['status' => false, 'message' => 'Hubo un error en el servidor. Comunique con personal especializado.']);
		}
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function addImages()
	{
		$save = new ImageFactory(request('visit_id'), 'visit/', request('repo_id'), request('type'), request('file_data'), null, request('subClass'));

		if ( $save )
		{
			// $this->activateEmployee->checkStateUpdateEmployee(request('employee_id'));

			return response()->json(['status' => true]);
		}

		return response()->json(['status' => false]);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deleteImages()
	{
		$destroy = new ImageFactory(request('key'), 'visit/', null, request('type'), null, request('path'));

		if ( $destroy )
		{
			// $this->activateEmployee->checkStateUpdateEmployee(request('id'));

			return response()->json(['status' => true]);
		}

		return response()->json(['status' => false]);
	}
}
