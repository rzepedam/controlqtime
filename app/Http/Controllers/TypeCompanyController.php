<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Http\Requests\TypeCompanyRequest;
use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;

class TypeCompanyController extends Controller
{
    /**
     * @var TypeCompanyRepoInterface
     */
    protected $type_company;

    /**
     * TypeCompanyController constructor.
     * @param TypeCompanyRepoInterface $type_company
     */
    public function __construct(TypeCompanyRepoInterface $type_company)
    {
        $this->type_company = $type_company;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('maintainers.type-companies.index');
    }

    /**
     * @return mixed for Bootstrap-Table
     */
    public function getTypeCompanies()
    {
        $type_companies = $this->type_company->all();

        return $type_companies;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('maintainers.type-companies.create');
    }

    /**
     * @param TypeCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeCompanyRequest $request)
    {
        $this->type_company->create($request->all());

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-companies'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $type_company = $this->type_company->find($id);

        return view('maintainers.type-companies.edit', compact('type_company'));
    }

    /**
     * @param TypeCompanyRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeCompanyRequest $request, $id)
    {
        $this->type_company->update($request->all(), $id);

        return response()->json([
            'success' => true,
            'url'     => '/maintainers/type-companies'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->type_company->delete($id);

        return redirect()->route('type-companies.index');
    }
}
