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
        $agents = AgentRequest::where('status','Approval');

        if($area != 'area'){

        }

        if($agent_type != 'agent_type')
        {
           $agents->where('agent_type',$agent_type);
        }

        if($agent_name != 'agent_name'){
            $agents->where('name','like','%'.$agent_name.'%');
        }

        $agents->get();

        $area_agents = AgentRequest::where('area', $area);

        return view('frontend.find-agent', ['agents' => $agents]);
    }

}
