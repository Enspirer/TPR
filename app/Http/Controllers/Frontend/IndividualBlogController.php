<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory; 
use App\Models\BlogPost; 

class IndividualBlogController extends Controller
{
      /**
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $post_details = BlogPost::where('id',$id)->first();
        $newest_posts = BlogPost::where('status','1')->where('id','!=',$id)->latest()->take(4)->get();

        return view('frontend.individual-blog',[
            'post_details' => $post_details,
            'newest_posts' => $newest_posts
        ]);
    }
}
