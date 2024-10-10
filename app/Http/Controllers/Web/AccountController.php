<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['changeLanguage']);
    }

    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Profile page
     *
     * @param  string $username
     * @return \Illuminate\View\View
     */
    public function profile($username)
    {
        return view('profile.home');
    }

    /**
     * GET: Profile page
     *
     * @param  string $username
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function profileEntity($username, $entity)
    {
        return view('profile.edit');
    }
}
