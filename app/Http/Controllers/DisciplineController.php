<?php

namespace App\Http\Controllers;

use App\Models\Discipline;

use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:100|unique:disciplines',
        ]);
    }

    public function index()
    {
        $disciplines = Discipline::all();

        return view(
            'disciplines.index',
            compact('disciplines')
        );
    }

    public function index_active()
    {
        $disciplines = Discipline::where('status', 1)->get();

        return response()->json($disciplines, 201);
    }

    public function index_inactive()
    {
        $disciplines = Discipline::where('status', 0)->get();

        return response()->json($disciplines, 201);
    }

    public function create()
    {
        return view(
            'disciplines.create'
        );
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $discipline = Discipline::create($request->all());

        return redirect()->route('disciplines.index');
    }

    public function edit(Discipline $discipline)
    {
        return view(
            'disciplines.edit',
            compact('discipline')
        );
    }

    public function update(Request $request, Discipline $discipline)
    {
        $this->validation($request);

        $discipline->update($request->all());

        return redirect()->route('disciplines.index');
    }

    public function activation(Discipline $discipline)
    {
        $discipline->status = 1;
        $discipline->save();

        return redirect()->back();
    }

    public function deactivation(Discipline $discipline)
    {
        $discipline->status = 0;
        $discipline->save();

        return redirect()->back();
    }

    public function destroy(Discipline $discipline)
    {
        $discipline->delete();

        return redirect()->route('disciplines.index');
    }
}
