<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Country;
use App\Models\Properties;
use App\Models\Auth\User;
use Auth;

class CountryController extends Controller
{
    
    public function index()
    {
        return view('backend.country.index');
    }

    public function create()
    {
        $users = User::get();
        return view('backend.country.create', ['users' => $users]);
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Country::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.country.features',$data->id).'" name="feature" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3"><i class="fas fa-edit"></i> Features </a>';
                        $button .= '<a href="'.route('admin.country.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('status', function($data){
                        if($data->status == '1'){
                            $status = '<span class="badge badge-success">Enable</span>';
                        }
                        else{
                            $status = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        $request->validate(
            [
                'lat' => 'required',
                'phone_numbers' => 'required'
            ],
            [
                'lat.required' => 'Country must need to point in the map',
                'phone_numbers.required' => 'Add at least one phone number'
            ]
        );

        $phone_numbers = $request->phone_numbers;
        // dd($phone_numbers);

        $final_array = [];
                    
        foreach($phone_numbers as $key => $number){

            $item_group = [                            
                'number' => $number
            ];

            array_push($final_array,$item_group);
        }      
        // dd($phone_numbers);     

        $user = User::where('email',$request->country_manager)->first();

        if($user == null){
            return back()->withErrors('Select Country Manager');
        }

        $addcountry = new Country;

        $addcountry->country_name=$request->country;
        $addcountry->latitude=$request->lat;
        $addcountry->longitude=$request->lng;

        $addcountry->slug=$request->slug;        
        $addcountry->currency=$request->currency;
        $addcountry->currency_rate=$request->currency_rate;
        $addcountry->country_id=$request->country_id;
        $addcountry->user_id = auth()->user()->id;        
        $addcountry->country_manager=$user->id;
        $addcountry->status=$request->status;

        $addcountry->phone_numbers=json_encode($final_array);
        $addcountry->opening_hours=$request->opening_hours;
        $addcountry->address=$request->address;

        $addcountry->api_provider_name=$request->api_provider_name;
        $addcountry->statistic_api_cliend_id=$request->statistic_api_cliend_id;
        $addcountry->statistic_api_key=$request->statistic_api_key;
        $addcountry->json_url=$request->json_url;

        $addcountry->save();

        return redirect()->route('admin.country.index')->withFlashSuccess('Added Successfully');  
    }

    public function edit($id)
    {
        $country = Country::where('id',$id)->first();
        $users = User::get();
        
        // dd($country);              

        return view('backend.country.edit',[
            'country' => $country,
            'users' => $users
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        $request->validate(
            [
                'lat' => 'required',
                'phone_numbers' => 'required'
            ],
            [
                'lat.required' => 'Country must need to point in the map',
                'phone_numbers.required' => 'Add at least one phone number'
            ]
        );

        $phone_numbers = $request->phone_numbers;
        // dd($phone_numbers);

        $final_array = [];
                    
        foreach($phone_numbers as $key => $number){

            $item_group = [                            
                'number' => $number
            ];

            array_push($final_array,$item_group);
        }      
        // dd($phone_numbers); 

        $user = User::where('email',$request->country_manager)->first();

        if($user == null){
            return back()->withErrors('Select Country Manager');
        }

        $updatcountry = new Country;

        $updatcountry->country_name=$request->country;
        $updatcountry->latitude=$request->lat;
        $updatcountry->longitude=$request->lng;

        $updatcountry->slug=$request->slug;        
        $updatcountry->currency=$request->currency;
        $updatcountry->currency_rate=$request->currency_rate;
        $updatcountry->country_id=$request->country_id;
        $updatcountry->user_id = auth()->user()->id;   
        $updatcountry->country_manager=$user->id;

        $updatcountry->status=$request->status;

        $updatcountry->phone_numbers=json_encode($final_array);
        $updatcountry->opening_hours=$request->opening_hours;
        $updatcountry->address=$request->address;

        $updatcountry->api_provider_name=$request->api_provider_name;
        $updatcountry->statistic_api_cliend_id=$request->statistic_api_cliend_id;
        $updatcountry->statistic_api_key=$request->statistic_api_key;
        $updatcountry->json_url=$request->json_url;
   
        Country::whereId($request->hidden_id)->update($updatcountry->toArray());

        return redirect()->route('admin.country.index')->withFlashSuccess('Updated Successfully');                      

    }


    public function features($id)
    {

        $country = Country::where('id', $id)->first();

        // $country_manager = Country::where('country_manager',$user_id)->first();

        $properties = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->where('country',$country->country_name)->get();

        // dd($properties);

        return view('backend.country.features',[
            'properties' => $properties,
            'country' => $country
        ]);  
    }

    public function featuresUpdate(Request $request)
    {
       
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


        $featuredProperties = DB::table('countries') ->where('id', $request->hid_id)->update(
            [
                'features_manager' => json_encode($final)
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }

    
    

    public function destroy($id)
    {        
        $data = Country::findOrFail($id);
        $data->delete();   
    }




}
