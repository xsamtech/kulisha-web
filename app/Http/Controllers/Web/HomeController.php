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
     * GET: Home page
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        dd($request->ipinfo->country_name);

        return view('home');
    }

    /**
     * GET: Discover page
     *
     * @return \Illuminate\View\View
     */
    public function discover()
    {
        return view('discover');
    }

    /**
     * GET: Cart page
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        return view('cart');
    }

    /**
     * GET: Notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notification()
    {
        return view('notification');
    }

    /**
     * GET: Communities page
     *
     * @return \Illuminate\View\View
     */
    public function community()
    {
        return view('community');
    }

    /**
     * GET: Events page
     *
     * @return \Illuminate\View\View
     */
    public function event()
    {
        return view('event');
    }

    /**
     * GET: Messages page
     *
     * @return \Illuminate\View\View
     */
    public function message()
    {
        return view('message');
    }

    // ==================================== HTTP POST METHODS ====================================
}
