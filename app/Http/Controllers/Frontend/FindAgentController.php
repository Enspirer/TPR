<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AgentRequest;

/**
 * Class ContactController.
 */
class FindAgentController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($area, $agent_type, $agent_name)
    {
        $agents = AgentRequest::all();


        // $area_agents = AgentRequest::where('area', $area)

        return view('frontend.find-agent', ['agents' => $agents]);
    }

}
