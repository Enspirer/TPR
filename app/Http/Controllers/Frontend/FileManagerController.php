<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FileManager;
use Illuminate\Http\Request;
use File;
use Image;

use DataTables;

class FileManagerController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

        $imgFile = Image::make($image->getRealPath());

        $imgFile->insert('tropical_logo.png')->save(public_path('/images').'/'.$imageName); 

        // $image->move(public_path('images'),$imageName);


        $fileManager = new FileManager;
        $fileManager->file_name = $imageName;
        $fileManager->user_id = auth()->user()->id;
        $fileManager->file_type = $image->getClientOriginalExtension();
        $fileManager->save();
        return 'success';
    }

    public function get_files()
    {
        $files = Filemanager::get();
        return Datatables::of($files)
            ->addColumn('file', function($row){
                return '<img src="'.url('images',$row->file_name).'" style="height: 40px;">';
            })

            ->addColumn('action', function($row){
                $btn1 = '<a class="edit btn btn-primary btn-sm append"><i class="fa fa-check-circle"></i></a>';
                return $btn1;
            })
            ->rawColumns(['action','file'])
            ->make();
    }
}
