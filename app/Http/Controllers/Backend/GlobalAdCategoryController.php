<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\AdCategory;
use App\Models\GlobalAdCategories;
use App\Models\HomePageAdvertisement;

class GlobalAdCategoryController extends Controller
{
    
    public function index()
    {
        return view('backend.global_ad_category.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = GlobalAdCategories::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.global_ad_categories.edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm ml-3"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })

                    ->addColumn('icon', function($data){
                        $img = '<img src="'.url('files/global_advertisement', $data->icon).'" style="width: 70%">';
                     
                        return $img;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == '1'){
                            $status = '<span class="badge badge-success">Enabled</span>';
                        }else{
                            $status = '<span class="badge badge-danger">Disabled</span>';
                        }

                        return $status;
                    })
                    
                    ->rawColumns(['action', 'icon', 'status'])
                    ->make(true);
        }
        return back();
    }


    public function create()
    {
        return view('backend.global_ad_category.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('new_image');

        if($image != null) {
            $image = $request->file('icon');
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('files/global_advertisement'), $imageName);
        } 
        else {
            $imageName = null;
        }

        $category = new GlobalAdCategories;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->order = $request->order;
        $category->status = $request->status;
        $category->icon = $imageName;

        $category->save();

        return redirect()->route('admin.global_ad_categories.index')->withFlashSuccess('Created Successfully');                      
    }

    public function edit($id)
    {

        $category = GlobalAdCategories::where('id',$id)->first();

        return view('backend.global_ad_category.edit',['category' => $category]);
    }


    public function update(Request $request)
    {    

        $image = $request->file('new_icon');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('files/global_advertisement'), $imageName);
        } 
        else {
            $imageName = $request->old_icon;
        }

        $category = DB::table('global_ad_categories') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'order' => $request->order,
                'icon' => $imageName,
                'status' => $request->status
            ]
        );
        return redirect()->route('admin.global_ad_categories.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $category = GlobalAdCategories::where('id', $id)->delete();  

        $ad = DB::table('global_advertisement') ->where('global_category', $id)->update(
            [
                'status' => 0
            ]
        );
    }



}
