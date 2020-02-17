<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Instructions;

use Illuminate\Http\Request;

class FrontEnd extends Controller
{
    public function index_home()
    {
        $text = Instructions::find(1)->home;

        return view(
            'frontend.pages.home',
            compact('text')
        );
    }

    public function index_authors_guideline()
    {
        $text = Instructions::find(1)->guideline;

        return view(
            'frontend.pages.authors-guideline',
            compact('text')
        );
    }

    public function index_publication_fees()
    {
        $text = Instructions::find(1)->publication_fee;

        return view(
            'frontend.pages.publication-fee',
            compact('text')
        );
    }

    public function index_payment_method()
    {
        $text = Instructions::find(1)->payment_method;

        return view(
            'frontend.pages.payment-method',
            compact('text')
        );
    }

    public function index_publication_ethics()
    {
        $text = Instructions::find(1)->publication_ethics;

        return view(
            'frontend.pages.publication-ethics',
            compact('text')
        );
    }

    public function index_contact()
    {
        $text = Instructions::find(1)->contact;

        return view(
            'frontend.pages.contact',
            compact('text')
        );
    }

    public function index_links()
    {
        $links = Link::all();

        return view(
            'frontend.pages.links',
            compact('links')
        );
    }

    public function index_editorial_board()
    {
        $editors['advisors'] = Instructions::find(1)->advisors;
        $editors['chief'] = Instructions::find(1)->chief_editor;
        $editors['executive'] = Instructions::find(1)->executive_editor;
        $editors['associate'] = Instructions::find(1)->asso_exe_editor;
        $editors['editors'] = Instructions::find(1)->editors;

        return view(
            'frontend.pages.editorial-board',
            compact('editors')
        );
    }
}
