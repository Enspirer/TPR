<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Country;

class CountryController extends Controller
{
    
    public function index()
    {
        return view('backend.country.index');
    }

    public function create()
    {
        return view('backend.country.create');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Country::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.country.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    // ->addColumn('image', function($data){
                    //     $img = '<img src="'.url('files/awards/',$data->image).'" style="width: 100%">';
                     
                    //     return $img;
                    // })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:25000',
        //     'order' => 'numeric'            
        // ]); 
    
        // if($request->file('image'))
        // {            
        //     $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
        //     $fullURLsPreviewFile = $request->image->move(public_path('files/awards'), $preview_fileName);
        //     $image_url = $preview_fileName;
        // }else{
        //     $image_url = null;
        // } 
        // dd($image_url);

        $addcountry = new Country;

        $addcountry->country_name=$request->country_name; 
        $addcountry->slug=$request->slug;        
        $addcountry->currency=$request->currency;
        $addcountry->country_id=$request->country_id;
        $addcountry->user_id = auth()->user()->id;
        $addcountry->country_manager=$request->country_manager;
        $addcountry->features_flag=$request->features_flag;
        $addcountry->status=$request->status;
        $addcountry->features_manager=$request->features_manager;
        $addcountry->save();

        return redirect()->route('admin.country.index')->withFlashSuccess('Added Successfully');  
    }

    public function edit($id)
    {
        $country = Country::where('id',$id)->first();
        
        // dd($country);              

        return view('backend.country.edit',[
            'country' => $country         
        ]);  
    }

    public function update(Request $request)
    {    
        // $request->validate([
        //     'order' => 'numeric'                
        // ]); 

        $updatcountry = new Country;

        $updatcountry->country_name=$request->country_name; 
        $updatcountry->slug=$request->slug;        
        $updatcountry->currency=$request->currency;
        $updatcountry->country_id=$request->country_id;
        $updatcountry->user_id = auth()->user()->id;
        $updatcountry->country_manager=$request->country_manager;
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
