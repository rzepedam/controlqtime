<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;

use Controlqtime\Http\Requests;
use Illuminate\Support\Facades\Session;
use Controlqtime\Rating;
use Controlqtime\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $ratings = Rating::name($request->get('table_search'))->orderBy('name')->paginate(20);
        return view('maintainers.ratings.index', compact('ratings'));
    }

    public function create()
    {
        return view('maintainers.ratings.create');
    }

    public function store(RatingRequest $request)
    {
        Rating::create($request->all());

        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.ratings.index');
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id);
        return view('maintainers.ratings.edit', compact('rating'));
    }

    public function update(RatingRequest $request, $id)
    {
        $rating = Rating::findOrFail($id);
        $message =  'El registro ' . $rating->name . ' ha sido actualizado satisfactoriamente.';
        $rating->fill($request->all());
        $rating->save();
        Session::flash('success', $message);
        return redirect()->route('maintainers.ratings.index');
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        Session::flash('success', 'El registro ' . $rating->name . ' fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.ratings.index');
    }
}
