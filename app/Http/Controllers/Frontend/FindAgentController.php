<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use Cookie;
use Session;
use App\Models\Properties;

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

        

        $final_out = [];
        foreach($age as $ag){
            array_push($final_out,$ag->user_id);
        }
        // dd($final_out);

        // dd($agents);

        $prop = Properties::where('user_id',$final_out)->get();
        // dd($prop);

        $final_out2 = [];
        foreach($prop as $pro){
            array_push($final_out2,$pro->main_category);
        }

        // dd($final_out2);

        // $area_agents = AgentRequest::where('area', $area);

        return view('frontend.find-agent', [
            'agents' => $age,
            'final_out2' => $final_out2
        ]);
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
