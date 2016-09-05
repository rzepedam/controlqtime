<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\TypeContractRepoInterface;
use Controlqtime\Http\Requests\TypeContractRequest;

class TypeContractController extends Controller
{
	/**
	 * @var TypeContractRepoInterface
	 */
	protected $typeContract;

	/**
	 * TypeContractController constructor.
	 * @param TypeContractRepoInterface $typeContract
	 */
	public function __construct(TypeContractRepoInterface $typeContract)
	{
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
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(TypeContractRequest $request)
    {
        $this->typeContract->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-contracts'
		));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
    {
        $typeContract = $this->typeContract->find($id);
		return view('maintainers.type-contracts.edit', compact('typeContract'));
    }

	/**
	 * @param TypeContractRequest $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(TypeContractRequest $request, $id)
    {
		$this->typeContract->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/type-contracts'
		));
    }

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
    {
        $this->typeContract->delete($id);
		return redirect()->route('maintainers.type-contracts.index');
    }
}
