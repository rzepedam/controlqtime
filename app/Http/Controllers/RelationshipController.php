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
        return view('maintainers.relationships.index');
    }

    public function getRelationships()
    {
        $relationships = $this->relationship->all();
        return $relationships;
    }

    public function create()
    {
        return view('maintainers.relationships.create');
    }

    public function store(RelationshipRequest $request)
    {
        $this->relationship->create($request->all());

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/relationships'
		));
    }

    public function edit($id)
    {
        $relationship = $this->relationship->find($id);
        return view('maintainers.relationships.edit', compact('relationship'));
    }

    public function update(RelationshipRequest $request, $id)
    {
        $this->relationship->update($request->all(), $id);

		return response()->json(array(
			'success' => true,
			'url'     => '/maintainers/relationships'
		));
    }

    public function destroy($id)
    {
        $this->relationship->delete($id);
        return redirect()->route('maintainers.relationships.index');
    }
}
