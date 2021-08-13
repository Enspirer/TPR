<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\FileManager;
use App\Models\Auth\User;
use App\Models\AgentRequest; 

/**
 * Class ContactController.
 */
class IndividualAgentController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $agent_details = AgentRequest::where('id',$id)->first();
        // dd($agent_details);

        $all_properties = Properties::where('user_id',$agent_details->user_id)->get();
        // dd($all_properties);

        $com_properties = Properties::where('user_id',$agent_details->user_id)->where('main_category','=','Commercial')->get();
        // dd($com_properties);

        $res_properties = Properties::where('user_id',$agent_details->user_id)->where('main_category','=','Residential')->get();
        // dd($res_properties);

        return view('frontend.individual-agent',[
           'agent_details' => $agent_details,
           'all_properties' => $all_properties,
           'com_properties' => $com_properties,
           'res_properties' => $res_properties
        ]);
    }

}
