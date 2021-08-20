<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Country;
use App\Models\Properties;
use App\Models\Auth\User;
use App\Models\Feedback;
use App\Models\AdCategory;
use App\Models\HomePageAdvertisement;
use App\Models\SidebarAd;
use Auth;
use DataTables;


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
        $approvedProperties = Properties::get()->where('admin_approval' , 'Approved')->count();

        $disapprovedProperties = Properties::get()->where('admin_approval' , 'Disapproved')->count();

        $supports = Feedback::get()->where('status', 'Pending')->count();


        return view('frontend.user.property-dashboard', [
            'approvedProperties' => $approvedProperties,
            'disapprovedProperties' => $disapprovedProperties,
            'supports' => $supports
        ]);
    }

    public function propertyApproval() {

        // $user_id = auth()->user()->id;

        // $country_manager = Country::where('country_manager',$user_id)->first();

        // $properties = Properties::where('country', $country_manager->country_name)->orderBy('id','DESC')->get();

        return view('frontend.user.property-approval');
    }

    public function getPropertyApproval(Request $request)
    {

        $user_id = auth()->user()->id;

        $country_manager = Country::where('country_manager',$user_id)->first();

        $properties = Properties::where('country', $country_manager->country_name)->orderBy('id','DESC')->get();


        if($request->ajax())
        {
            return DataTables::of($properties)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-property-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }


    public function getPropertyApprovalUpdate(Request $request) {

        $property = DB::table('properties') ->where('id', $request->hid_id)->update(
            [
                'country_manager_approval' => 'Disapproved'
            ]
        );

        return back();
    }


    public function supports() 
    {

        // $feedback = Feedback::orderBy('id', 'DESC')->get();


        // $final_out = [];
        // foreach($feedback as $feed){
        //     array_push($final_out,$feed->country);
        // }

        // $countries = Country::whereIn('id',$final_out)->get();

        return view('frontend.user.supports');
    }

    public function getSupports(Request $request) {

        // $feedback = Feedback::orderBy('id', 'DESC')->get();

        $user_id = auth()->user()->id;

        $country = Country::where('country_manager',$user_id)->first();

        $feedback = Feedback::where('country', $country->id)->orderBy('id', 'DESC')->get();



        // $final_out = [];
        // foreach($feedback as $feed){
        //     array_push($final_out,$feed->country);
        // }

        // $countries = Country::whereIn('id',$final_out)->get();


        if($request->ajax())
        {
            return DataTables::of($feedback)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.supports.edit', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<a href="'.route('frontend.user.supports.delete', $data->id).'" name="delete" id="'.$data->id.'" class="btn text-light table-btn" style="background-color: #FF2C4B;" > Delete</a>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
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

        // $user_id = auth()->user()->id;
        
        // $country_manager = Country::where('country_manager',$user_id)->first();

        // $agent_request = AgentRequest::where('country',$country_manager->country_name)->get();

        return view('frontend.user.agent-approval');
    }

    public function getAgentApproval(Request $request) {

        $user_id = auth()->user()->id;
        
        $country_manager = Country::where('country_manager',$user_id)->first();

        $agent_request = AgentRequest::where('country',$country_manager->country_name)->get();


        if($request->ajax())
        {
            return DataTables::of($agent_request)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-agent-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }


    public function getAgentApprovalUpdate(Request $request) {

        $property = DB::table('agent_requests') ->where('id', $request->hid_id)->update(
            [
                'country_manager_approval' => 'Disapproved'
            ]
        );

        return back();
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
    
    
// ******************************************  Advertisements  *************************************************


    public function adCategory() {

        $country = Country::where('country_manager',auth()->user()->id)->first();
        // dd($country);

        $ad_category = AdCategory::orderBy('id', 'DESC')->get();
        // dd($ad_category);
    
        return view('frontend.user.ad_category',[
            'country' => $country,
            'ad_category' => $ad_category
        ]);
    }  


    public function getAdCategory(Request $request) {

        $country = Country::where('country_manager',auth()->user()->id)->first();

        $ad_category = AdCategory::where('country', $country->country_name)->orderBy('id', 'DESC')->get();


        if($request->ajax())
        {
            return DataTables::of($ad_category)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<button data-bs-toggle="modal" data-bs-target="#exampleModaledit'.$data->id.'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> Edit </button>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        $button .= '<a href="'.route('frontend.user.adCategory_delete', $data->id).'" name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModaldelete"> Delete</a>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }


    public function adCategory_store(Request $request)
    {        
        // dd($request);

        $add = new AdCategory;

        $add->name=$request->name;
        $add->country=$request->country;
        $add->country_manager_approval='Approved';  
        $add->admin_approval='Pending'; 
        
        $add->save();

        return back();
    }

    public function adCategory_update(Request $request)
    {        
        // dd($id);

        // dd($request);
        
        $update = new AdCategory;

        $update->name=$request->name;        
        $update->country=$request->country;
        
        AdCategory::whereId($request->hidden_id)->update($update->toArray());

        return back(); 
    }

    public function adCategory_delete($id)
    {        

        // $ad_category = AdCategory::where('id',$id)->first();
        // dd($ad_category);

        $projects = HomePageAdvertisement::where('category',$id)->update(array('category' => null));

        // dd($id);
        $data = AdCategory::findOrFail($id);
        $data->delete();   

        return back();
    }

    public function homepage_AD() {

        $country = Country::where('country_manager',auth()->user()->id)->first();
        // dd($country);

        $ad_category = AdCategory::where('admin_approval','=','Approved')->get();
        // dd($ad_category);

        $homepage_ad = HomePageAdvertisement::orderBy('id', 'DESC')->get();
        // dd($homepage_ad);
    
        return view('frontend.user.homepage_ad',[
            'country' => $country,
            'homepage_ad' => $homepage_ad,
            'ad_category' => $ad_category
        ]);
    } 

    public function homepage_AD_store(Request $request)
    {        
        // dd($request);

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300'      
        // ]);

        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage_advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        $add = new HomePageAdvertisement;

        $add->name=$request->name;
        $add->category=$request->category;
        $add->link=$request->link;
        $add->status=$request->status;
        $add->order=$request->order;
        $add->image=$image_url;
        $add->country=$request->country;
        $add->country_manager_approval='Approved';  
        $add->admin_approval='Pending'; 
        
        $add->save();

        return back();
    }

    public function homepage_AD_update(Request $request)
    {      
        // dd($request);

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300'      
        // ]);


        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/homepage_advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $detail = HomePageAdvertisement::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;
        } 
        
        $update = new HomePageAdvertisement;

        $update->name=$request->name;
        $update->category=$request->category;
        $update->link=$request->link;
        $update->status=$request->status;
        $update->order=$request->order;
        $update->image=$image_url;
        $update->country=$request->country;
        
        HomePageAdvertisement::whereId($request->hidden_id)->update($update->toArray());

        return back(); 
    }

    public function homepage_AD_delete($id)
    {        
        $data = HomePageAdvertisement::findOrFail($id);
        $data->delete();   

        return back();
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
        $add->admin_approval='Pending';  
        $add->country_management_approval='Approved';

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
