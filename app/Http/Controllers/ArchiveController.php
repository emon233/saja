<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Issue;
use App\Models\Archive;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Constructor for ArchiveController
     */
    public function __construct()
    {
        $this->middleware('editor');
    }

    /**
     * Papers of an Issue
     *
     * @param Issue $issue
     * @return \Illuminate\View\View
     */
    public function index(Issue $issue)
    {
        $archives = Archive::where('issue_id', $issue->id)->get();

        return view('archives.index', compact('archives', 'issue'));
    }

    /**
     * Frontend Index of Issues Archives
     *
     * @param Issue $issue
     * @return \Illuminate\View\View
     */
    public function index_archives(Issue $issue)
    {
        return view('frontend.pages.archivesDetails', compact('issue'));
    }

    /**
     * Find the Current Issue
     *
     * @return \Illuminate\View\View
     */
    public function index_current_issue()
    {
        $issue = Issue::where('current', 1)->first();

        return view('frontend.pages.archivesDetails', compact('issue'));
    }

    /**
     * Create a new Paper to Issue
     *
     * @param Issue $issue
     * @return \Illuminate\View\View
     */
    public function create(Issue $issue)
    {
        return view('archives.create', compact('issue'));
    }

    /**
     * Store a new Paper to Issue
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $data = $request->all();

        $archive = new Archive($data);
        $archive->issue_id = $data['issue_id'];
        $archive->file = $this->uploadFile($request->file('file'));
        $archive->save();

        Session::flash('success', '*** File Uploaded Successfully ***');
        return redirect()->route('archives.index', $archive->issue_id);
    }

    /**
     * Edit an existing uploaded paper
     *
     * @param Archive $archive
     * @return \Illuminate\View\View
     */
    public function edit(Archive $archive)
    {
        return view('archives.edit', compact('archive'));
    }

    /**
     * Update an existing uploaded paper
     *
     * @param Request $request
     * @param Archive $archive
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Archive $archive)
    {
        $this->validation($request);

        $data = $request->all();

        $archive->update($data);
        if (!empty($request->file('file'))) {
            $archive->file = $this->uploadFile($request->file('file'));
            $archive->save();
        }

        Session::flash('success', '*** File Successfully Updated ***');
        return redirect()->route('archives.index', $archive->issue_id);
    }

    /**
     * Delete an existing paper from issue
     *
     * @param Archive $archive
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Archive $archive)
    {
        $issue = $archive->issue_id;
        $archive->delete();

        Session::flash('success', '*** Archived Manuscript Destroyed ***');
        return redirect()->route('archives.index', $issue);
    }

    /**
     * Upload a File
     *
     * @param $file
     * @return string|null
     */
    protected function uploadFile($file)
    {
        if (!empty($file)) {
            return $file->store('', 'public');
        }
        return null;
    }

    /**
     * Validation method for ArchiveController
     *
     * @param Request $request
     * @return string|null
     */
    protected function validation(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string|max:255',
            'pages' => 'required|string|max:10',
            'file' => 'nullable|file|mimes:pdf|max:10000'
        ]);
    }
}
