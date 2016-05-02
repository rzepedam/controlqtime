<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\RelationshipRepoInterface;
use Controlqtime\Http\Requests;
use Controlqtime\Http\Requests\RelationshipRequest;

class RelationshipController extends Controller
{
    private $relationship;

    public function __construct(RelationshipRepoInterface $relationship)
    {
        $this->relationship = $relationship;
    }

    public function index()
    {
        $relationships = $this->relationship->all();
        return view('maintainers.relationships.index', compact('relationships'));
    }

    public function create()
    {
        return view('maintainers.relationships.create');
    }

    public function store(RelationshipRequest $request)
    {
        $this->relationship->create($request->all());
        return redirect()->route('maintainers.relationships.index');
    }

    public function edit($id)
    {
        $relationship = $this->relationship->find($id);
        return view('maintainers.relationships.edit', compact('relationship'));
    }

    public function update(RelationshipRequest $request, $id)
    {
        $this->relationship->update($request->all(), $id);
        return redirect()->route('maintainers.relationships.index');
    }

    public function destroy($id)
    {
        $this->relationship->delete($id);
        return redirect()->route('maintainers.relationships.index');
    }
}
