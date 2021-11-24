<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\PropertyTypeParameter;
use App\Models\PropertyType;

class TypeParameterController extends Controller
{
    public function index()
    {
        return view('backend.type_parameter.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = PropertyTypeParameter::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property_parameter.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-stamp"></i> Approval </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('type', function($data){
                        
                        if(PropertyType::where('id',$data->property_type_id) == null){
                            $details = '<span class="badge badge-danger">Not Set</span>';
                        }else{
                            $pt = PropertyType::where('id',$data->property_type_id)->first();                        
                            $details = $pt->property_type_name;
                        }
                        return $details;
                        
                    })                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->status == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status','type'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $type_parameter = PropertyTypeParameter::where('id',$id)->first();
        $type_parameter_decode = json_decode($type_parameter->form_json);
        
        // dd($type_parameter);              

        return view('backend.type_parameter.edit',[
            'type_parameter' => $type_parameter,
            'type_parameter_decode' => $type_parameter_decode         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);
       
        $update = new PropertyTypeParameter;
        
        $update->form_json = $request->property_type_form_data;
        $update->status = $request->status;
   
        PropertyTypeParameter::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.property_parameter.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = PropertyTypeParameter::findOrFail($id);
        $data->delete();   
    }


}
