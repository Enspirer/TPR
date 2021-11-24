<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Country;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Auth\User;
use App\Models\Feedback;
use App\Models\AdCategory;
use App\Models\HomePageAdvertisement;
use App\Models\SidebarAd;
use App\Models\FeaturePropertyUpdateRequest;
use App\Models\PropertyTypeParameter;
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
        $user_id = auth()->user()->id;

        $country = Country::where('country_manager',$user_id)->where('status',1)->first();

        $approvedProperties = Properties::get()->where('admin_approval' , 'Approved')->where('country',$country->country_name)->count();

        $disapprovedProperties = Properties::get()->where('admin_approval' , 'Disapproved')->where('country', $country->country_name)->count();

        $supports = Feedback::get()->where('status', 'Pending')->where('country', $country->id)->count();


        return view('frontend.user.property-dashboard', [
            'approvedProperties' => $approvedProperties,
            'disapprovedProperties' => $disapprovedProperties,
            'supports' => $supports
        ]);
    }




    public function home_page_feature()
    {
        $user_id = auth()->user()->id;

        $country = Country::where('country_manager',$user_id)->where('status',1)->first();
        // dd($country);

        $fpur = FeaturePropertyUpdateRequest::where('user_id',$user_id)->first();

        $properties = Properties::where('admin_approval', 'Approved')->where('country',$country->country_name)->get();
        // dd($properties);
     
        return view('frontend.user.home-page-feature',[
            'properties' => $properties,
            'country' => $country,
            'fpur' => $fpur
        ]);
    }

    public function home_page_feature_Update(Request $request)
    {
        $user_id = auth()->user()->id;

        $country = Country::where('country_manager',$user_id)->where('status',1)->first();

        $title1 = $request->featureTitle1;
        $title2 = $request->featureTitle2;

        $out_json1 = $request->properties1;
        $out_json2 = $request->properties2;

        $array1 = [
            'title' => $title1,
            'properties' => $out_json1
        ];

        $array2 = [
            'title' => $title2,
            'properties' => $out_json2
        ];

        $final = [$array1, $array2];

        // $featuredProperties = DB::table('feature_property_update_requests') ->where('id', $request->hid_id)->update(
        //     [
        //         'key' => json_encode($final),
        //         'admin_approval' => 'Pending',
        //         'user_id' => $user_id,


        //     ]
        // );

        $fpur = FeaturePropertyUpdateRequest::where('country', $country->country_name)->first();

        if($fpur == null){
            DB::table('feature_property_update_requests')->insert([
                'key' => json_encode($final),
                'admin_approval' => 'Pending',
                'user_id' => $user_id,
                'country' => $country->country_name
            ]);
        }
        else{
            $featuredProperties = DB::table('feature_property_update_requests') ->where('country', $country->country_name)->update(
                    [
                        'key' => json_encode($final),
                        'admin_approval' => 'Pending',
                        'user_id' => $user_id,
                        'country' => $country->country_name       
        
                    ]
                );

        }        

        return back();
    }


    public function propertyApproval() {

        // $user_id = auth()->user()->id;

        // $country_manager = Country::where('country_manager',$user_id)->where('status',1)->first();

        // $properties = Properties::where('country', $country_manager->country_name)->orderBy('id','DESC')->get();

        return view('frontend.user.property-approval');
    }

    public function getPropertyApproval(Request $request)
    {

        $user_id = auth()->user()->id;

        $country_manager = Country::where('country_manager',$user_id)->where('status',1)->first();

        $properties = Properties::where('country', $country_manager->country_name)->orderBy('id','DESC')->get();


        if($request->ajax())
        {
            return DataTables::of($properties)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-property-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

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

        // $countries = Country::whereIn('id',$final_out)->where('status',1)->get();

        return view('frontend.user.supports');
    }

    public function getSupports(Request $request) {

        // $feedback = Feedback::orderBy('id', 'DESC')->get();

        $user_id = auth()->user()->id;

        $country = Country::where('country_manager',$user_id)->where('status',1)->first();

        $feedback = Feedback::where('country', $country->id)->orderBy('id', 'DESC')->get();



        // $final_out = [];
        // foreach($feedback as $feed){
        //     array_push($final_out,$feed->country);
        // }

        // $countries = Country::whereIn('id',$final_out)->where('status',1)->get();


        if($request->ajax())
        {
            return DataTables::of($feedback)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.supports.edit', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        // $button .= '<a href="'.route('frontend.user.supports.delete', $data->id).'" name="delete" id="'.$data->id.'" class="btn text-light table-btn" style="background-color: #FF2C4B;" > Delete</a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';

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

        $user_details = User::where('id',$supports->user_id)->first();
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
        
        // $country_manager = Country::where('country_manager',$user_id)->where('status',1)->first();

        // $agent_request = AgentRequest::where('country',$country_manager->country_name)->get();

        return view('frontend.user.agent-approval');
    }

    public function getAgentApproval(Request $request) {

        $user_id = auth()->user()->id;
        
        $country_manager = Country::where('country_manager',$user_id)->where('status',1)->first();

        $agent_request = AgentRequest::where('country',$country_manager->country_name)->orderBy('id','DESC')->get();


        if($request->ajax())
        {
            return DataTables::of($agent_request)
                    ->addColumn('action', function($data){
                       
                       
                        $button = '<a href="'.route('frontend.user.single-agent-approval', $data->id).'" name="edit" id="'.$data->id.'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> View </a>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

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

        $property_type = PropertyType::where('id', $single_approval->property_type)->first();

        $agent_details = AgentRequest::where('user_id', $single_approval->user_id)->first();        

        $images = json_decode($single_approval->image_ids);

        return view('frontend.user.single-property-approval', [
            'single_approval'=> $single_approval,
            'images' => $images,
            'property_type' => $property_type,
            'agent_details' => $agent_details
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
    

    public function adCategory() {

        $country = Country::where('country_manager',auth()->user()->id)->where('status',1)->first();
        // dd($country);

        $ad_category = AdCategory::where('country', $country->country_name)->orderBy('id', 'DESC')->get();
        // dd($ad_category);
    
        return view('frontend.user.ad_category',[
            'country' => $country,
            'ad_category' => $ad_category
        ]);
    }  


    public function getAdCategory(Request $request) {

        $country = Country::where('country_manager',auth()->user()->id)->where('status',1)->first();

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
        $update->country_manager_approval='Approved';  
        $update->admin_approval='Pending'; 
        
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

        $country = Country::where('country_manager',auth()->user()->id)->where('status',1)->first();
        // dd($country);

        $ad_category = AdCategory::where('country', $country->country_name)->where('admin_approval','=','Approved')->get();
        // dd($ad_category);

        $homepage_ad = HomePageAdvertisement::where('country', $country->country_name)->orderBy('id', 'DESC')->get();
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
        $add->description=$request->description;
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
        $update->description=$request->description;
        $update->order=$request->order;
        $update->image=$image_url;
        $update->country=$request->country;
        $update->country_manager_approval='Approved';  
        $update->admin_approval='Pending'; 
        
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

        $country = Country::where('country_manager',auth()->user()->id)->where('status',1)->first();
        // dd($country);

        $ad1 = SidebarAd::where('country', $country->country_name)->where('other', '=', 'ad1')->first();
        $ad2 = SidebarAd::where('country', $country->country_name)->where('other', '=', 'ad2')->first();
        // dd($ad1);

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
        $add->country_management_approval='Approved';
        $add->admin_approval='Pending';  

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
        $update->country_management_approval='Approved';
        $update->admin_approval='Pending'; 

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

    public function property_type_parameter() {

        $property_type = PropertyType::where('status',1)->get();
            
        return view('frontend.user.property_type_parameter',[
            'property_type' => $property_type
        ]);
    }  

    public function get_property_type(Request $request) {

        $property_type = PropertyType::where('status',1)->get();



            return DataTables::of($property_type)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('frontend.user.external_parameter',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3"> External Parameter </a>';
                    return $button;
                })
                ->addColumn('status', function($data){
                    $stack = PropertyTypeParameter::where('property_type_id',$data->id)->first();
                    if($stack == null){
                        $status = '<span>Not Set</span>';
                        return $status;
                    }else{
                        if( $stack->status == 'Approved'){

                            $status = '<span>Approved</span>';
                            return $status;
                        }elseif($stack->status == 'Disapproved'){
    
                            $status = '<span>Disapproved</span>';
                            return $status;
                        }else{
    
                            $status = '<span>Pending</span>';
                            return $status;
                        }
                    }
                    
                })
                        
                ->rawColumns(['action','status'])
                ->make(true);


    }

    public function external_parameter($id) {

        $property_type = PropertyType::where('id',$id)->first();
        $type_parameter = PropertyTypeParameter::where('property_type_id',$id)->first();

        if($type_parameter != null){
            $type_parameter_decode = json_decode($type_parameter->form_json);
            $type_parameter_id = $type_parameter->id;
        }else{
            $type_parameter_decode = null;
            $type_parameter_id = null;
        }
            
        return view('frontend.user.external_parameter',[
            'type_parameter_decode' => $type_parameter_decode,
            'type_parameter_id' => $type_parameter_id,
            'property_type' => $property_type
        ]);
    }


    public function external_parameter_store(Request $request)
    {
        // dd($request);
        $re_rush = self::form_name_changes($request->property_type_form_data);




        $type_parameter_id = $request->type_parameter_id;
        $property_type = $request->property_type;
        $property_type_form_data = $re_rush;
        $user_id = auth()->user()->id;
        $country = Country::where('country_manager',auth()->user()->id)->first()->country_name;
        // dd($type_parameter_id);

        $ptp = PropertyTypeParameter::where('id',$type_parameter_id)->first();
        // dd($ptp);    
        
        if($ptp == null){

            $add  = new PropertyTypeParameter;
            
            $add->property_type_id = $property_type;
            $add->country = $country;
            $add->user_id = $user_id;
            $add->form_json = $property_type_form_data;
            $add->status = 'Pending';
            $add->save();

            return redirect()->route('frontend.user.property_type_parameter')->withFlashSuccess('Added Successfully');

        }else{

            $update  = new PropertyTypeParameter;
            $update->property_type_id = $property_type;
            $update->country = $country;
            $update->user_id = $user_id;
            $update->form_json = $property_type_form_data;
            $update->status = 'Pending';

            PropertyTypeParameter::where('property_type_id',$property_type)->update($update->toArray());

            return redirect()->route('frontend.user.property_type_parameter')->withFlashSuccess('Updated Successfully');

        }        


    }

    public static function form_name_changes ($jsonData)
    {
        $jsondecodedfiles = json_decode($jsonData);

        $finalOut =[];

        foreach ($jsondecodedfiles as $item)
        {

            $item->name = 'json_form_'.$item->name;
//            array_push($finalOut, $subOut);
            array_push($finalOut,$item);

        }

        return json_encode($finalOut);

    }


    // public function adCategory_update(Request $request)
    // {                
    //     $update = new AdCategory;

    //     $update->name=$request->name;        
    //     $update->country=$request->country;
    //     $update->country_manager_approval='Approved';  
    //     $update->admin_approval='Pending'; 
        
    //     AdCategory::whereId($request->hidden_id)->update($update->toArray());

    //     return back(); 
    // }

    // public function adCategory_delete($id)
    // {        
    //     $projects = HomePageAdvertisement::where('category',$id)->update(array('category' => null));

    //     $data = AdCategory::findOrFail($id);
    //     $data->delete();   

    //     return back();
    // }


}
