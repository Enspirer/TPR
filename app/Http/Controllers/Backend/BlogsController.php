<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use DataTables;
use Auth;

class BlogsController extends Controller
{
    public function index()
    {
        return view('backend.blog_post.index');
    }

    public function create()
    {
        $BlogCategory = BlogCategory::get();
        return view('backend.blog_post.create',[
            'BlogCategory'=>$BlogCategory
        ]);
    }

    public function GetTableDetails()
    {
        $category = BlogPost::get();
        return Datatables::of($category)

            ->addColumn('action', function($row){
                $button = '<a href="'.route('admin.blog_post.show',$row->id).'" name="edit" id="'.$row->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                $button .= '<button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $button;
            })

            ->editColumn('category', function($data){
                $cat = BlogCategory::where('id', $data->category_id)->first();

                if($cat) {
                    return $cat->name;
                }
                else {
                    return '<span class="badge badge-danger">Category Not Defined</span>';
                }           
            })

            ->addColumn('status', function($data){
                if($data->status == '1'){
                    $status = '<span class="badge badge-success">Enabled</span>';
                }
                else{
                    $status = '<span class="badge badge-danger">Disabled</span>';
                }   
                return $status;
            })

            ->rawColumns(['action','category','status'])
            ->make();
    }
    
 
    public function store(Request $request)
    {
        if($request->body == null){
            return back()->withErrors('Please Add Article Section');
        }

        if($request->feature_image == null){
            return back()->withErrors('Please Add Feature Image');
        }
        
        $BlogPost = new BlogPost();
        $BlogPost->title = $request->title;
        $BlogPost->feature_image = $request->feature_image;
        $BlogPost->category_id = $request->category;
        $BlogPost->user_id = auth()->user()->id;
        $BlogPost->body = $request->body;
        $BlogPost->order = $request->order;
        $BlogPost->status = $request->status;
        
        $BlogPost->save();
        return redirect()->route('admin.blog_post.index')->withFlashSuccess('Added Successfully');
    }

 
    public function show($id)
    {
        $BlogCategory = BlogCategory::get();

        $blog_post = BlogPost::where('id',$id)->first();

        $blogPorstes = BlogPost::all();

        $getPostDetails =  json_decode($blog_post->reference_post_ids);
        // dd($getPostDetails);
        
        if($getPostDetails == null){
            $gerReferenceData = null;
        }else{
            $gerReferenceData = BlogPost::whereIn('id',$getPostDetails)->get();
        }

        // dd($gerReferenceData);


        return view('backend.blog_post.edit',[
            'blog_post'=> $blog_post,
            'BlogCategory'=>$BlogCategory,
            'blog_posts' => $blogPorstes,
            'get_references' => $gerReferenceData,
        ]);
    }



    public function update(Request $request)
    {
        // dd($request);

        if($request->body == null){
            return back()->withErrors('Please Add Article Section');
        }

        if($request->feature_image == null){
            return back()->withErrors('Please Add Feature Image');
        }
        
        $BlogPost = new BlogPost();
        $BlogPost->title = $request->title;
        $BlogPost->feature_image = $request->feature_image;
        $BlogPost->category_id = $request->category;
        $BlogPost->user_id = auth()->user()->id;
        $BlogPost->body = $request->body;
        $BlogPost->order = $request->order;
        $BlogPost->status = $request->status;

        BlogPost::whereId($request->id)->update($BlogPost->toArray());

        // dd($BlogPost);

        return redirect()->route('admin.blog_post.index')->withFlashSuccess('Post Is Update Successfully');

    }

   
    public function destroy($id)
    {
        BlogPost::where('id',$id)->delete();
        return back();
    }
}
