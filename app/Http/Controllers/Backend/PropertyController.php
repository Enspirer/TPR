<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;

class PropertyController extends Controller
{
    
    public function index()
    {
        return view('backend.property.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::all();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Approval </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('admin_approval', function($data){
                        if($data->admin_approval == 'Approval'){
                            $status = '<span class="badge badge-success">Approval</span>';
                        }elseif($data->admin_approval == 'Decline'){
                            $status = '<span class="badge badge-danger">Decline</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','admin_approval'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();
        
        // dd($property);              

        return view('backend.property.edit',[
            'property' => $property         
        ]);  
    }

    public function update(Request $request)
    {    
        // $request->validate([
        //     'order' => 'numeric'                
        // ]); 

        $updatproperty = new Properties;
        
        $updatproperty->admin_approval=$request->admin_approval;
   
        Properties::whereId($request->hidden_id)->update($updatproperty->toArray());

        return redirect()->route('admin.property.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = Properties::findOrFail($id);
        $data->delete();   
    }


}
