<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class AgentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.agent');
    }

    public function properties()
    {
        return view('frontend.user.properties');
    }

    public function createProperty()
    {
        return view('frontend.user.create-property');
    }

    public function bookingBox()
    {
        return view('frontend.user.booking');
    }

    public function userChat()
    {
        return view('frontend.user.user-chat');
    }

    public function company()
    {
        return view('frontend.user.company');
    }

    public function companyProperty()
    {
        return view('frontend.user.company-property');
    }
}
