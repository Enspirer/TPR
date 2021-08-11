<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use App\Models\Properties;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $all_agent_request = AgentRequest::all()->count();
        $agent_approved = AgentRequest::all()->where('status','=','Approved')->count();
        $all_property = Properties::all()->count();
        $property_pending = Properties::all()->where('admin_approval','=','Pending')->count();
        
        // dd($tenants);

        return view('backend.dashboard',[
            'all_agent_request' => $all_agent_request,
            'agent_approved' => $agent_approved,
            'all_property' => $all_property,
            'property_pending' => $property_pending
        ]);
    }
}
