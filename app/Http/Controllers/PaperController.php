<?php

namespace App\Http\Controllers;

use Auth;
use Storage;

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
        $paperData = $request->all();

        $paperData['manuscript'] = $this->uploadManuscript($request->file('manuscript'));
        $paperData['check_list'] = $this->uploadFile($request->file('check_list'));
        $paperData['cover_letter'] = $this->uploadFile($request->file('cover_letter'));
        $paperData['title_page'] = $this->uploadFile($request->file('title_page'));
        $paperData['processing_fee'] = $this->uploadFile($request->file('processing_fee'));
        $paperData['status'] = \Config::get('appConstants.status.new');

        $paper = new Paper($paperData);
        $paper->user_id = auth()->id();
        $paper->discipline_id = $paperData['discipline'];
        $paper->type_id = $paperData['type'];
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
        $paperData = $request->all();

        if (!empty($paperData['manuscript'])) {
            $this->deleteFile($paper->manuscript);
            $paperData['manuscript'] = $this->uploadUpdatedManuscript($request->file('manuscript'), $paper);
        }
        if (!empty($paperData['check_list'])) {
            $this->deleteFile($paper->check_list);
            $paperData['check_list'] = $this->uploadFile($request->file('check_list'));
        }
        if (!empty($paperData['cover_letter'])) {
            $this->deleteFile($paper->cover_letter);
            $paperData['cover_letter'] = $this->uploadFile($request->file('cover_letter'));
        }
        if (!empty($paperData['title_page'])) {
            $this->deleteFile($paper->title_page);
            $paperData['title_page'] = $this->uploadFile($request->file('title_page'));
        }
        if (!empty($paperData['processing_fee'])) {
            $this->deleteFile($paper->processing_fee);
            $paperData['processing_fee'] = $this->uploadFile($request->file('processing_fee'));
        }

        $paper->update($paperData);
        $paper->discipline_id = $paperData['discipline'];
        $paper->type_id = $paperData['type'];
        $paper->save();

        return redirect()->route('papers.show', $paper->id);
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
            return redirect()->back();
        }

        return redirect()->route('papers.submitted');
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
     * Upload a Manuscript
     *
     * @param [type] $manuscript
     * @return string|null
     */
    protected function uploadManuscript($manuscript)
    {
        $manuscriptNo = Paper::generateManuscriptNo($manuscript);
        if (!empty($manuscript)) {
            return $manuscript->storeAs('', $manuscriptNo, 'public');
        }
        return null;
    }

    /**
     * Update Papers Manuscript
     *
     * @param [type] $manuscript
     * @param Paper $paper
     * @return string|null
     */
    protected function uploadUpdatedManuscript($manuscript, Paper $paper)
    {
        if (!empty($manuscript)) {
            return $manuscript->storeAs('', $paper->manuscript, 'public');
        }
        return null;
    }

    /**
     * Upload a File
     *
     * @param [type] $file
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
}
