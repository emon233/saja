<?php

namespace App\Http\Controllers;

use App\Models\Type;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:100|unique:types',
        ]);
    }

    public function index()
    {
        $types = Type::all();

        return view(
            'types.index',
            compact('types')
        );
    }

    public function create()
    {
        return view(
            'types.create'
        );
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $type = Type::create($request->all());

        return redirect()->route('types.index');
    }

    public function edit(Type $type)
    {
        return view(
            'types.edit',
            compact('type')
        );
    }

    public function update(Request $request, Type $type)
    {
        $this->validation($request);

        $type->update($request->all());

        return redirect()->route('types.index');
    }

    public function activation(Type $type)
    {
        $type->status = 1;
        $type->save();

        return redirect()->back();
    }

    public function deactivation(Type $type)
    {
        $type->status = 0;
        $type->save();

        return redirect()->back();
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types.index');
    }
}
