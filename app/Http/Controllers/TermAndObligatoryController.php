<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TermAndObligatoryRequest;
use Controlqtime\Core\Contracts\TermAndObligatoryRepoInterface;

class TermAndObligatoryController extends Controller
{
    /**
     * @var TermAndObligatoryRepoInterface
     */
    protected $termAndObligatory;

    /**
     * TermAndObligatoryController constructor.
     * @param TermAndObligatoryRepoInterface $termAndObligatory
     */
    public function __construct(TermAndObligatoryRepoInterface $termAndObligatory)
    {
        $this->termAndObligatory = $termAndObligatory;
    }

    /**
     * @return mixed for Bootstrap Table
     */
    public function getTermsAndObligatories()
    {
        $termAndObligatories = $this->termAndObligatory->all();

        return $termAndObligatories;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.terms-and-obligatories.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.terms-and-obligatories.create');
    }

    /**
     * @param TermAndObligatoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TermAndObligatoryRequest $request)
    {
        $this->termAndObligatory->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/terms-and-obligatories'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $termAndObligatory = $this->termAndObligatory->find($id);

        return view('maintainers.terms-and-obligatories.edit', compact('termAndObligatory'));
    }

    /**
     * @param TermAndObligatoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TermAndObligatoryRequest $request, $id)
    {
        // Al estar desactivado el elemento "predeterminado", no envía nada al Backend.
        // Es necesario agregar su comportamiento manualmente para su correcta actualización.
        $data = $request->all();

        if (! array_key_exists('act', $data))
            $data['act'] = false;

        $this->termAndObligatory->update($data, $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/terms-and-obligatories'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->termAndObligatory->delete($id);

        return redirect()->route('terms-and-obligatories.index');
    }
}
