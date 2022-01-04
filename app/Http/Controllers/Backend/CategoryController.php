<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.blog_category.index');
    }

    public function create()
    {
        return view('backend.blog_category.create');
    }

    public function GetTableDetails()
    {
        $category = BlogCategory::get();
        return Datatables::of($category)

            ->addColumn('status', function($data){
                if($data->status == '1'){
                    $status = '<span class="badge badge-success">Enabled</span>';
                }
                else{
                    $status = '<span class="badge badge-danger">Disabled</span>';
                }   
                return $status;
            })

            ->addColumn('action', function($row){                 
                $button = '<a href="'.route('admin.blog_category.show',$row->id).'" name="edit" id="'.$row->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                $button .= '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['action','status'])
            ->make();
    }

    public function store(Request $request)
    {
        // dd($request);

        $blogCategory = new BlogCategory;
        $blogCategory->name = $request->name;
        $blogCategory->description = $request->description;
        $blogCategory->order = $request->order;
        $blogCategory->status = $request->status;
        $blogCategory->save();

        return redirect()->route('admin.blog_category.index')->withFlashSuccess('Added Successfully');

    }

    

    public function show($id)
    {
        $blog_category = BlogCategory::where('id',$id)->first();
        return view('backend.blog_category.edit',[
            'blog_category'=> $blog_category
        ]);
    }


    public function update(Request $request)
    {
        $id=$request->id;
        $blogCategory = new BlogCategory;
        $blogCategory->name = $request->name;
        $blogCategory->description = $request->description;
        $blogCategory->order = $request->order;
        $blogCategory->status = $request->status;

        BlogCategory::whereId($id)->update($blogCategory->toArray());

        return redirect()->route('admin.blog_category.index')->withFlashSuccess('Updated Successfully');
    }

    public function destroy($id)
    {
        BlogCategory::where('id',$id)->delete();
        return back();
    }
}
