<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use Cookie;
use Session;
use App\Models\Properties;
use App\Models\Country;

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

        $countries = Country::all();

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

        // dd($age);                

        $final_out = [];
        foreach($age as $ag){
            array_push($final_out,$ag->user_id);
        }   
        
        if(count($final_out) == 0 ){
            $final_out2 = null;
        }
        else{
            
            $prop = Properties::where('user_id',$final_out)->get();

            $final_out2 = [];
            foreach($prop as $pro){
                array_push($final_out2,$pro->main_category);
            }

        }
        // dd($final_out);

        // $prop = Properties::where('user_id',$final_out)->get();

        // $final_out2 = [];
        // foreach($prop as $pro){
        //     array_push($final_out2,$pro->main_category);
        // }


        // $area_agents = AgentRequest::where('area', $area);

        return view('frontend.find-agent', [
            'agents' => $age,
            'final_out2' => $final_out2,
            'countries' => $countries
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
