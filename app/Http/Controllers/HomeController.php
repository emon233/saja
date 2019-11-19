<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\User;

use App\Models\Paper;
use App\Models\Forward;

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
            $all = count(Paper::all());
            $new = count(Paper::where('status', config('appConstants.status.new'))->get());
            return view(
                'dashboards.editor',
                compact('all', 'new')
            );
        } elseif ($role == "Reviewer") {
            $forwards = count(Forward::where('reviewer_id', auth()->id()));
            return view(
                'dashboards.reviewer',
                compact('forwards')
            );
        } elseif ($role == "Author") {
            $submitted = count(Paper::where('user_id', Auth::id())->get());
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
