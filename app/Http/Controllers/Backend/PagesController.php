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

    public function tips_for_buyers()
    {
        $tips_for_buyers = Settings::where('name','=','tips_for_buyers_content')->first();

        return view('backend.pages.tips_for_buyers',[
            'tips_for_buyers' => $tips_for_buyers
        ]);
    }

    public function tips_for_buyers_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->tips_for_buyers;
        
        Settings::where('name','=','tips_for_buyers_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function tips_for_sellers()
    {
        $tips_for_sellers = Settings::where('name','=','tips_for_sellers_content')->first();

        return view('backend.pages.tips_for_sellers',[
            'tips_for_sellers' => $tips_for_sellers
        ]);
    }

    public function tips_for_sellers_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->tips_for_sellers;
        
        Settings::where('name','=','tips_for_sellers_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function commercial_resources()
    {
        $commercial_resources = Settings::where('name','=','commercial_resources_content')->first();

        return view('backend.pages.commercial_resources',[
            'commercial_resources' => $commercial_resources
        ]);
    }

    public function commercial_resources_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->commercial_resources;
        
        Settings::where('name','=','commercial_resources_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    public function cookie_policy()
    {
        $cookie_policy = Settings::where('name','=','cookie_policy_content')->first();

        return view('backend.pages.cookie_policy',[
            'cookie_policy' => $cookie_policy
        ]);
    }

    public function cookie_policy_update(Request $request)
    {            
        $update = new Settings;

        $update->key=$request->cookie_policy;
        
        Settings::where('name','=','cookie_policy_content')->update($update->toArray());
        return back()->withFlashSuccess('Updated Successfully');                

    }

    

}
