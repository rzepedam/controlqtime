<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Controlqtime\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $role;

    public function __construct(BaseRepoInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('maintainers.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('maintainers.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->role->create($request->all());
        return redirect()->route('maintainers.roles.index');
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        return view('maintainers.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->role->update($request->all(), $id);
        return redirect()->route('maintainers.roles.index');
    }

    public function destroy($id)
    {
        $this->role->delete($id);
        return redirect()->route('maintainers.roles.index');
    }
}
