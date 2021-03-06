<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\HomePageAdvertisement;
use App\Models\AdCategory;


class HomePageAdvertisementController extends Controller
{
    
    public function index()
    {
        return view('backend.homepage_advertisement.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = HomePageAdvertisement::where('country_manager_approval','=','Approved')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.homepage_advertisement.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-3"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('image', function($data){
                        $img = '<img src="'.url('files/homepage_advertisement',$data->image).'" style="width: 80%">';                     
                        return $img;
                    })

                    ->addColumn('category', function($data){
                        
                        if($data->category == null){
                            $details = '<span class="badge badge-danger">Not Set</span>';
                        }else{
                        $ad_category = AdCategory::where('id',$data->category)->where('admin_approval', '=', 'Approved')->first();
                        
                        $details = $ad_category->name;

                        }
                        return $details;
                        
                    })
                    
                    ->addColumn('admin_approval', function($data){
                        if($data->admin_approval == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->admin_approval == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','admin_approval','image','category'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $homepage_advertisement = HomePageAdvertisement::where('id',$id)->first();

        $ad_category = AdCategory::where('id',$homepage_advertisement->category)->first();
        // dd($ad_category);              
        
        return view('backend.homepage_advertisement.edit',[
            'homepage_advertisement' => $homepage_advertisement  ,
            'ad_category' => $ad_category       
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);
        $update = new HomePageAdvertisement;

        $update->admin_approval=$request->admin_approval;
   
        HomePageAdvertisement::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.homepage_advertisement.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = HomePageAdvertisement::findOrFail($id);
        $data->delete();   
    }

}
