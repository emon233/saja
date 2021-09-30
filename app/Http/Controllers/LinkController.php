<?php

namespace App\Http\Controllers;

use Session;

use App\Models\Link;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Index for Links
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $links = Link::all();

        return view(
            'links.index',
            compact('links')
        );
    }

    /**
     * Create a New Link
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a New Link
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'file' => 'required|file|mimes:doc,docx,pdf|max:15000'
        ]);

        $data = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();

        $link = new Link($data);
        $link->file = $this->uploadFile($request->file('file'), $fileName);
        $link->save();

        Session::flash('success', '*** File Uploaded Successfully ***');
        return redirect()->route('links.index');
    }

    /**
     * Edit an existing Link
     *
     * @param Link $link
     * @return \Illuminate\View\View
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update an existing Link
     *
     * @param Request $request
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Link $link)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'file' => 'required|file|mimes:doc,docx,pdf|max:15000'
        ]);

        $data = $request->all();
        $file = $request->file('file');
        if (!empty($file)) {
            $this->deleteFile($link->file);
            $fileName = $request->file('file')->getClientOriginalName();
            $link->file = $this->uploadFile($request->file('file'), $fileName);
        }
        $link->save();

        Session::flash('success', '*** File Uploaded Successfully ***');
        return redirect()->route('links.index');
    }

    /**
     * Delete an existing Link
     *
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Link $link)
    {
        $link->delete();

        Session::flash('success', '*** File Deleted Successfully ***');
        return redirect()->route('links.index');
    }

    /**
     * Upload a Link File to Server
     *
     * @param [type] $file
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
            \Storage::delete($file);
            unlink(storage_path('app/public/' . $file));
        }
    }
}
