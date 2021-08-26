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


        $user = User::where('email',$request->country_manager)->first();

        $addcountry = new Country;

        $addcountry->country_name=$request->country_name; 
        $addcountry->slug=$request->slug;        
        $addcountry->currency=$request->currency;
        $addcountry->currency_rate=$request->currency_rate;
        $addcountry->country_id=$request->country_id;
        $addcountry->user_id = auth()->user()->id;

        $addcountry->country_manager=$user->id;

        $addcountry->features_flag=$request->features_flag;
        $addcountry->status=$request->status;
        $addcountry->features_manager=$request->features_manager;
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

    public function features($id)
    {

        $country = Country::where('id', $id)->first();

        // $country_manager = Country::where('country_manager',$user_id)->first();

        $properties = Properties::where('admin_approval', 'Approved')->where('country',$country->country_name)->get();

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

        return back();
    }

    
    public function update(Request $request)
    {    

        $user = User::where('email',$request->country_manager)->first();

        $updatcountry = new Country;

        $updatcountry->country_name=$request->country_name; 
        $updatcountry->slug=$request->slug;        
        $updatcountry->currency=$request->currency;
        $updatcountry->currency_rate=$request->currency_rate;
        $updatcountry->country_id=$request->country_id;
        $updatcountry->user_id = auth()->user()->id;

        $updatcountry->country_manager=$user->id;

        $updatcountry->features_flag=$request->features_flag;
        $updatcountry->status=$request->status;
        $updatcountry->features_manager=$request->features_manager;
   
        Country::whereId($request->hidden_id)->update($updatcountry->toArray());

        return redirect()->route('admin.country.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = Country::findOrFail($id);
        $data->delete();   
    }




}
