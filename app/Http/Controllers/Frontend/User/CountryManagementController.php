<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\SidebarAd;
use App\Models\AgentRequest;
use App\Models\Country;
use App\Models\Properties;
use App\Models\Auth\User;
use App\Models\Feedback;
use Auth;

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

        $user_id = auth()->user()->id;

        $country_manager = Country::where('country_manager',$user_id)->first();

        $properties = Properties::where('country', $country_manager->country_name)->orderBy('id','DESC')->get();


        return view('frontend.user.property-approval', ['properties' => $properties]);
    }

    public function supports() 
    {

        $feedback = Feedback::orderBy('id', 'DESC')->get();
        // dd($feedback);

        $final_out = [];
        foreach($feedback as $feed){
            array_push($final_out,$feed->country);
        }
        // dd($final_out);

        $countries = Country::whereIn('id',$final_out)->get();
        // dd($countries);

        // $user_id = auth()->user()->id;
        // $user_details = User::where('id',$user_id)->first();

        return view('frontend.user.supports',[
            'feedback' => $feedback,
            'countries' => $countries
        ]);
    }

    public function supportsEdit($id)
    {
        $supports = Feedback::where('id',$id)->first();        
        // dd($supports);              

        $user_details = AgentRequest::where('user_id',$supports->user_id)->first();
        // dd($user_details);

        return view('frontend.user.supports-edit',[
            'supports' => $supports,
            'user_details' => $user_details        
        ]);  
    }

    public function supportsUpdate(Request $request)
    {        
        // dd($request);
       
        $update = new Feedback;

        $update->status=$request->action;       
        
        Feedback::whereId($request->hid_id)->update($update->toArray());

        return redirect()->route('frontend.user.supports'); 
    }


    public function supportsDelete($id)
    {        
        // dd($id);
        $data = Feedback::findOrFail($id);
        $data->delete();   

        return back();
    }

    public function agentApproval() {

        $user_id = auth()->user()->id;
        $country_manager = Country::where('country_manager',$user_id)->first();

        $agent_request = AgentRequest::where('country',$country_manager->country_name)->get();

        return view('frontend.user.agent-approval',[
            'agent_request' => $agent_request
        ]);
    }

    public function agentApprovalDelete($id)
    {        
        // dd($id);
        $data = AgentRequest::findOrFail($id);
        $data->delete();   

        return back();
    }

    public function singleAgentApproval($id) {

        $single_agent_request = AgentRequest::where('id',$id)->first();
        // dd($single_agent_request);
        return view('frontend.user.single-agent-approval',[
            'single_agent_request' => $single_agent_request
        ]);
    }

    public function singleAgentApprovalUpdate(Request $request)
    {        
        // dd($request);
       
        $update = new AgentRequest;

        $update->country_manager_approval=$request->action;        
        
        AgentRequest::whereId($request->hidden_id)->update($update->toArray());

        return redirect('/country-management/agent-approval');
    }


    public function singlePropertyApproval($id) {

        $single_approval = Properties::where('id', $id)->first();

        $images = json_decode($single_approval->image_ids);

        return view('frontend.user.single-property-approval', [
            'single_approval'=> $single_approval,
            'images' => $images
        ]);
    }    

    public function singlePropertyApproved() {

        $action = request('action');

        $property = DB::table('properties') ->where('id', '=', request('hid_id'))->update(
            [
                'country_manager_approval' => $action
            ]
        );

        return redirect('/country-management/property-approval');
    }    

    

    public function sidebarAD() {

        $ad1 = SidebarAd::where('other', '=', 'ad1')->first();
        $ad2 = SidebarAd::where('other', '=', 'ad2')->first();
        // dd($ad1);

        $country = Country::where('country_manager',auth()->user()->id)->first();
        // dd($country);

        return view('frontend.user.sidebar_ad',[
            'ad1' => $ad1,
            'ad2' => $ad2,
            'country' => $country
        ]);
    }    
     
    public function sidebarAD_store(Request $request)
    {        
        // dd($request);

        if(strlen($request->get('description')) < 250){
            return back()->with('error', 'Minimum length of the characters in Description should be 250');
        }
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/sidebar_ad'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new SidebarAd;

        $add->title=$request->title; 
        $add->image=$image_url;        
        $add->description=$request->description;
        $add->link=$request->link;
        $add->status=$request->status;
        $add->country=$request->country;
        $add->country_management_approval='Pending';  

        if($request->ad_position == 'ad1'){ 
            $add->other=$request->ad_position;
        }else{
            $add->other=$request->ad_position;
        } 

        $add->save();

        return back();
    }

    public function sidebarAD_update(Request $request)
    {        
        // dd($request);
        if(strlen($request->get('description')) < 250){
            return back()->with('error', 'Minimum length of the characters in Description should be 250');
        }

        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/sidebar_ad'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = SidebarAd::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        } 

        $update = new SidebarAd;

        $update->title=$request->title; 
        $update->image=$image_url;        
        $update->description=$request->description;
        $update->link=$request->link;
        $update->status=$request->status;        
        $update->country=$request->country;
        $update->country_management_approval='Pending';  

        if($request->ad_position == 'ad1'){ 
            $update->other=$request->ad_position;
        }else{
            $update->other=$request->ad_position;
        } 
        SidebarAd::whereId($request->hidden_id)->update($update->toArray());

        return back(); 
    }

    public function sidebarAD_delete($id)
    {        
        $data = SidebarAd::findOrFail($id);
        $data->delete();   

        return back();
    }



}
