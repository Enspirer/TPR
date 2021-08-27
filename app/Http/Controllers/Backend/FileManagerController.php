<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\FileManager;


class FileManagerController extends Controller
{ 
    
    public function index()
    {
        return view('backend.file_manager.index');
    }

    public function getDetails(Request $request)
    {        
        if($request->ajax())
        {
            $data = FileManager::get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                    
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->addColumn('image', function($data){
                        $img = '<img src="'.url('images',$data->file_name).'" style="width: 70%">';
                     
                        return $img;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return back();
    }

    public function destroy($id)
    {        
        $data = FileManager::findOrFail($id);
        $data->delete();   
    }
}
