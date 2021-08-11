<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\FileManager;
use Illuminate\Http\Response;

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
        $promu = Properties::all();

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
        
        $key_name = request('search_keyword');
        $category_type = request('category');
        $max_price = 'max_price';
        $min_price = 'min_price';
        $transaction_type = 'transaction_type';
        $property_type = 'property_type';
        $beds = 'beds';
        $baths = 'baths';
        $land_size = 'land_size';
        $listed_since = 'listed_since';
        $building_type = 'building_type';
        $open_house = 'open_house';


        return redirect()->route('frontend.search_function', [
            request('search_keyword'),
            $max_price,
            $min_price,
            request('category'),
            $transaction_type,
            $property_type,
            $beds,
            $baths,
            $land_size,
            $listed_since,
            $building_type,
            $open_house
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


    public function search_function($key_name,$max_price,$min_price,$category_type,$transaction_type,$property_type,$beds,$baths,$land_size,$listed_since,$building_type,$open_house)
    {

        $property_types = PropertyType::where('status','=','1')->get();

        $properties = Properties::query();

        // $search = request('name');
        // $category_type = request('category');
        // $max_price = request('max_price');
        // $min_price = request('min_price');
        // $transaction_type = request('transaction_type)';
        // $property_type = request('property_type');
        // $beds = request('beds');
        // $baths = request('baths');
        // $land_size = request('land_size');
        // $listed_since = request('listed_since');
        // $building_type = request('building_type');
        // $open_house = request('open_house');

        // dd($category_type);

        

        if($key_name != 'key_name'){
            $properties->where('name', $key_name);
        }

        // if($search != null){
        //     $properties->where('name', $search);
        // }

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
            $properties->where('beds', $beds);
        }

        if($baths != 'baths'){
            $properties->where('baths', $baths);
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

        // dd($category_type, $key_name, $max_price,
        // $min_price,
        // $transaction_type,
        // $property_type,
        // $beds,
        // $baths,
        // $land_size,
        // $listed_since,
        // $building_type,
        // $open_house);



        $filteredProperty = $properties->get();

        return view('frontend.residential', ['filteredProperty' => $filteredProperty, 'property_types' => $property_types]);
    }
}
