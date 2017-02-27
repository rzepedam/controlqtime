<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Http\Requests\TypeCertificationRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class TypeCertificationController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var TypeCertification
     */
    protected $typeCertification;

    /**
     * TypeCertificationController constructor.
     *
     * @param Log               $log
     * @param TypeCertification $typeCertification
     */
    public function __construct(Log $log, TypeCertification $typeCertification)
    {
        $this->log = $log;
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeCertificationRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->typeCertification->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/type-certifications']);
        } catch (Exception $e) {
            $this->log->error('Error Store TypeCertification: '.$e->getMessage());

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
        try {
            $typeCertification = $this->typeCertification->onlyTrashed()->where('name', $request->get('name'))->firstOrFail();

            return $typeCertification->restore();
        } catch (Exception $e) {
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
        $typeCertification = $this->typeCertification->findOrFail($id);

        return view('maintainers.type-certifications.edit', compact('typeCertification'));
    }

    /**
     * @param TypeCertificationRequest $request
     * @param                          $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeCertificationRequest $request, $id)
    {
        try {
            $this->typeCertification->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/type-certifications']);
        } catch (Exception $e) {
            $this->log->error('Error Update TypeCertification: '.$e->getMessage());

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
        try {
            $this->typeCertification->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('type-certifications.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete TypeCertification: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
