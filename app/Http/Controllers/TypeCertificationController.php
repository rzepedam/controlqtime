<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Http\Requests\TypeCertificationRequest;

class TypeCertificationController extends Controller
{
	/**
	 * @var TypeCertification
	 */
	protected $typeCertification;
	
	/**
	 * TypeCertificationController constructor.
	 *
	 * @param TypeCertification $typeCertification
	 */
	public function __construct(TypeCertification $typeCertification)
    {
        $this->typeCertification = $typeCertification;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-certifications.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeCertifications()
    {
        $typeCertifications = $this->typeCertification->all();

        return $typeCertifications;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-certifications.create');
    }

    /**
     * @param TypeCertificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeCertificationRequest $request)
    {
	    if ( ! $this->restore($request) )
	    {
		    $this->typeCertification->create($request->all());
	    }

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-certifications'
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
			$typeCertification = $this->typeCertification->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();
			
			return $typeCertification->restore();
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
        $typeCertification = $this->typeCertification->findOrFail($id);

        return view('maintainers.type-certifications.edit', compact('typeCertification'));
    }

    /**
     * @param TypeCertificationRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeCertificationRequest $request, $id)
    {
	    try
	    {
		    $this->typeCertification->findOrFail($id)->fill($request->all())->saveOrFail();
		    session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
		
		    return response()->json([
			    'success' => true,
			    'url'     => '/maintainers/type-certifications'
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
        $this->typeCertification->destroy($id);

        return redirect()->route('type-certifications.index');
    }
}
