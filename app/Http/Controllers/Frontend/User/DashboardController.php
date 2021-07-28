<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }

    public function communications() {
        return view('frontend.user.communications');
    }

    public function accountDashboard()
    {
        return view('frontend.user.account-dashboard');
    }

    public function favourites()
    {
        return view('frontend.user.favourites');
    }
}
