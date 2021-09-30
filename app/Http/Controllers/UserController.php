<?php

namespace App\Http\Controllers;

use Session;

use App\User;
use App\Models\Editor;
use App\Models\Reviewer;

use App\Mail\ReviewerAccepted;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Constructor for UserController
     */
    public function __construct()
    {
        $this->middleware('editor');
    }

    /**
     * All Users Index
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $title = config('appConstants.titles.editor_users');

        return view('users.index', compact('users', 'title'));
    }

    /**
     * Individual User's Profile
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function profile(User $user)
    {
        return view('users.profile', compact('user'));
    }

    /**
     * Make an User Reviewer
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeReviewer(User $user)
    {
        $reviewer = Reviewer::where('user_id', $user->id)->first();

        if (!empty($reviewer)) {
            $reviewer->status = 1;
            $reviewer->save();
        } else {
            $reviewer = Reviewer::create([
                'user_id' => $user->id,
                'status' => 1
            ]);
        }

        Mail::to($user)->send(new ReviewerAccepted($user));

        Session::flash('success', '*** User Added to Reviewer Panel Successfully ***');
        return redirect()->route('users.editors.profile', $user->id);
    }

    /**
     * Remove User from Reviewer Panel
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeReviewer(User $user)
    {
        $reviewer = Reviewer::where('user_id', $user->id)->first();

        $reviewer->delete();

        Session::flash('success', '*** User Successfully Removed from Reviewer Panel ***');
        return redirect()->route('users.editors.profile', $user->id);
    }

    /**
     * Make an User Editor
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeEditor(User $user)
    {
        $editor = Editor::where('user_id', $user->id)->first();

        if (!empty($editor)) {
            $editor->status = 1;
            $editor->save();
        } else {
            $editor = Editor::create([
                'user_id' => $user->id,
                'status' => 1
            ]);
        }

        Session::flash('success', '*** User Added to Editorial Panel Successfully ***');
        return redirect()->route('users.editors.profile', $user->id);
    }

    /**
     * Remove an User from Editorial Panel
     *
     * @param User $user
     * @return void
     */
    public function removeEditor(User $user)
    {
        $editor = Editor::where('user_id', $user->id)->first();

        $editor->delete();

        Session::flash('success', '*** User Successfully Removed from Editorial Panel ***');
        return redirect()->route('users.editors.profile', $user->id);
    }
}
