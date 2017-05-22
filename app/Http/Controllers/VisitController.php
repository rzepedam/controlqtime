<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Mail\VisitRegister;
use Illuminate\Support\Facades\Mail;
use Controlqtime\Core\Entities\Image;
use Controlqtime\Core\Entities\Visit;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\TypeVisit;
use Controlqtime\Core\Factory\ImageFactory;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\ActivateVisit;

class VisitController extends Controller
{
    /**
     * @var ActivateVisit
     */
    protected $activateVisit;

    /**
     * @var string
     */
    private $baseUrl = '/form-visits/';

    /**
     * @var Employee
     */
    protected $employee;

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
     * @var Visit
     */
    protected $visit;

    /**
     * @var  TypeVisit
     */
    protected $typeVisit;

    /**
     * VisitController constructor.
     *
     * @param ActivateVisit $activateVisit
     * @param Employee $employee
     * @param Image $image
     * @param Log $log
     * @param Relationship $relationship
     * @param TypeVisit $typeVisit
     * @param Visit $visit
     */
    public function __construct(ActivateVisit $activateVisit, Employee $employee, Image $image, Log $log,
        Relationship $relationship, TypeVisit $typeVisit, Visit $visit)
    {
        $this->activateVisit = $activateVisit;
        $this->employee      = $employee;
        $this->image         = $image;
        $this->log           = $log;
        $this->relationship  = $relationship;
        $this->typeVisit     = $typeVisit;
        $this->visit         = $visit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sign-in-visits.visits.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getVisits()
    {
        $visits = $this->visit
                    ->with(['typeVisit'])
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return $visits;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
            $typeVisits = $this->typeVisit->pluck('name', 'id');
            $employees  = $this->employee->enabled()->pluck('full_name', 'id');
        } catch (\Exception $e)
        {
            $this->log->error('Error create Visit: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');

            return response()->json(['status' => false, 'url' => '/sign-in-visits/visits']);
        }

        return view('sign-in-visits.visits.create', compact(
            'employees', 'typeVisits'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Add Url, key and current user field for generate form in email
        request()->request->add([
            'url' => $this->baseUrl, 
            'key' => Str::random(10), 
            'user_id' => auth()->id()        
        ]);

        DB::beginTransaction();

        try
        {
            $visit = $this->visit->create(request()->all());
            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
            DB::commit();
            Mail::to($visit)->send(new VisitRegister($visit));

            return response()->json(['status' => true, 'url' => '/sign-in-visits/visits']);
        } catch ( Exception $e )
        {
            $this->log->error('Error Store Visit: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
            DB::rollBack();

            return response()->json(['status' => false, 'url' => '/sign-in-visits/visits']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $visit = $this->visit->with(['typeVisit'])->findOrFail($id);

            return view('sign-in-visits.visits.show', compact('visit'));
        } catch ( Exception $e )
        {
            $this->log->error('Error Store Visit: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');

            return response()->json(['status' => false, 'url' => '/sign-in-visits/visits']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relationships = $this->relationship->pluck('name', 'id');
        $visit         = $this->visit->findOrFail($id);

        return view('sign-in-visits.visits.edit', compact(
            'relationships', 'signInVisit'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try
        {
            $visit = $this->visit->findOrFail($id);
            $visit->update($request->all());
            $visit->contactsable->update($request->all());
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');
            DB::commit();

            return response()->json(['status' => true, 'url' => 'sign-in-visits/visits']);
        } catch ( Exception $e )
        {
            $this->log->error('Error Update Visit: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->image->findOrFail($id)->delete();

        return back();
    }

    public function createVisitForm()
    {
        dd('...');
    }

    public function addPhotos($id, Request $request)
    {
        $this->validate($request, [
            'file' => ['required'], ['mimes:jpg,jpeg,png,bmp'],
        ]);

        DB::beginTransaction();

        try
        {
            $save = new ImageFactory($id, 'visit/', '', 'Visit', $request->file('file'), null, '');
            if ( $save )
            {
                $visit = $this->visit->findOrFail($id);
                $this->activateVisit->saveStateEnableVisit($visit);
                DB::commit();

                return response()->json(['status' => true]);
            }
        } catch ( Exception $e )
        {
            $this->log->error('Error AddPhotos Visit: ' . $e->getMessage());
            session()->flash('error', 'Hubo un error en el servidor. Comunique con personal especializado.');
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }
}
