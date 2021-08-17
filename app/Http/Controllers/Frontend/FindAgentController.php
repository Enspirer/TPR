<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use Cookie;
use Session;

/**
 * Class ContactController.
 */
class FindAgentController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($area, $agent_type, $agent_name,Request $request)
    {



        $agents = AgentRequest::where('status','Approved');

        if($area != 'area'){

        }

        if($agent_type != 'agent_type')
        {
           $agents->where('agent_type',$agent_type);
        }

        if($agent_name != 'agent_name'){
            $agents->where('name','like','%'.$agent_name.'%');
        }

        $age = $agents->get();

        // $area_agents = AgentRequest::where('area', $area);

        return view('frontend.find-agent', ['agents' => $age]);
    }

    public function store(Request $request)
    {  
        // dd($request);

        return redirect()->route('frontend.find-agent', [
            $request->area,
            $request->agent_type,
            $request->agent_name
        ]);

    }

}
