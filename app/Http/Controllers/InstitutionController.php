<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeInstitution;
use Controlqtime\Http\Requests\InstitutionRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class InstitutionController extends Controller
{
    /**
     * @var Institution
     */
    protected $institution;

    /**
     * @var Log
     */
    protected $log;

    /**
     * @var TypeInstitution
     */
    protected $type_institution;

    /**
     * InstitutionController constructor.
     *
     * @param Institution     $institution
     * @param Log             $log
     * @param TypeInstitution $type_institution
     */
    public function __construct(Institution $institution, Log $log, TypeInstitution $type_institution)
    {
        $this->institution = $institution;
        $this->log = $log;
        $this->type_institution = $type_institution;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.institutions.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getInstitutions()
    {
        $institutions = $this->institution->with(['typeInstitution'])->get();

        return $institutions;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $type_institutions = $this->type_institution->pluck('name', 'id');

        return view('maintainers.institutions.create', compact('type_institutions'));
    }

    /**
     * @param InstitutionRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InstitutionRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->institution->create($request->all());
            }
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/institutions']);
        } catch (Exception $e) {
            $this->log->error('Error Store Institution: '.$e->getMessage());

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
            $institution = $this->institution->onlyTrashed()->where('name', $request->get('name'))->where('type_institution_id', $request->get('type_institution_id'))->firstOrFail();

            return $institution->restore();
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
        $institution = $this->institution->findOrFail($id);
        $type_institutions = $this->type_institution->pluck('name', 'id');

        return view('maintainers.institutions.edit', compact('institution', 'type_institutions'));
    }

    /**
     * @param InstitutionRequest $request
     * @param                    $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InstitutionRequest $request, $id)
    {
        try {
            $this->institution->findOrFail($id)->fill($request->all())->saveOrFail();
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/institutions']);
        } catch (Exception $e) {
            $this->log->error('Error Update Institution: '.$e->getMessage());

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
            $this->institution->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('institutions.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete Institution: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
