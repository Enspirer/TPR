<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }

    public function editAgent(Request $request)
    {        
        // dd($request);

        if($request->file('cover_photo'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->cover_photo->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->cover_photo->move(public_path('files/agent_request'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $edit_agent = new AgentRequest;

        $edit_agent->cover_photo=$image_url;     
        $edit_agent->save();

        return back();                      

    }

    public function communications() {
        return view('frontend.user.communications');
    }

    public function accountDashboard()
    {
        return view('frontend.user.account-dashboard');
    }

    public function favourites()
    {
        return view('frontend.user.favourites');
    }
}
