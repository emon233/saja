<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Storage;

use App\Upload;

use App\Models\Type;
use App\Models\Paper;
use App\Models\Discipline;

use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * PaperController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * All Papers List
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $papers = Paper::all();
        $type = config('appConstants.titles.editor_all');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All New Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_new()
    {
        $papers = Paper::where('status', config('appConstants.status.new'))->get();
        $type = config('appConstants.titles.editor_new');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Reviewing Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_reviewing()
    {
        $papers = Paper::where('status', config('appConstants.status.reviewing'))->get();
        $type = config('appConstants.titles.editor_reviewing');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Reviewed Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_reviewed()
    {
        $papers = Paper::where('status', config('appConstants.status.reviewed'))->get();
        $type = config('appConstants.titles.editor_reviewed');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Revisioning Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_revisioning()
    {
        $papers = Paper::where('status', config('appConstants.status.revisioning'))->get();
        $type = config('appConstants.titles.editor_revisioning');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Revisioned Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_revisioned()
    {
        $papers = Paper::where('status', config('appConstants.status.revisioned'))->get();
        $type = config('appConstants.titles.editor_revisioned');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Processing Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_processing()
    {
        $papers = Paper::where('status', config('appConstants.status.processing'))->get();
        $type = config('appConstants.titles.editor_processing');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Accepted Papers Index for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_accepted()
    {
        $papers = Paper::where('status', config('appConstants.status.accepted'))->get();
        $type = config('appConstants.titles.editor_accepted');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Rejected Papers Index for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_rejected()
    {
        $papers = Paper::where('status', config('appConstants.status.rejected'))->get();
        $type = config('appConstants.titles.editor_rejected');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * All Published Papers for Editor
     *
     * @return \Illuminate\View\View
     */
    public function index_editor_published()
    {
        $papers = Paper::where('status', config('appConstants.status.published'))->get();
        $type = config('appConstants.titles.editor_published');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Submitted Paper List by Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_submitted()
    {
        $papers = Paper::where('user_id', auth()->id())->get();
        $type = config('appConstants.titles.author_all');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Papers under Reviewing by Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_reviewing()
    {
        $papers = Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.reviewing')]])->get();
        $type = config('appConstants.titles.author_reviewing');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Papers Reviewed for Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_reviewed()
    {
        $papers = Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.reviewed')]])->get();
        $type = config('appConstants.titles.author_reviewed');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Upload Revision Index
     *
     * @param Paper $paper
     * @return \Illuminate\View\View
     */
    public function index_author_revision(Paper $paper)
    {
        return view(
            'papers.revision',
            compact('paper')
        );
    }

    /**
     * Revisioned Papers List for Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_revisioned()
    {
        $papers = Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.revisioned')]])->get();
        $type = config('appConstants.titles.author_revisioned');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Papers under Processing for Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_processing()
    {
        $papers = Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.processing')]])->get();
        $type = config('appConstants.titles.author_processing');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Papers already Published by Author
     *
     * @return \Illuminate\View\View
     */
    public function index_author_published()
    {
        $papers = Paper::where([['user_id', auth()->id()], ['status', config('appConstants.status.published')]])->get();
        $type = config('appConstants.titles.author_published');
        return view(
            'papers.index',
            compact('papers', 'type')
        );
    }

    /**
     * Create New Paper
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $disciplines = Discipline::where('status', 1)->get();
        $types = Type::where('status', 1)->get();

        return view('papers.create', compact('disciplines', 'types'));
    }

    /**
     * Store New Paper
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->storeValidation($request);
        $Data = $request->all();

        $names = ['manuscript', 'check_list', 'cover_letter', 'title_page', 'processing_fee'];

        foreach ($names as $name) {
            $file = $request->file($name);
            if (!empty($file)) {
                $fileName = Upload::generateNumber($file, config('appConstants.types.' . $name));
                $Data[$name] = $this->uploadFile($file, $fileName);
            }
        }

        $Data['status'] = config('appConstants.status.new');

        $paper = new Paper($Data);
        $paper->user_id = auth()->id();
        $paper->discipline_id = $Data['discipline'];
        $paper->type_id = $Data['type'];
        $paper->save();

        return redirect()->route('papers.show', $paper->id);
    }

    /**
     * Show a Paper Details
     *
     * @param Paper $paper
     * @return \Illuminate\View\View
     */
    public function show(Paper $paper)
    {
        return view('papers.show', compact('paper'));
    }

    /**
     * Edit a Paper Details
     *
     * @param Paper $paper
     * @return \Illuminate\View\View
     */
    public function edit(Paper $paper)
    {
        $disciplines = Discipline::where('status', 1)->get();
        $types = Type::where('status', 1)->get();
        return view('papers.edit', compact('paper', 'disciplines', 'types'));
    }

    /**
     * Update a Paper Details
     *
     * @param Request $request
     * @param Paper $paper
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Paper $paper)
    {
        $this->updateValidation($request);
        $data = $request->all();

        $names = ['manuscript', 'check_list', 'cover_letter', 'title_page', 'processing_fee'];

        foreach ($names as $name) {
            $file = $request->file($name);
            if (!empty($file)) {
                $fileName = Upload::getFileName($file, $paper->$name);
                $this->deleteFile($paper->$name);
                $data[$name] = $this->uploadFile($file, $fileName);
            }
        }

        $paper->update($data);
        $paper->discipline_id = $data['discipline'];
        $paper->type_id = $data['type'];
        $paper->save();

        return redirect()->route('papers.show', $paper->id);
    }

    /**
     * Make a Paper status changed to REVIEWED
     *
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeReviewed(Paper $paper)
    {
        $paper->status = config('appConstants.status.reviewed');
        $paper->save();

        Session::flash('success', '*** Paper Status changed to ' . config('appConstants.status.reviewed') . ' ***');
        return redirect()->route('papers.editor.reviewed');
    }

    public function uploadRevision(Request $request, Paper $paper)
    {
        $this->revisionValidation($request);
        $data = $request->all();

        $names = ['declaration_letter', 'correction', 'payment_slip', 'edited_manuscript'];

        foreach ($names as $name) {
            $file = $request->file($name);
            if (!empty($file)) {
                $fileName = Upload::generateNumberRevision($file, config('appConstants.types.' . $name), $paper);
                $data[$name] = $this->uploadFile($file, $fileName);
            }
        }
        $data['status'] = config('appConstants.status.revisioned');
        $paper->update($data);

        Session::flash('success', '*** Revision Uploaded Successfully ***');
        return redirect()->route('papers.author.revisioned');
    }

    /**
     * Upload Galley Proof
     *
     * @param Request $request
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadGalleyProof(Request $request, Paper $paper)
    {
        $this->validate($request, [
            'galley_proof' => 'required|file|mimes:pdf|max:50000'
        ]);

        $data = $request->all();

        $file = $request->file('galley_proof');
        if (!empty($file)) {
            $fileName = Upload::generateNumberRevision($file, config('appConstants.types.galley_proof'), $paper);
            $data['galley_proof'] = $this->uploadFile($file, $fileName);
        }

        $paper->update($data);
        Session::flash('success', '*** Galley Proof Successfully Uploaded ***');

        return redirect()->route('papers.editor.galleyProof');
    }

    /**
     * Upload Final Proof of the Paper
     *
     * @param Request $request
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFinalProof(Request $request, Paper $paper)
    {
        $this->validate($request, [
            'final_galley_proof' => 'required|file|mimes:pdf|max:50000'
        ]);

        $data = $request->all();

        $file = $request->file('final_galley_proof');
        if (!empty($file)) {
            $fileName = Upload::generateNumberRevision($file, config('appConstants.types.final_galley_proof'), $paper);
            $data['final_galley_proof'] = $this->uploadFile($file, $fileName);
        }

        $paper->update($data);
        Session::flash('success', '*** Final Galley Proof Successfully Uploaded ***');

        return redirect()->route('papers.author.galleyProof');
    }

    /**
     * Accept a Paper by Editor
     *
     * @param Request $request
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request, Paper $paper)
    {
        $paper->status = config('appConstants.status.accepted');
        $paper->save();

        Session::flash('success', '*** Paper Successfully Accepted ***');
        return redirect()->route('papers.editor.accepted');
    }

    /**
     * Reject a Paper by Editor
     *
     * @param Request $request
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, Paper $paper)
    {
        $paper->status = config('appConstants.status.rejected');
        $paper->save();

        Session::flash('success', '*** Paper Successfully Rejected ***');
        return redirect()->route('papers.editor.rejected');
    }

    /**
     * Destroy a Paper by the Author
     *
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Paper $paper)
    {
        if ($paper->user_id == Auth::id()) {
            $paper->delete();
            return redirect()->route('papers.submitted');
        }
        return redirect()->back();
    }

    /**
     * Destroy a Paper by an Editor
     *
     * @param Paper $paper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Paper $paper)
    {
        $paper->delete();

        return redirect()->route('papers.index');
    }

    /**
     * Upload File
     *
     * @param [type] $file
     * @param [type] $fileName
     * @return string|null
     */
    protected function uploadFile($file, $fileName)
    {
        if (!empty($file)) {
            return $file->storeAs('', $fileName, 'public');
        }

        return null;
    }

    /**
     * Delete a File from Server
     *
     * @param [type] $file
     * @return void
     */
    protected function deleteFile($file)
    {
        if (is_file($file)) {
            Storage::delete($file);
            unlink(storage_path('app/public/' . $file));
        }
    }

    /**
     * Validation Method for Store
     *
     * @param Request $request
     * @return void
     */
    protected function storeValidation(Request $request)
    {
        return $request->validate([
            'discipline' => 'required|exists:disciplines,id',
            'type' => 'required|exists:types,id',
            'title' => 'required|string|max:250',
            'running_title' => 'required|string|max:250',
            'keywords' => 'required|string|max:150',
            'manuscript' => 'required|file|mimes:docx,doc,zip|max:5000',
            'cover_letter' => 'required|file|mimes:doc,docx,zip|max:5000',
            'title_page' => 'required|mimes:docx,doc,zip,pdf|max:5000',
            'check_list' => 'required|file|mimes:doc,docx,zip,pdf|max:5000',
            'processing_fee' => 'required|file|mimes:pdf,jpg,jpeg|max:5000'
        ]);
    }

    /**
     * Validation Method for Update
     *
     * @param Request $request
     * @return void
     */
    protected function updateValidation(Request $request)
    {
        return $request->validate([
            'discipline' => 'required|exists:disciplines,id',
            'type' => 'required|exists:types,id',
            'title' => 'required|string|max:250',
            'running_title' => 'required|string|max:250',
            'keywords' => 'required|string|max:150',
            'manuscript' => 'nullable|file|mimes:docx,doc,zip|max:5000',
            'cover_letter' => 'nullable|file|mimes:doc,docx,zip|max:5000',
            'title_page' => 'nullable|mimes:docx,doc,zip,pdf|max:5000',
            'check_list' => 'nullable|file|mimes:doc,docx,zip,pdf|max:5000',
            'processing_fee' => 'nullable|file|mimes:pdf,jpg,jpeg|max:512'
        ]);
    }

    /**
     * Validation Method for UploadRevision
     *
     * @param Request $request
     * @return void
     */
    protected function revisionValidation(Request $request)
    {
        return $request->validate([
            'declaration_letter' => 'required|file|mimes:doc,docx,pdf|max:5000',
            'correction' => 'required|file|mimes:doc,docx,pdf|max:5000',
            'payment_slip' => 'required|file|mimes:pdf,jpeg,jpg|max:5000',
            'edited_manuscript' => 'required|file|mimes:doc,docx,pdf|max:5000',
        ]);
    }
}
