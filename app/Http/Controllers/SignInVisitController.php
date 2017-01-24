<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Image;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\SignInVisit;
use Controlqtime\Http\Requests\SignInVisitRequest;

class SignInVisitController extends Controller
{
	/**
	 * @var Image
	 */
	protected $image;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var SignInVisit
	 */
	protected $signInVisit;
	
	/**
	 * SignInVisitController constructor.
	 *
	 * @param Image       $image
	 * @param Log         $log
	 * @param SignInVisit $signInVisit
	 */
	public function __construct(Image $image, Log $log, SignInVisit $signInVisit)
	{
		$this->image       = $image;
		$this->log         = $log;
		$this->signInVisit = $signInVisit;
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
		return view('visits.sign-in-visits.create');
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
		try
		{
			$this->signInVisit->create($request->all());
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/visits/sign-in-visits']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store SignInVisit: " . $e->getMessage());
			session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
			
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
		$signInVisit = $this->signInVisit->findOrFail($id);
		
		return view('visits.sign-in-visits.edit', compact('signInVisit'));
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
		try
		{
			$this->signInVisit->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/visits/sign-in-visits']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update SignInVisit: " . $e->getMessage());
			
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
		
		$save = new ImageFactory($id, 'visit/', '', 'SignInVisit', $request->file('file'), null, '');
		
		if ( $save )
		{
			return response()->json([
				'status' => true
			]);
		}
	}
}
