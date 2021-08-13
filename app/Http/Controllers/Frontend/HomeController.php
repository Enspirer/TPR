<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\FileManager;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Session;

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



        return view('frontend.landing',[
            'countries_data' => $country
        ]);
    }



    public function map_index(Request $request)
    {
        if ($request->coordinate_data){
            $coordinate_data = json_decode($request->coordinate_data);


            $out = [];
            foreach ($coordinate_data as $coodinate)
            {
               if ($coodinate){
                   $cordinate = json_decode($coodinate);

                   $property = Properties::where('lat', 'like', '%' .  substr($cordinate->lat, 0, 7) . '%')
                       ->where('long', 'like', '%' .  substr($cordinate->long, 0, 7) . '%')
                       ->where('admin_approval','Approved')
                       ->first();
                   array_push($out,$property);
               }
            }
          return json_encode($out);
        }

        return json_encode($request->coordinate_data);
    }

    public function index($country_id,Request $request)
    {
        Cookie::queue("score_tag", json_encode(Session::get($country_id)));

        $promu = Properties::where('admin_approval','Approved')->get();

        $latest = Properties::latest()->take(3)->get();


        $self = self::setCookie($country_id);


        return view('frontend.home_page.index',[
            'country_id' => $country_id,
            'promo' => $promu,
            'latest' => $latest
        ]);
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


    public function get_search_result()
    {
        

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



        // dd($key_name,
        //     $max_price,
        //     $min_price,
        //     $category_type,
        //     $transaction_type,
        //     $property_type,
        //     $beds,
        //     $baths,
        //     $land_size,
        //     $listed_since,
        //     $building_type,
        //     $open_house,
        //     $zoning_type,
        //     $units,
        //     $building_size,
        //     $farm_type,
        //     $parking_type);


        return redirect()->route('frontend.search_function', [
            $key_name,
            $max_price,
            $min_price,
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
            $parking_type
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


    public function search_function($key_name,$max_price,$min_price,$category_type,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house,$zoning_type,$units,$building_size,$farm_type,$parking_type)
    {

        $property_types = PropertyType::where('status','=','1')->get();

        $properties = Properties::where('admin_approval', 'Approved');

       

        if($key_name != 'key_name'){
            $properties->where('name', 'like', '%' .  $key_name . '%');
        }

        if($max_price != 'max_price'){
            $properties->where('name', $max_price);
        }

        if($min_price != 'min_price'){
            $properties->where('name', $min_price);
        }

        if($category_type != 'category_type'){
            $properties->where('main_category', $category_type);
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
            $properties->where('created_at', $listed_since);
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

        // dd($key_name,
        //     $max_price,
        //     $min_price,
        //     $category_type,
        //     $transaction_type,
        //     $property_type,
        //     $beds,
        //     $baths,
        //     $land_size,
        //     $listed_since,
        //     $building_type,
        //     $open_house,
        //     $zoning_type,
        //     $units,
        //     $building_size,
        //     $farm_type,
        //     $parking_type);


        $filteredProperty = $properties->get();

        // dd($filteredProperty);

        return view('frontend.residential', ['filteredProperty' => $filteredProperty, 'property_types' => $property_types]);
    }
}
