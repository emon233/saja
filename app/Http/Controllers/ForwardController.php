<?php

namespace App\Http\Controllers;

use Session;

use App\Upload;

use App\Models\Paper;
use App\Models\Forward;
use App\Models\Reviewer;

use Illuminate\Http\Request;

class ForwardController extends Controller
{
    /**
     * Constructor for ForwardController
     */
    public function __construct()
    {
        $this->middleware('editor')->only('create', 'store');
        $this->middleware('reviewer')->only('index', 'show', 'accept', 'reject');
    }

    /**
     * Forwarded Paper List for Reviewer
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $forwards = Forward::where('reviewer_id', auth()->id())->get();
        $type = config('appConstants.titles.reviewer_all');
        return view(
            'forwards.index',
            compact('forwards', 'type')
        );
    }

    public function index_new()
    {
        $forwards = Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.forwarded')]])->get();
        $type = config('appConstants.titles.reviewer_new');

        return view(
            'forwards.index',
            compact('forwards', 'type')
        );
    }

    /**
     * All Accepted Papers by Reviewer
     *
     * @return \Illuminate\View\View
     */
    public function index_accepted()
    {
        $forwards = Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.accepted')]])->get();
        $type = config('appConstants.titles.reviewer_accepted');

        return view(
            'forwards.index',
            compact('forwards', 'type')
        );
    }

    /**
     * All Rejected Papers by Reviewer
     *
     * @return \Illuminate\View\View
     */
    public function index_rejected()
    {
        $forwards = Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.rejected')]])->get();
        $type = config('appConstants.titles.reviewer_rejected');

        return view(
            'forwards.index',
            compact('forwards', 'type')
        );
    }

    /**
     * All Reviewed Papers by Reviewer
     *
     * @return \Illuminate\View\View
     */
    public function index_reviewed()
    {
        $forwards = Forward::where([['reviewer_id', auth()->id()], ['status', config('appConstants.forwards.reviewed')]])->get();
        $type = config('appConstants.titles.reviewer_reviewed');

        return view(
            'forwards.index',
            compact('forwards', 'type')
        );
    }

    /**
     * Upload Review
     *
     * @param Forward $forward
     * @return void
     */
    public function index_upload(Forward $forward)
    {
        return view(
            'forwards.upload',
            compact('forward')
        );
    }

    /**
     * Forward a Paper to Reviewer
     *
     * @param Paper $paper
     * @return \Illuminate\View\View
     */
    public function create(Paper $paper)
    {
        $reviewers = Reviewer::where('status', 1)->get();

        return view(
            'forwards.create',
            compact('paper', 'reviewers')
        );
    }

    /**
     * Forward Paper to Reviewer
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'paper' => 'required|exists:papers,id',
            'reviewer' => 'required|exists:users,id',
            'to_date' => 'required|date'
        ]);
        $paper = Paper::find($request['paper']);

        if ($paper) {
            foreach ($paper->forwards as $forward) {
                if ($forward->reviewer_id == $request['reviewer']) {
                    Session::flash('error', '!!! Selected Reviewer is already Assigned for this Paper !!!');
                    return redirect()->back();
                }
            }

            if ($paper->user_id == $request['reviewer']) {
                Session::flash('error', '!!! Selected Reviewer is the Author of this Paper !!!');
                return redirect()->back();
            }
            $paper->status = config('appConstants.status.reviewing');
            $paper->save();
        }
        $forward = new Forward($request->all());
        $forward->paper_id = $request['paper'];
        $forward->reviewer_id = $request['reviewer'];
        $forward->status = config('appConstants.forwards.forwarded');
        $forward->save();

        Session::flash('success', '*** Paper Successfully Assigned to Reviewer ***');
        return redirect()->route('forwards.create', $request['paper']);
    }

    /**
     * Show a forwarded paper details
     *
     * @param Forward $forward
     * @return void
     */
    public function show(Forward $forward)
    {
        return view(
            'forwards.show',
            compact('forward')
        );
    }

    /**
     * Accept Forwarded Paper to Review
     *
     * @param Request $request
     * @param Forward $forward
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Forward $forward)
    {
        $forward->status = config('appConstants.forwards.accepted');
        $forward->save();

        Session::flash('success', '*** You Successfully Accepted the Paper to Review ***');
        return redirect()->back();
    }

    /**
     * Reject Forwarded Paper for Reviewing
     *
     * @param Request $request
     * @param Forward $forward
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, Forward $forward)
    {
        $forward->comments = $request['comments'];
        $forward->status = config('appConstants.forwards.rejected');
        $forward->save();

        Session::flash('success', '*** You Successfully Rejected the Paper to Review ***');
        return redirect()->route('home');
    }

    /**
     * Upload Reviewed Manuscript
     *
     * @param Request $request
     * @param Forward $forward
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request, Forward $forward)
    {
        $this->validate($request, [
            'opinion_format' => 'required|file|mimes:doc,docx|max:5000',
            'manuscript' => 'required|file|mimes:doc,docx,zip,pdf|max:5000'
        ]);

        $data = $request->all();
        $names = ['opinion_format', 'manuscript'];

        foreach ($names as $name) {
            if (!empty($data[$name])) {
                $manuscriptNo = Upload::generateReviewedNumber($forward, $data[$name], config('appConstants.types.' . $name));
                $data[$name] = $this->uploadFile($data[$name], $manuscriptNo);
            }
        }

        $data['status'] = config('appConstants.forwards.reviewed');

        $forward->update($data);

        return redirect()->route('forwards.index.reviewed');
    }

    /**
     * Upload a Manuscript
     *
     * @param [type] $manuscript
     * @return string|null
     */
    protected function uploadFile($file, $fileNo)
    {
        if (!empty($file)) {
            return $file->storeAs('', $fileNo, 'public');
        }
        return null;
    }
}
