<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\PropertyType;
use App\Models\Properties;
use App\Models\PropertyTypeParameter;
use App\Models\Auth\User;
use Auth;
use App\Models\Booking;

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
        $countries = Country::where('status',1)->get();
        return view('frontend.user.agent',[
            'countries' => $countries
        ]);
    }

    public function store(Request $request)
    {               
    
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
        $addagent->city=$request->city; 
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
        $addagent->country_manager_approval = 'Pending';
        $addagent->user_id = auth()->user()->id;

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

    public function agent_edit()
    {
        $user_id = auth()->user()->id;

        $agent_edit = AgentRequest::where('user_id',$user_id)->first();
        $user_edit = User::where('id',$user_id)->first();

        $countries = Country::where('status',1)->get();

        // dd($agent_edit);
        
        return view('frontend.user.agent_edit',[
            'agent_edit' => $agent_edit,
            'user_edit' => $user_edit,
            'countries' => $countries
        ]);
    }

    public function update_agent(Request $request)
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
        $edit_agent->city=$request->city; 
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
        // $edit_agent->status='Pending';
        // $edit_agent->country_manager_approval = 'Pending';
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


    public function properties()
    {
        $id = Auth::user()->id;
        $properties = Properties::where('user_id',  $id)->orderBy('id','DESC')->get();

        return view('frontend.user.properties', ['properties' => $properties]);
    }

    public function createProperty()
    {
        $property_type = PropertyType::where('status','=','1')->get();

        $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        $agent_request_country = $agent_request->country;
        // dd($agent_request_country);
      

        return view('frontend.user.create-property',[
            'property_type' => $property_type,
            'agent_request_country' => $agent_request_country
        ]);
    }

    public function editProperty($id) {

        $property_type = PropertyType::where('status','=','1')->get();
        $property = Properties::where('id', $id)->first();
        $images = json_decode($property->image_ids);
        $interior_image = json_decode($property->interior_image);

        $agent_request = AgentRequest::where('user_id',auth()->user()->id)->first();
        $agent_request_country = $agent_request->country;
        // dd($agent_request_country);

        return view('frontend.user.property-edit', [
            'property' => $property,
            'property_type' => $property_type,
            'images' => $images,
            'agent_request_country' => $agent_request_country,
            'interior_image' => $interior_image
        ]);
    }

    public function updateProperty(Request $request) {
        // dd($request);

        //This is JSon Form Data -
        // $details_forms = self::getDynamicFormData($request->all());

        // dd($details_forms);

        $request->validate([
            'lat' => 'required',
            'featured_image' => 'required'
        ],
        [
            'lat.required' => 'Property location must need to point in the map',
            'featured_image.required' => 'Property featured image must need to add to create a property'
        ]
    );


        $out_json = $request->property_images;


        $name = $request->name;
        $propertyType = request('propertyType');
        $lat = request('lat');
        $lng = request('lng');
        $country = request('country');
        $price = request('price');
        $category = request('category');
        $feature_image_id = request('featured_image');
        $images = json_encode($out_json);
        $meta_description = request('meta_description');
        $slug = request('slug');
        $transaction_type = request('transaction_type');
        $city = request('city');
        $land_size = $request->land_size;
        $zoning_type = $request->zoning_type;
        $number_of_units = $request->number_of_units;
        $building_size = $request->building_size;
        $farm_type = $request->farm_type;
        $building_type = $request->building_type;
        $open_house_only = $request->open_house_only;
        $parking_type = $request->parking_type;
        $beds = $request->beds;
        $baths = $request->baths;
        $country = $request->country;
        $description = $request->description;
        // $details_forms_submit = json_encode($details_forms);
        $details_forms_submit=$request->json_form_data;
        $states=$request->states;
        $postal_code=$request->postal_code;
        $address_one=$request->address_line_one;
        $address_two=$request->address_line_two;
        $virtual_tour=$request->virtual_tour;
        $virtual_tour_access=$request->virtual_tour_access;
        $search_keyword=$request->search_keyword;
        $interior_image=$request->interior_image;
        $interior_image_access=$request->interior_image_access;

        $admin_approval='Pending';
        $country_manager_approval='Pending';

        
        $property = DB::table('properties') ->where('id', '=', request('hid_id'))->update(
            [
                'name' => $name,
                'description' => $description,
                'property_type' => $propertyType,
                'lat' => $lat,
                'long' => $lng,
                'price' => $price,
                'main_category' => $category,
                'feature_image_id' => $feature_image_id,
                'image_ids' => $images,
                'meta_description' => $meta_description,
                'slug' => $slug,
                'transaction_type' => $transaction_type,
                'land_size' => $land_size,
                'zoning_type' => $zoning_type,
                'number_of_units' => $number_of_units,
                'building_size' => $building_size,
                'farm_type' => $farm_type,
                'building_type' => $building_type,
                'open_house_only' => $open_house_only,
                'parking_type' => $parking_type,
                'beds' => $beds,
                'country' => $country,
                'baths' => $baths,
                'city' => $city,
                'admin_approval' => $admin_approval,
                'country_manager_approval' => $country_manager_approval,
                'external_parameter' => $details_forms_submit,
                'states' => $states,
                'postal_code' => $postal_code,
                'address_one' => $address_one,
                'address_two' => $address_two,
                'virtual_tour' => $virtual_tour,
                'virtual_tour_access' => $virtual_tour_access,
                'interior_image' => json_encode($interior_image),
                'interior_image_access' => $interior_image_access,
                'search_keyword' => $search_keyword
            ]
        );

        

        return redirect('/properties');
    }

    public function deleteProperty($id) {

        $property = Properties::where('id', $id)->delete();

        return back();
    }

    public function pending_status($id) {

        $updatproperty_cancel = new Properties;
        
        $updatproperty_cancel->sold_request = null;
   
        Properties::whereId($id)->update($updatproperty_cancel->toArray());

        return back();
    }

    public function sold_status($id) {

        $updatproperty_sold = new Properties;
        
        $updatproperty_sold->sold_request='Pending';
   
        Properties::whereId($id)->update($updatproperty_sold->toArray());

        return back();
    }

    public static function getDynamicFormData($requst)
    {
        $reqOut = [];
        foreach ($requst as $key => $req) {
            if (strpos($key, 'json_form_') !== false) {

                $reqOut[$key] = $requst[$key];
            } else {

            }
        }
        return $reqOut;
    }

    


    public function createPropertyStore(Request $request)
    {
        // dd($request);
        //This is JSon Form Data -
        // $details_forms = self::getDynamicFormData($request->all());

        //dd($details_forms);

        $request->validate([
            'lat' => 'required',
            'featured_image' => 'required'
        ],
        [
            'lat.required' => 'Property location must need to point in the map',
            'featured_image.required' => 'Property featured image must need to add to create a property'
        ]
    );

        $out_json = $request->property_images;
        $out_json_interior_image = $request->interior_image;

        $addprop = new Properties;

        $addprop->name=$request->name; 
        $addprop->property_type=$request->propertyType;        
        $addprop->lat=$request->lat;
        $addprop->long=$request->lng;
        $addprop->price=$request->price;
        $addprop->main_category=$request->category; 
        $addprop->meta_description=$request->meta_description;        
        $addprop->slug=$request->slug;        
        $addprop->transaction_type=$request->transaction_type;
        $addprop->feature_image_id=$request->featured_image;
        $addprop->image_ids=json_encode($out_json);
        $addprop->admin_approval='Pending';
        $addprop->country_manager_approval='Pending';
        $addprop->user_id = auth()->user()->id;
        $addprop->city=$request->city;
        $addprop->description=$request->description;
        $addprop->states=$request->states;
        $addprop->postal_code=$request->postal_code;
        $addprop->address_one=$request->address_line_one;
        $addprop->address_two=$request->address_line_two;
        $addprop->virtual_tour=$request->virtual_tour;
        $addprop->virtual_tour_access=$request->virtual_tour_access;
        $addprop->search_keyword=$request->search_keyword;
        $addprop->interior_image=json_encode($out_json_interior_image);
        $addprop->interior_image_access=$request->interior_image_access;
        $addprop->external_parameter=$request->json_form_data;

        $addprop->country = $request->country;      
        

        if($request->land_size){
            $addprop->land_size=$request->land_size;
        }else{}
        if($request->zoning_type){
            $addprop->zoning_type=$request->zoning_type;
        }else{}
        if($request->number_of_units){
            $addprop->number_of_units=$request->number_of_units;
        }else{}
        if($request->building_size){
            $addprop->building_size=$request->building_size;
        }else{}
        if($request->farm_type){
            $addprop->farm_type=$request->farm_type;
        }else{}
        if($request->building_type){
            $addprop->building_type=$request->building_type;
        }else{}
        if($request->open_house_only){
            $addprop->open_house_only=$request->open_house_only;
        }else{}
        if($request->parking_type){
            $addprop->parking_type=$request->parking_type;
        }else{}
        if($request->beds){
            $addprop->beds=$request->beds;        
        }else{}
        if($request->baths){
            $addprop->baths=$request->baths;       
        }else{}

        $addprop->save();

        session()->flash('message','Thanks!');

        return back();                      

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

    public function agentBookings()
    {
        $agent = AgentRequest::where('user_id', auth()->user()->id)->first();

        // dd($agent->id);

        $bookings = Booking::where('agent_id', $agent->id)->orderBy('id','DESC')->get();

        // dd($bookings);

        return view('frontend.user.agent-bookings',[
            'bookings' => $bookings
        ]);
    }

    public function agentBookingsRespond()
    {
        $booking = DB::table('bookings') ->where('id', '=', request('hid_id'))->update(
            [
                'status' => 'Responded'
            ]
        );

        return back();
    }
}
