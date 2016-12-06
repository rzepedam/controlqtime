<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Http\Requests\TypeDisabilityRequest;

class TypeDisabilityController extends Controller
{
	/**
	 * @var TypeDisability
	 */
	protected $typeDisability;
	
	/**
	 * TypeDisabilityController constructor.
	 *
	 * @param TypeDisability $typeDisability
	 */
	public function __construct(TypeDisability $typeDisability)
    {
        $this->typeDisability = $typeDisability;
    }
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('maintainers.type-disabilities.index');
	}
	
    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeDisabilities()
    {
	    $type_disabilities = $this->typeDisability->all();
	
	    return $type_disabilities;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-disabilities.create');
    }

    /**
     * @param TypeDisabilityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeDisabilityRequest $request)
    {
	    if ( ! $this->restore($request) )
	    {
		    $this->typeDisability->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-disabilities'
        ]);
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
			$typeDisability = $this->typeDisability->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeDisability->restore();
		} catch ( Exception $e )
		{
			return false;
		}
	}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $typeDisability = $this->typeDisability->findOrFail($id);

        return view('maintainers.type-disabilities.edit', compact('typeDisability'));
    }

    /**
     * @param TypeDisabilityRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeDisabilityRequest $request, $id)
    {
	    try
	    {
		    $this->typeDisability->findOrFail($id)->fill($request->all())->saveOrFail();
		    session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
		
		    return response()->json([
			    'success' => true,
			    'url'     => '/maintainers/type-disabilities'
		    ]);
	    } catch ( Exception $e )
	    {
		    return response()->json(['success' => false]);
	    }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->typeDisability->destroy($id);

        return redirect()->route('type-disabilities.index');
    }
}
