<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class PropertyManagementController.
 */
class PropertyManagementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.property-dashboard');
    }

    public function propertyApproval() {
        return view('frontend.user.property-approval');
    }

    public function supports() {
        return view('frontend.user.supports');
    }

    public function agentApproval() {
        return view('frontend.user.agent-approval');
    }
}
