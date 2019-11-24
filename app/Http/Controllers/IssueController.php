<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Issue;

use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Constructor for IssueController
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index_archives');
        $this->middleware('editor')->except('index_archives');
    }

    /**
     * Index for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $issues = Issue::all();

        return view('issues.index', compact('issues'));
    }

    /**
     * Archive Page for All Visitors
     *
     * @return \Illuminate\View\View
     */
    public function index_archives()
    {
        $issues = Issue::all();

        return view('frontend.pages.archives', compact('issues'));
    }

    /**
     * Create a new Issue
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a new Issue
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $data = $request->all();

        $issue = Issue::create($data);

        Session::flash('success', '*** Issue Created Successfully ***');
        return redirect()->route('issues.index');
    }

    /**
     * Edit an existing issue
     *
     * @param Issue $issue
     * @return \Illuminate\View\View
     */
    public function edit(Issue $issue)
    {
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update an existing Issue
     *
     * @param Request $request
     * @param Issue $issue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Issue $issue)
    {
        $this->validation($request);

        $issue->update($request->all());

        Session::flash('success', '*** Issue Updated Successfully ***');
        return redirect()->route('issues.index');
    }

    /**
     * Mark an Issue as Current Issue
     *
     * @param Issue $issue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeCurrent(Issue $issue)
    {
        $issues = Issue::where('current', 1)->get();

        foreach ($issues as $issu) {
            $issu->current = 0;
            $issu->save();
        }

        $issue->current = 1;
        $issue->save();

        Session::flash('success', '*** Issue Marked as Current Issue ***');
        return redirect()->route('issues.index');
    }

    /**
     * Destroy an existing Issue
     *
     * @param Issue $issue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        Session::flash('success', '*** Issue Deleted Successfully ***');
        return redirect()->route('issues.index');
    }


    /**
     * Protected Validation for IssueController
     *
     * @param Request $request
     * @return string|null
     */
    protected function validation(Request $request)
    {
        return $request->validate([
            'year' => 'required|string|max:10',
            'volume' => 'required|string|max:10',
            'issue_no' => 'required|string|max:2',
        ]);
    }
}
