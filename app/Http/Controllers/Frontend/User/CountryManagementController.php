<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class PropertyManagementController.
 */
class CountryManagementController extends Controller
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

    public function singlePropertyApproval() {
        return view('frontend.user.single-property-approval');
    }

    public function singleAgentApproval() {
        return view('frontend.user.single-agent-approval');
    }
}
