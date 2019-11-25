<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Editor;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Contructor for EditorController
     */
    public function __construct()
    {
        $this->middleware('editor');
    }

    /**
     * All Editors List
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editors = Editor::where('status', 1)->get();

        foreach ($editors as $editor) {
            $array[] = $editor->user_id;
        }
        $title = config('appConstants.titles.editor_editors');
        $users = [];
        if (!empty($array)) {
            $users = User::whereIn('id', $array)->get();
        }

        return view('users.index', compact('users', 'title'));
    }
}
