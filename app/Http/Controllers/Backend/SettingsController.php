<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        return view('backend.settings.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Settings::all();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.settings.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })

                    ->editColumn('status', function($data){
                        if($data->static_value == '1'){
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

    public function edit($id)
    {
        $settings = Settings::where('id',$id)->first();        
        // dd($settings);              
        
        return view('backend.settings.edit',[
            'settings' => $settings         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);
        
        $update = new Settings;

        if($request->text_field){
            $update->key=$request->text_field;
        }
        else{}
        if($request->text_area){
            $update->key=$request->text_area;
        }
        else{}
        if($request->dropdown){
            $update->key=$request->dropdown;
        }
        else{}    
        if($request->checkbox){
            $update->key=$request->checkbox;    
        }
        else{}

        // dd($update->key);
        // $update->status=$request->status;
        // $update->activated_fields=json_encode($out_json);
   
        Settings::whereId($request->hidden_id)->update($update->toArray());
        // return back();   
        return redirect()->route('admin.settings.index')->withFlashSuccess('Updated Successfully');               

    }

    public function destroy($id)
    {        
        $data = Settings::findOrFail($id);
        $data->delete();   
    }



}
