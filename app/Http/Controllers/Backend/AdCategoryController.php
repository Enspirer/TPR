<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\AdCategory;

class AdCategoryController extends Controller
{
    
    public function index()
    {
        return view('backend.ad_category.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = AdCategory::where('country_manager_approval','=','Approved')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-stamp"></i> Approval</button>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-3"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('admin_approval', function($data){
                        if($data->admin_approval == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->admin_approval == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
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
        if(request()->ajax())
        {
            $data = AdCategory::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }


    public function update(Request $request)
    {    
        // dd($request);
        $update = new AdCategory;

        $update->admin_approval=$request->admin_approval;
   
        AdCategory::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.ad_category.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = AdCategory::findOrFail($id);
        $data->delete();   
    }



}
