<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Auth\User;
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
        $user_id = auth()->user()->id;

        $agent_edit = AgentRequest::where('user_id',$user_id)->first();
        $user_edit = User::where('id',$user_id)->first();

        // dd($agent_edit);
        
        return view('frontend.user.dashboard',[
            'agent_edit' => $agent_edit,
            'user_edit' => $user_edit
        ]);
    }

    public function editAgent(Request $request)
    {        
        // dd($request);

        if($request->file('photo'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->photo->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->photo->move(public_path('files/agent_request'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url = $detail->photo;            
        } 

        if($request->file('nic_photo'))
        {            
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->nic_photo->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->nic_photo->move(public_path('files/agent_request'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url1 = $detail->nic_photo;  
        } 
        if($request->file('passport_photo'))
        {            
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->passport_photo->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->passport_photo->move(public_path('files/agent_request'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url2 = $detail->passport_photo; 
        } 
        if($request->file('license_photo'))
        {            
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->license_photo->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->license_photo->move(public_path('files/agent_request'), $preview_fileName3);
            $image_url3 = $preview_fileName3;
        }else{
            $detail = AgentRequest::where('id',$request->hidden_id)->first();
            $image_url3 = $detail->license_photo; 
        } 
       

        if($request->file('cover_photo'))
        {            
            $preview_fileName4 = time().'_'.rand(1000,10000).'.'.$request->cover_photo->getClientOriginalExtension();
            $fullURLsPreviewFile4 = $request->cover_photo->move(public_path('files/agent_request'), $preview_fileName4);
            $image_url4 = $preview_fileName4;
        }
        else{    
            $details = AgentRequest::where('id',$request->hidden_id)->first();        
            $image_url4 = $details->cover_photo; 
        } 


        $edit_agent = new AgentRequest;

        $edit_agent->country=$request->country; 
        $edit_agent->name=$request->name;        
        $edit_agent->agent_type=$request->agent_type;
        $edit_agent->company_name=$request->company_name;
        $edit_agent->company_registration_number=$request->company_reg_no;
        $edit_agent->photo=$image_url;
        $edit_agent->email=$request->email; 
        $edit_agent->request=$request->request_field;        
        $edit_agent->tax_number=$request->tax;        
        $edit_agent->address=$request->address;
        $edit_agent->telephone=$request->telephone;
        $edit_agent->description_message=$request->description_msg;
        $edit_agent->status='Pending';
        $edit_agent->user_id = auth()->user()->id;

        $edit_agent->cover_photo=$image_url4; 

        $edit_agent->validation_type=$request->validate;

        if($request->validate == 'NIC'){
            $edit_agent->nic=$request->nic;
        }elseif($request->validate == 'Passport'){
            $edit_agent->passport=$request->passport;
        }else{
            $edit_agent->license=$request->license;
        }

        if($request->validate == 'NIC'){
            $edit_agent->nic_photo=$image_url1;
        }elseif($request->validate == 'Passport'){
            $edit_agent->passport_photo=$image_url2;
        }else{
            $edit_agent->license_photo=$image_url3;
        }        
        
        AgentRequest::whereId($request->hidden_id)->update($edit_agent->toArray());

        session()->flash('message','Thanks!');

        return back();                      

    }

    public function communications() {
        return view('frontend.user.communications');
    }

    public function accountDashboard()
    {
        return view('frontend.user.account-dashboard');
    }

    public function store(Request $request) {
        // dd($request);

        // $user = new User;

        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->email = $request->email;
        // $user->display_name = $request->display_name;

        // User::whereId($request->hid_id)->update($user->toArray());

        // return back();

        // if (!isset($res)) 
        //     $res = new stdClass();

        //     $res->success = false;

        // $user_id = auth()->user()->id;

        $first_name = request('first_name');
        $last_name = request('last_name');
        $email = request('email');
        $display_name = request('display_name');
        $user_type = request('user_type');
        $dob = request('dob');
        $gender = request('gender');
        $marital = request('marital');
        $city = request('city');
        $province = request('province');
        $country = request('country');
        $postal_code = request('postal_code');
        $home_phone = request('home_phone');
        $mobile_phone = request('mobile_phone');

        $users = DB::table('users') ->where('id', '=', request('hid_id'))->update(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'display_name' => $display_name,
                'user_type' => $user_type,
                'dob' => $dob,
                'gender' => $gender,
                'marital_status' => $marital,
                'city' => $city,
                'province' => $province,
                'country' => $country,
                'postal_code' => $postal_code,
                'home_phone' => $home_phone,
                'mobile_phone' => $mobile_phone,
                

            ]
        );

        return redirect('/dashboard');


    }

    public function favourites()
    {
        return view('frontend.user.favourites');
    }
}
