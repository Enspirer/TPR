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

        return view('frontend.individual-agent',[
           'agent_details' => $agent_details
        ]);
    }

}
