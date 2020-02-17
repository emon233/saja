<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Instructions;

use Illuminate\Http\Request;

class InstructionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }

    public function index()
    {
        $instructions = Instructions::find(1);

        return view('instructions.index', compact('instructions'));
    }

    public function update(Request $request, Instructions $instructions)
    {
        $data = $request->all();

        $instructions->update($data);

        Session::flash('success', '*** Instructions Updated Successfully ***');
        return redirect()->back();
    }
}
