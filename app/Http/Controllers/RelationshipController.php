<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;

use Controlqtime\Http\Requests\RelationshipRequest;
use Controlqtime\Relationship;

class RelationshipController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $relationships = Relationship::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.relationships.index', compact('relationships'));
    }


    /**
     * @return mixed
     */
    public function create()
    {
        return view('maintainers.relationships.create');
    }


    /**
     * @param RelationshipRequest $request
     * @return mixed
     */
    public function store(RelationshipRequest $request)
    {
        Relationship::create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.relationships.index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $relationship = Relationship::findOrFail($id);
        return view('maintainers.relationships.edit', compact('relationship'));
    }


    /**
     * @param RelationshipRequest $request
     * @param $id
     * @return mixed
     */
    public function update(RelationshipRequest $request, $id)
    {
        $relationship = Relationship::findOrFail($id);
        $message = 'El registro ' . $relationship->name . ' fue actualizado satisfactoriamente.';
        $relationship->fill($request->all());
        $relationship->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.relationships.index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $relationship = Relationship::findOrFail($id);
        $relationship->delete();
        Session::flash('success', 'El registro ' . $relationship->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.relationships.index');
    }
}
