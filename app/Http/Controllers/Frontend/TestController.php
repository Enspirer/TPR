<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Properties;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\FileManager;
use App\Models\GlobalAdvertisement;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Session;
use App\Models\Favorite; 
use App\Models\SidebarAd; 
use App\Models\AdCategory;
use App\Models\HomePageAdvertisement;
use App\Models\GlobalAdCategories;
use App\Models\PropertyTypeParameter;
use App\Models\UserSearch;
use GuzzleHttp;

class TestController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($country_id,Request $request)
    {

        $ad_category = AdCategory::where('admin_approval','=','Approved')->where('country_manager_approval','=','Approved')->get();

        $homepage_ad = HomePageAdvertisement::where('status','=','Enable')->where('category','!=',null)->where('admin_approval','=','Approved')->where('country_manager_approval','=','Approved')->orderBy('order','ASC')->get();
        // dd($homepage_ad);

        Cookie::queue("country_code", $country_id,1000);

        $property_types = PropertyType::where('status','=','1')->get();

        $country = Country::where('country_id', $country_id)->where('status',1)->first();

        $promu = Properties::where('admin_approval','Approved')->where('sold_request',null)->where('country', $country->country_name)->get();

        $sold_prop = Properties::where('admin_approval','Approved')->where('country', $country->country_name)->where('sold_request','Sold')->inRandomOrder()->limit(6)->get();

        $latest = Properties::where('country',$country->country_name)->where('sold_request',null)->where('admin_approval','Approved')->latest()->take(3)->get();

        $self = self::setCookie($country_id);

        $countries = Country::where('status',1)->get();

        return view('frontend.home_page.test',[
            'country_id' => $country_id,
            'promo' => $promu,
            'latest' => $latest,
            'ad_category' => $ad_category,
            'homepage_ad' => $homepage_ad,
            'country' => $country,
            'property_types' => $property_types,
            'countries' => $countries,
            'sold_prop' => $sold_prop
        ]);
    }

    public function countryChange(Request $request,$id) {

        Cookie::queue("country_code", $id ,1000);
        return back();
   
    }


    public static function setCookie($param)
    {
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('country', $param,60));
        return $response;
    }

}
