<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['changeLanguage']);
    }

    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Change language
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }

    /**
     * GET: Welcome/Home page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    // ==================================== HTTP POST METHODS ====================================
}
