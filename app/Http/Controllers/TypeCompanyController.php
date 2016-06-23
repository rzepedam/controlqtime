<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Http\Requests\TypeCompanyRequest;
use Illuminate\Http\Request;

use Controlqtime\Http\Requests;

class TypeCompanyController extends Controller
{
    protected $type_company;

    public function __construct(TypeCompanyRepoInterface $type_company)
    {
        $this->type_company = $type_company;
    }
    
    public function index()
    {
    	return view('maintainers.type-companies.index');
    }

	public function getTypeCompanies()
	{
		$type_companies = $this->type_company->all();
		return $type_companies;
	}

    public function create()
    {
        return view('maintainers.type-companies.create');
    }

    public function store(TypeCompanyRequest $request)
    {
        $this->type_company->create($request->all());
		return redirect()->route('maintainers.type-companies.index');
    }

    public function edit($id)
    {
		$type_company = $this->type_company->find($id);
		return view('maintainers.type-companies.edit', compact('type_company'));
    }

    public function update(TypeCompanyRequest $request, $id)
    {
		$this->type_company->update($request->all(), $id);
		return redirect()->route('maintainers.type-companies.index');
    }

    public function destroy($id)
    {
		$this->type_company->delete($id);
		return redirect()->route('maintainers.type-companies.index');
    }
}
