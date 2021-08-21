<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Settings;


class PagesController extends Controller
{
    public function about_us()
    {
        $about_us = Settings::where('name','=','about_us_content')->first();
        // dd($about_us);

        return view('backend.pages.about_us',[
            'about_us' => $about_us
        ]);
    }

    public function about_us_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->about_us;
        
        Settings::where('name','=','about_us_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function privacy_policy()
    {
        $privacy_policy = Settings::where('name','=','privacy_policy_content')->first();
        // dd($about_us);

        return view('backend.pages.privacy_policy',[
            'privacy_policy' => $privacy_policy
        ]);
    }

    public function privacy_policy_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->privacy_policy;
        
        Settings::where('name','=','privacy_policy_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function terms_of_use()
    {
        $terms_of_use = Settings::where('name','=','terms_of_use_content')->first();
        // dd($about_us);

        return view('backend.pages.terms_of_use',[
            'terms_of_use' => $terms_of_use
        ]);
    }

    public function terms_of_use_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->terms_of_use;
        
        Settings::where('name','=','terms_of_use_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }



}
