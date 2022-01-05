<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory; 
use App\Models\BlogPost; 

class BlogController extends Controller
{
     /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $all_posts = BlogPost::where('status','1')->orderBy('order','ASC')->get();
        $newest_posts = BlogPost::where('status','1')->latest()->take(4)->get();
        // dd($all_posts);

        return view('frontend.blog',[
            'all_posts' => $all_posts,
            'newest_posts' => $newest_posts
        ]);
    }
}
