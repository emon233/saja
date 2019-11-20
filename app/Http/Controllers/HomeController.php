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
            $reviewing = count(Paper::where('status', config('appConstants.status.reviewing'))->get());
            $reviewed = count(Paper::where('status', config('appConstants.status.reviewed'))->get());
            $revisioning = count(Paper::where('status', config('appConstants.status.revisioning'))->get());
            $revisioned = count(Paper::where('status', config('appConstants.status.revisioned'))->get());
            $processing = count(Paper::where('status', config('appConstants.status.processing'))->get());
            $published = count(Paper::where('status', config('appConstants.status.published'))->get());
            return view(
                'dashboards.editor',
                compact(
                    'all',
                    'new',
                    'reviewing',
                    'reviewed',
                    'revisioning',
                    'revisioned',
                    'processing',
                    'published'
                )
            );
        } elseif ($role == "Reviewer") {
            $all = count(Forward::where('reviewer_id', auth()->id())->get());
            $new = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.new')]])->get());
            $accepted = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.accepted')]])->get());
            $rejected = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.rejected')]])->get());
            $reviewed = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.reviewed')]])->get());
            return view(
                'dashboards.reviewer',
                compact('all', 'new', 'accepted', 'rejected', 'reviewed')
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
