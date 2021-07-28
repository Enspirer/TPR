<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FileManager;
use Illuminate\Http\Request;
use File;

class FileManagerController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$imageName);
        $fileManager = new FileManager;
        $fileManager->file_name = $imageName;
        $fileManager->user_id = auth()->user()->id;
        $fileManager->file_type = $image->getClientOriginalExtension();
        $fileManager->save();
        return 'success';
    }
}
