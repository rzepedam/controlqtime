<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Image;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\SignInVisit;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\ActivateVisit;
use Controlqtime\Http\Requests\SignInVisitRequest;

class SignInVisitController extends Controller
{
	/**
	 * @var ActivateVisit
	 */
	protected $activateVisit;
	
	/**
	 * @var Image
	 */
	protected $image;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Relationship
	 */
	protected $relationship;
	
	/**
	 * @var SignInVisit
	 */
	protected $signInVisit;
	
	/**
	 * SignInVisitController constructor.
	 *
	 * @param ActivateVisit $activateVisit
	 * @param Image         $image
	 * @param Log           $log
	 * @param Relationship  $relationship
	 * @param SignInVisit   $signInVisit
	 */
	public function __construct(ActivateVisit $activateVisit, Image $image, Log $log,
		Relationship $relationship, SignInVisit $signInVisit)
	{
		$this->activateVisit = $activateVisit;
		$this->image         = $image;
		$this->log           = $log;
		$this->relationship  = $relationship;
		$this->signInVisit   = $signInVisit;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('visits.sign-in-visits.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getSignInVisits()
	{
		$signInVisits = $this->signInVisit->all();
		
		return $signInVisits;
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$relationships = $this->relationship->pluck('name', 'id');
		
		return view('visits.sign-in-visits.create', compact('relationships'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param SignInVisitRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(SignInVisitRequest $request)
	{
		DB::beginTransaction();
		
		try
		{
			$signInVisit = $this->signInVisit->create($request->all());
			$signInVisit->contactsable()->create($request->all());
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/visits/sign-in-visits']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store SignInVisit: " . $e->getMessage());
			session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
			DB::rollBack();
			
			return response()->json(['status' => false, 'url' => '/visits/sign-in-visits']);
		}
		
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$signInVisit = $this->signInVisit->findOrFail($id);
		
		return view('visits.sign-in-visits.show', compact('signInVisit'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$relationships = $this->relationship->pluck('name', 'id');
		$signInVisit   = $this->signInVisit->findOrFail($id);
		
		return view('visits.sign-in-visits.edit', compact(
			'relationships', 'signInVisit'
		));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		DB::beginTransaction();
		
		try
		{
			$signInVisit = $this->signInVisit->findOrFail($id);
			$signInVisit->update($request->all());
			$signInVisit->contactsable->update($request->all());
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/visits/sign-in-visits']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update SignInVisit: " . $e->getMessage());
			session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
			DB::rollBack();
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->image->findOrFail($id)->delete();
		
		return back();
	}
	
	public function addPhotos($id, Request $request)
	{
		$this->validate($request, [
			'file' => ['required'], ['mimes:jpg,jpeg,png,bmp']
		]);
		
		DB::beginTransaction();
		
		try
		{
			$save = new ImageFactory($id, 'visit/', '', 'SignInVisit', $request->file('file'), null, '');
			if ( $save )
			{
				$visit = $this->signInVisit->findOrFail($id);
				$this->activateVisit->saveStateEnableVisit($visit);
				DB::commit();
				
				return response()->json(['status' => true]);
			}
		} catch ( Exception $e )
		{
			$this->log->error("Error AddPhotos SignInVisit: " . $e->getMessage());
			session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
			DB::rollBack();
			
			return response()->json(['status' => false]);
		}
	}
}
