<?php

namespace App\Http\Controllers\Auth;

use Session;

use App\Models\Editor;
use App\Models\Reviewer;

use Illuminate\Auth\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request)
    {
        $role = $request['role'];

        if ($role == "Editor") {
            if (!Editor::isEditor()) {
                auth()->logout();
                Session::flash('error', 'You are not Authorized');
                return redirect()->back();
            } else {
                Session::put('role', 'Editor');
            }
        } elseif ($role == "Reviewer") {
            if (!Reviewer::isReviewer()) {
                auth()->logout();
                Session::flash('error', 'You are not Authorized');
                return redirect()->back();
            } else {
                Session::put('role', 'Reviewer');
            }
        } else {
            Session::put('role', 'Author');
        }
    }
}
