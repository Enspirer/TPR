<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;

/**
 * Class DashboardController.
 */
class AgentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.agent');
    }

    public function store(Request $request)
    {        
        // dd($request);

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:20000',
        //     'order' => 'numeric'            
        // ]); 
    
        if($request->file('photo'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->photo->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->photo->move(public_path('files/agent_request'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 

        if($request->file('nic_photo'))
        {            
            $preview_fileName1 = time().'_'.rand(1000,10000).'.'.$request->nic_photo->getClientOriginalExtension();
            $fullURLsPreviewFile1 = $request->nic_photo->move(public_path('files/agent_request'), $preview_fileName1);
            $image_url1 = $preview_fileName1;
        }else{
            $image_url1 = null;
        } 
        if($request->file('passport_photo'))
        {            
            $preview_fileName2 = time().'_'.rand(1000,10000).'.'.$request->passport_photo->getClientOriginalExtension();
            $fullURLsPreviewFile2 = $request->passport_photo->move(public_path('files/agent_request'), $preview_fileName2);
            $image_url2 = $preview_fileName2;
        }else{
            $image_url2 = null;
        } 
        if($request->file('license_photo'))
        {            
            $preview_fileName3 = time().'_'.rand(1000,10000).'.'.$request->license_photo->getClientOriginalExtension();
            $fullURLsPreviewFile3 = $request->license_photo->move(public_path('files/agent_request'), $preview_fileName3);
            $image_url3 = $preview_fileName3;
        }else{
            $image_url3 = null;
        } 

        $addagent = new AgentRequest;

        $addagent->country=$request->country; 
        $addagent->name=$request->name;        
        $addagent->agent_type=$request->agent_type;
        $addagent->company_name=$request->company_name;
        $addagent->company_registration_number=$request->company_reg_no;
        $addagent->photo=$image_url;
        $addagent->email=$request->email; 
        $addagent->request=$request->request_field;        
        $addagent->tax_number=$request->tax;        
        $addagent->address=$request->address;
        $addagent->telephone=$request->telephone;
        $addagent->description_message=$request->description_msg;
        $addagent->status='Pending';

        $addagent->validation_type=$request->validate;
        // $addagent->nic=$request->selected_validate;

        if($request->validate == 'NIC'){
            $addagent->nic=$request->nic;
        }elseif($request->validate == 'Passport'){
            $addagent->passport=$request->passport;
        }else{
            $addagent->license=$request->license;
        }

        if($request->validate == 'NIC'){
            $addagent->nic_photo=$image_url1;
        }elseif($request->validate == 'Passport'){
            $addagent->passport_photo=$image_url2;
        }else{
            $addagent->license_photo=$image_url3;
        }        

        $addagent->save();

        session()->flash('message','Thanks!');

        return back();                      

    }










    public function properties()
    {
        return view('frontend.user.properties');
    }

    public function createProperty()
    {
        return view('frontend.user.create-property');
    }

    public function bookingBox()
    {
        return view('frontend.user.booking');
    }

    public function userChat()
    {
        return view('frontend.user.user-chat');
    }

    public function company()
    {
        return view('frontend.user.company');
    }

    public function companyProperty()
    {
        return view('frontend.user.company-property');
    }
}
