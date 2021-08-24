<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\FeaturePropertyUpdateRequest;
use App\Models\Country;
use App\Models\Properties;

class FeaturePropertyUpdateRequestController extends Controller
{
    
    public function index()
    {
        return view('backend.featured_property_update_request.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = FeaturePropertyUpdateRequest::where('admin_approval','=','Pending')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.fpur.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-stamp"></i> Approval </a>';
                        // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->admin_approval == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->admin_approval == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {        

        $fpur = FeaturePropertyUpdateRequest::where('id', $id)->first();

        $country = Country::where('country_name',$fpur->country)->where('status',1)->first();

        // $country_manager = Country::where('country_manager',$user_id)->first();

        $properties = Properties::where('admin_approval', 'Approved')->where('country',$fpur->country)->get();

        // dd($properties);

        return view('backend.featured_property_update_request.features',[
            'properties' => $properties,
            'country' => $country,
            'fpur' => $fpur,
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);        
        
        $update1 = new FeaturePropertyUpdateRequest;

        $update1->admin_approval=$request->admin_approval;

        FeaturePropertyUpdateRequest::whereId($request->hidden_id)->update($update1->toArray());

        if($request->admin_approval == 'Approved'){

            $fpur = FeaturePropertyUpdateRequest::where('id', $request->hidden_id)->first();        

            $country = Country::where('country_name', '=', $fpur->country)->update(array('features_manager' => $fpur->key)); 

        }else{

        }

        return redirect()->route('admin.fpur.index')->withFlashSuccess('Updated Successfully');                      

    }


}
