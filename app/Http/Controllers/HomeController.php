<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\User;

use App\Models\Paper;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Session::get('role');

        if ($role == "Editor") {
            return view('dashboards.editor');
        } elseif ($role == "Reviewer") {
            return view('dashboards.reviewer');
        } elseif ($role == "Author") {
            $submitted = Paper::where('user_id', Auth::id())->get();
            $submitted = count($submitted);
            return view(
                'dashboards.author',
                compact('submitted')
            );
        }
    }

    /**
     * Show a Authenticated User's Profile
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = User::find(Auth::id());

        return view('auth.profile', compact('user'));
    }
}
