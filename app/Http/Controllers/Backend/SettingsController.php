<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Settings;
use App\Models\Country;

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
            $data = Settings::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        // $button = '<a href="'.route('admin.settings.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('key', function($data){
                        
                        $key = '<span style="overflow: hidden; width:150px; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">'.$data->key.'</span>';
                        return $key;
                    })
                                        
                    ->rawColumns(['action','key'])
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



    public function landing_page()
    {
        $country_list = Country::where('features_manager','!=', null)->where('status',1)->get();
        // dd($country_list);

        return view('backend.settings.landing_page',[
            'country_list' => $country_list
        ]);
    }

    public function landing_page_update(Request $request)
    {            
        $update = new Settings;

        if($request->psection1){
            $update->key=$request->psection1;
            Settings::where('name','=','landing_page_psection_1')->update($update->toArray());
        }

        if($request->psection1){
            $update->key=$request->psection2;
            Settings::where('name','=','landing_page_psection_2')->update($update->toArray());
        }

        return back()->withFlashSuccess('Updated Successfully');                

    }


    public function pro_cal()
    {  
        $api_client_id = Settings::where('name','=','api_client_id')->first();
        $api_key = Settings::where('name','=','api_key')->first();
        $url = Settings::where('name','=','url')->first();

        return view('backend.settings.pro_cal',[
            'api_client_id' => $api_client_id,
            'api_key' => $api_key,
            'url' => $url
        ]);
    }

    public function pro_cal_update(Request $request)
    {  
        $update = new Settings;

        if($request->api_client_id){
            $update->key=$request->api_client_id;
            Settings::where('name','=','api_client_id')->update($update->toArray());
        }

        if($request->api_key){
            $update->key=$request->api_key;
            Settings::where('name','=','api_key')->update($update->toArray());
        }

        if($request->url){
            $update->key=$request->url;
            Settings::where('name','=','url')->update($update->toArray());
        }


        return back()->withFlashSuccess('Updated Successfully');                
    }


}
