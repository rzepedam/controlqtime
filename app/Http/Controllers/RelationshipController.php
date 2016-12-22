<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Http\Requests\RelationshipRequest;

class RelationshipController extends Controller
{
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var Relationship
	 */
	protected $relationship;
	
	/**
	 * RelationshipController constructor.
	 *
	 * @param Log          $log
	 * @param Relationship $relationship
	 */
	public function __construct(Log $log, Relationship $relationship)
	{
		$this->log          = $log;
		$this->relationship = $relationship;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.relationships.index');
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getRelationships()
	{
		$relationships = $this->relationship->all();
		
		return $relationships;
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('maintainers.relationships.create');
	}
	
	/**
	 * @param RelationshipRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(RelationshipRequest $request)
	{
		try
		{
			if ( ! $this->restore($request) )
			{
				$this->relationship->create($request->all());
			}
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/relationships']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Store Relationship: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $request
	 *
	 * @return bool
	 */
	public function restore($request)
	{
		try
		{
			$relationship = $this->relationship->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $relationship->restore();
		} catch ( Exception $e )
		{
			return false;
		}
		
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$relationship = $this->relationship->findOrFail($id);
		
		return view('maintainers.relationships.edit', compact('relationship'));
	}
	
	/**
	 * @param RelationshipRequest $request
	 * @param                     $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(RelationshipRequest $request, $id)
	{
		try
		{
			$this->relationship->findOrFail($id)->fill($request->all())->saveOrFail();
			session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
			
			return response()->json(['status' => true, 'url' => '/maintainers/relationships']);
		} catch ( Exception $e )
		{
			$this->log->error("Error Update Relationship: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		try
		{
			$this->relationship->destroy($id);
			session()->flash('success', 'El registro fue eliminado satisfactoriamente.');
			
			return redirect()->route('relationships.index');
		} catch ( Exception $e )
		{
			$this->log->error("Error Delete Relationship: " . $e->getMessage());
			
			return response()->json(['status' => false]);
		}
	}
}
