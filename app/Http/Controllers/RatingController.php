<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\BaseRepoInterface;
use Illuminate\Support\Facades\Session;
use Controlqtime\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    protected $rating;

    public function __construct(BaseRepoInterface $rating)
    {
        $this->rating = $rating;
    }

    public function index()
    {
        $ratings = $this->rating->all();
        return view('maintainers.ratings.index', compact('ratings'));
    }

    public function create()
    {
        return view('maintainers.ratings.create');
    }

    public function store(RatingRequest $request)
    {
        $this->rating->create($request->all());
        Session::flash('success', 'El registro fue almacenado satisfactoriamente.');
        return redirect()->route('maintainers.ratings.index');
    }

    public function edit($id)
    {
        $rating = $this->rating->find($id);
        return view('maintainers.ratings.edit', compact('rating'));
    }

    public function update(RatingRequest $request, $id)
    {
        $this->rating->update($request->all(), $id);
        Session::flash('success', 'El registro ha sido actualizado satisfactoriamente.');
        return redirect()->route('maintainers.ratings.index');
    }

    public function destroy($id)
    {
        $this->rating->delete($id);
        Session::flash('success', 'El registro fue eliminado satisfactoriamente.');
        return redirect()->route('maintainers.ratings.index');
    }
}
