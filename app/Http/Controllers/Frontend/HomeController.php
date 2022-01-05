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

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function landing()
    {
        $country = Country::where('status',1)->get();

        // dd($country);

        $global_categories = GlobalAdCategories::where('status', 1)->orderBy('order', 'asc')->get();


        $global_advertisement = GlobalAdvertisement::where('status','=','1')->orderBy('order', 'ASC')->get();
        // dd($global_advaertisement);


        $lps1 = get_settings('landing_page_psection_1');
        $lps2 = get_settings('landing_page_psection_2');
        // dd($lps2);

        $country_list1 = Country::where('features_manager','!=', null)->where('id',$lps1)->where('status',1)->first();
        $country_list2 = Country::where('features_manager','!=', null)->where('id',$lps2)->where('status',1)->first();
        
        return view('frontend.landing',[
            'countries_data' => $country,
            'global_advertisement' => $global_advertisement,
            'country_list1' => $country_list1,
            'country_list2' => $country_list2,
            'global_categories' => $global_categories
        ]);
    }



    public function map_index(Request $request)
    {
        if ($request->coordinate_data){
            $coordinate_data = json_decode($request->coordinate_data);
            $country_id = $request->country_id;
            $out = [];
            foreach ($coordinate_data as $coodinate)
            {
               if ($coodinate){
                   $cordinate = json_decode($coodinate);

                   $property = Properties::where('lat', 'like', '%' .  substr($cordinate->lat, 0, 7) . '%')
                       ->where('long', 'like', '%' .  substr($cordinate->long, 0, 7) . '%')
                       ->where('admin_approval','Approved')
                       ->where('sold_request',null)
                       ->first();

                   $property->price_currency = current_price($country_id,$property->price);

                   $property->price_current =
                   array_push($out,$property);
               }
            }
          return json_encode($out);


        }

        return json_encode($request->coordinate_data);
    }

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

        return view('frontend.home_page.index',[
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


    public function property_type($id)
    {
        $property_type = PropertyType::where('status','=','1')->where('id',$id)->get();

        $final_out = [];

        foreach($property_type as $key => $pro_type){

            $array = [
                'id' => $pro_type->id,
                'property_type_name' => $pro_type->property_type_name,
                'property_description' => $pro_type->property_description,
                'activated_fields' => json_decode($pro_type->activated_fields)
                
            ];

            array_push($final_out,$array);

        }

        // dd($final_out);

        return json_encode($final_out);
    }

    public function parameter($country,$id)
    {
        $property_type_para = PropertyTypeParameter::where('status','=','Approved')
            ->where('country',$country)
            ->where('property_type_id',$id)
            ->first();


        $output = json_decode($property_type_para->form_json);

        // dd($property_type_para);

        return json_encode($output);
    }


    public static function keyword_to_geo($keyword) {

    }


    public function get_search_result(Request $request)
    {
        $client = new GuzzleHttp\Client();

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->search_keyword).'&key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac';


        $res = $client->request('GET', $url);

        $refidymeter = json_decode($res->getBody()->getContents());


        if($refidymeter->status == 'ZERO_RESULTS'){
            $lat = null;
            $lng = null;
            $boundtry = 'area_coordinator';
            $areacod = null;

        }else{
            $lat = $refidymeter->results[0]->geometry->location->lat;
            $lng = $refidymeter->results[0]->geometry->location->lng;
            $boundtry = $refidymeter->results[0]->geometry->bounds;

            $north_string1 =  $boundtry->northeast->lat.'_'.$boundtry->northeast->lng;
            $south_string2 =  $boundtry->southwest->lat.'_'.$boundtry->southwest->lng;
            $areacod = $north_string1.'_'.$south_string2;

        }


        if(request('search_keyword') != null) {
            $key_name = request('search_keyword');
        }
        else {
            $key_name = 'key_name';
        }


        if(request('category_type') != null) {
            $category_type = request('category_type');
        }
        else {
            $category_type = 'category_type';
        }


        if(request('max_price') != 0) {
            $max_price = request('max_price');
        }
        else {
            $max_price = 'max_price';
        }

        if(request('city') != null) {
            $city = request('city');
        }
        else {
            $city = 'city';
        }


        if(request('min_price') != 0) {
            $min_price = request('min_price');
        }
        else {
            $min_price = 'min_price';
        }


        if(request('transaction_type') != null) {
            $transaction_type = request('transaction_type');
        }
        else {
            $transaction_type = 'transaction_type';
        }


        if(request('propertyType') != null) {
            $property_type = request('propertyType');
        }
        else {
            $property_type = 'property_type';
        }


        if(request('beds') != null) {
            $beds = request('beds');
        }
        else {
            $beds = 'beds';
        }


        if(request('baths') != null) {
            $baths = request('baths');
        }
        else {
            $baths = 'baths';
        }

        if(request('land_size') != null) {
            $land_size = request('land_size');
        }
        else {
            $land_size = 'land_size';
        }

        if(request('listed_since') != null) {
            $listed_since = request('listed_since');
        }
        else {
            $listed_since = 'listed_since';
        }

        if(request('building_type') != null) {
            $building_type = request('building_type');
        }
        else {
            $building_type = 'building_type';
        }

        if(request('open_house') != null) {
            $open_house = request('open_house');
        }
        else {
            $open_house = 'open_house';
        }

        if(request('zoning_type') != null) {
            $zoning_type = request('zoning_type');
        }
        else {
            $zoning_type = 'zoning_type';
        }

        if(request('number_of_units') != null) {
            $units = request('number_of_units');
        }
        else {
            $units = 'units';
        }


        if(request('building_size') != null) {
            $building_size = request('building_size');
        }
        else {
            $building_size = 'building_size';
        }


        if(request('farm_type') != null) {
            $farm_type = request('farm_type');
        }
        else {
            $farm_type = 'farm_type';
        }


        if(request('parking_type') != null) {
            $parking_type = request('parking_type');
        }
        else {
            $parking_type = 'parking_type';
        }

        if($lng == null) {
            $lng = 'long';
        }

        if($lat == null) {
            $lat = 'long';
        }



     
        return redirect()->route('frontend.search_function', [
            'key_name',
            $min_price,
            $max_price,
            $category_type,
            $transaction_type,
            $property_type,
            $beds,
            $baths,
            $land_size,
            $listed_since,
            $building_type,
            $open_house,
            $zoning_type,
            $units,
            $building_size,
            $farm_type,
            $parking_type,
            $city,
            $lng,
            $lat,
            $areacod
        ]);
    }


    public function image_assets($id)
    {
        $fileDetails = FileManager::where('id',$id)->first();

        if ($fileDetails){
            return response( file_get_contents('./images/'.$fileDetails->file_name) )
                ->header('Content-Type','image/png');
        }else{
            return response( file_get_contents('./img/'.'blank.png') )
                ->header('Content-Type','image/png');
        }

    }


    public function search_function($key_name,$min_price,$max_price,$category_type,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house,$zoning_type,$units,$building_size,$farm_type,$parking_type,$city,$long,$lat,$area_coordinator)
    {

        $property_types = PropertyType::where('status','=','1')->get();

        $properties = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->where('country',get_country_cookie(request())->country_name);

        // $side_ads = SidebarAd::where('country_management_approval', 'Approved')->get();
        if(get_country_cookie(request())){
            $side_ads = SidebarAd::where('admin_approval', 'Approved')->where('country',get_country_cookie(request())->country_name)->where('status', 'Enable')->get();            
        }
        else{
            $side_ads = SidebarAd::where('admin_approval', 'Approved')->where('status', 'Enable')->latest()->take(2)->get();
        }
        // dd($side_ads);

        $countries = Country::where('status',1)->get();


        if($max_price != 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '<=', $max_price)->where('price', '>=', $min_price);
        }
        elseif($max_price != 'max_price' && $min_price == 'min_price'){
            $properties->where('price', '<=', $max_price);
        }
        elseif($max_price == 'max_price' && $min_price != 'min_price'){
            $properties->where('price', '>=', $min_price);
        }


        if($category_type != 'category_type'){
            if($category_type == 'all') {
                $properties->get();
            }
            else {
                $properties->where('main_category', $category_type);
            }
            
        }

        if($transaction_type != 'transaction_type'){
            $properties->where('transaction_type', $transaction_type);
        }

        if($property_type != 'property_type'){
            $properties->where('property_type', $property_type);
        }

        if($beds != 'beds'){
            if($beds == 'greater-than-5') {
                $properties->where('beds', '>', 5);
            }
            else {
                $properties->where('beds', $beds);
            }
        }

        if($baths != 'baths'){
            if($baths == 'greater-than-5') {
                $properties->where('baths', '>', 5);
            }
            else {
                $properties->where('baths', $baths);
            }
        }

        if($land_size != 'land_size'){
            $properties->where('land_size', $land_size);
        }

        if($listed_since != 'listed_since'){
            $properties->where('created_at', '>', $listed_since);
        }

        if($building_type != 'building_type'){
            $properties->where('building_type', $building_type);
        }

        if($open_house != 'open_house'){
            $properties->where('open_hours', $open_house);
        }

        if($zoning_type != 'zoning_type'){
            $properties->where('zoning_type', $zoning_type);
        }

        if($units != 'units'){
            $properties->where('number_of_units', $units);
        }

        if($building_size != 'building_size'){
            $properties->where('building_size', $building_size);
        }

        if($farm_type != 'farm_type'){
            $properties->where('farm_type', $farm_type);
        }

        if($parking_type != 'parking_type'){
            $properties->where('parking_type', $parking_type);
        }

        if($city != 'city'){
            $properties->where('city', $city);
        }


        $longertutr = self::areacordina_function($area_coordinator);





        // dd($properties->get());

        $filteredProperty = $properties->get();


        return view('frontend.residential', ['filteredProperty' => $filteredProperty, 'property_types' => $property_types, 'side_ads' => $side_ads, 'category_type' => $category_type, 'countries' => $countries,'search_long' => $long,'search_lat' => $lat,'area_coords'=>$longertutr]);
    }

    public static function areacordina_function($area_coordinator)
    {
        $str_arr = preg_split ("/\_/", $area_coordinator);
        $outarray = [
           'northeast_lat' => $str_arr[0],
           'northeast_lng' => $str_arr[1],
           'southwest_lat' => $str_arr[2],
           'southwest_lng' => $str_arr[3],
        ];
        return $outarray;
    }


    public function favouriteHeart(Request $request) {


        $property_id = $request->hid_id;
        $status = $request->favourite;
        $user_id = auth()->user()->id;


        if($status == 'favourite') {

            $property = Properties::where('id', $property_id)->first();

            $favourite = new Favorite;

            $favourite->property_id=$property_id; 

            $favourite->user_id=$user_id;

            $favourite->save();

            return back();
        }

        if($status == 'non-favourite') {
            $favorite = Favorite::where('user_id', $user_id)
            ->where('property_id', $property_id)
            ->delete();

            return back();
        }

    }

    public function save_search(Request $request)
    { 
        // dd($request);
        $add = new UserSearch;

        $user_id = auth()->user()->id;

        $add->url=$request->save_url; 
        $add->user_id=$user_id;

        $add->save();

        return back();

    }

    public function save_search_Delete($id)
    {        
        $data = UserSearch::findOrFail($id);
        $data->delete();   

        return back();
    }

    public function calc_tpr($price)
    {
        return view('frontend.caculator.iframe_panel',[
            'price' => $price
        ]);
    }

    public function currency_update_api()
    {
        $curl_handle = curl_init();
        $url = "http://api.exchangeratesapi.io/v1/latest?access_key=0cdc7c4987c8b16604c7367284c6b736&format=1";
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);

        if(isset($response_data->error->code)){
            return 'something wrong';
        }else{

            foreach ($response_data->rates as $key => $entrypan)
            {
                Country::where('currency',$key)->update(
                    [
                        'currency_rate' => $entrypan
                    ]
                );

            }
            return 'updated';
        }

    }
}
