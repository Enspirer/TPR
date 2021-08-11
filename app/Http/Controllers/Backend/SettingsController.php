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
                       
                        // $button = '<a href="" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                                        
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }

    public function destroy($id)
    {        
        $data = Settings::findOrFail($id);
        $data->delete();   
    }



}
