<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Http\Requests\TypeContractRequest;
use Exception;
use Illuminate\Log\Writer as Log;

class TypeContractController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var TypeContract
     */
    protected $typeContract;

    /**
     * TypeContractController constructor.
     *
     * @param Log          $log
     * @param TypeContract $typeContract
     */
    public function __construct(Log $log, TypeContract $typeContract)
    {
        $this->log = $log;
        $this->typeContract = $typeContract;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-contracts.index');
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getTypeContracts()
    {
        $typeContracts = $this->typeContract->all();

        return $typeContracts;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-contracts.create');
    }

    /**
     * @param TypeContractRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TypeContractRequest $request)
    {
        try {
            if (!$this->restore($request)) {
                $this->typeContract->create($request->all());
            }

            session()->flash('success', 'El registro fue almacenado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/type-contracts']);
        } catch (Exception $e) {
            $this->log->error('Error Store TypeContract: '.$e->getMessage());

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
            $numHour = $this->typeContract->onlyTrashed()->where('name', $request->get('name'))->where('dur', $request->get('dur'))->firstOrFail();

            return $numHour->restore();
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
        $typeContract = $this->typeContract->findOrFail($id);

        return view('maintainers.type-contracts.edit', compact('typeContract'));
    }

    /**
     * @param TypeContractRequest $request
     * @param                     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TypeContractRequest $request, $id)
    {
        try {
            $typeContract = $this->typeContract->findOrFail($id);
            $typeContract->update($request->all());
            session()->flash('success', 'El registro fue actualizado satisfactoriamente.');

            return response()->json(['status' => true, 'url' => '/maintainers/type-contracts']);
        } catch (Exception $e) {
            $this->log->error('Error Update TypeContract: '.$e->getMessage());

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
            $this->typeContract->destroy($id);
            session()->flash('success', 'El registro fue eliminado satisfactoriamente.');

            return redirect()->route('type-contracts.index');
        } catch (Exception $e) {
            $this->log->error('Error Delete TypeContract: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
