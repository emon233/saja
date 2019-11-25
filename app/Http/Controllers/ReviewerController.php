<?php

namespace App\Http\Controllers;

use Session;

use App\User;
use App\Models\Reviewer;

use App\Mail\ReviewerRequest;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    /**
     * Contructor for ReviewerController
     */
    public function __construct()
    {
        $this->middleware('editor')->except('request');
    }

    /**
     * All Reviewers List
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reviewers = Reviewer::where('status', 1)->get();

        foreach ($reviewers as $reviewer) {
            $array[] = $reviewer->user_id;
        }
        $title = config('appConstants.titles.editor_reviewers');
        $users = [];
        if (!empty($array)) {
            $users = User::whereIn('id', $array)->get();
        }

        return view('users.index', compact('users', 'title'));
    }

    /**
     * Requested Reviewers List
     *
     * @return \Illuminate\View\View
     */
    public function requested()
    {
        $reviewers = Reviewer::where('status', 0)->get();

        foreach ($reviewers as $reviewer) {
            $array[] = $reviewer->user_id;
        }

        $title = config('appConstants.titles.editor_reviewers');
        $users = [];

        if (!empty($array)) {
            $users = User::whereIn('id', $array)->get();
        }

        return view('users.index', compact('users', 'title'));
    }

    /**
     * Request to become a reviewer from author
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function request(Request $request)
    {
        $reviewer = Reviewer::where('user_id', auth()->id())->first();

        if ($reviewer) {
            Session::flash('error', '!!! You are Already a Reviewer or You have a Pending Request !!!');
            return redirect()->back();
        }

        $reviewer = Reviewer::create([
            'user_id' => auth()->id()
        ]);

        $user = User::find(auth()->id());
        Mail::to($user)->send(new ReviewerRequest($user));

        Session::flash('success', '*** Your Request has been Received ***');
        return redirect()->back();
    }
}
