<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\User;

use App\Models\Paper;
use App\Models\Forward;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('download');
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
            $accepted = count(Paper::where('status', config('appConstants.status.accepted'))->get());
            $rejected = count(Paper::where('status', config('appConstants.status.rejected'))->get());
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
                    'accepted',
                    'rejected',
                    'processing',
                    'published'
                )
            );
        } elseif ($role == "Reviewer") {
            $all = count(Forward::where('reviewer_id', auth()->id())->get());
            $new = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.forwarded')]])->get());
            $accepted = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.accepted')]])->get());
            $rejected = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.rejected')]])->get());
            $reviewed = count(Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.reviewed')]])->get());
            return view(
                'dashboards.reviewer',
                compact('all', 'new', 'accepted', 'rejected', 'reviewed')
            );
        } else {
            Session::put('role', 'Author');

            $submitted = count(Paper::where('user_id', Auth::id())->get());
            $reviewing = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.reviewing')]])->get());
            $reviewed = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.reviewed')]])->get());
            $revisioned = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.revisioned')]])->get());
            $processing = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.processing')]])->get());
            $published = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.published')]])->get());
            $accepted = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.accepted')]])->get());
            $rejected = count(Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.rejected')]])->get());
            return view(
                'dashboards.author',
                compact('submitted', 'reviewing', 'reviewed', 'revisioned', 'processing', 'published', 'accepted', 'rejected')
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

    /**
     * Update User's Profile
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'affiliation' => 'nullable|string|max:150',
            'specialization' => 'nullable|string|max:250',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'required|string|max:20',
        ]);

        $data = $request->all();

        $user->update($data);

        Session::flash('success', "*** Your Profile been Updated ***");
        return redirect()->back();
    }

    /**
     * Update Password Method
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();
        $user = User::find(auth()->id());

        $user->password = Hash::make($data['password']);
        $user->save();

        Session::flash('success', '*** Password Updated Successfully ***');
        return redirect()->back();
    }

    /**
     * Download Files from Storage
     *
     * @param [type] $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function download($fileName)
    {
        return response()->download(storage_path("app/public/{$fileName}"));
    }
}
