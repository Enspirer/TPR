<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Properties;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\FileManager;

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

    public function index($country_id)
    {
        $promu = Properties::all();

        return view('frontend.home_page.index',[
            'country_id' => $country_id,
            'promo' => $promu
        ]);
    }

    public function property_type($id)
    {
        $property_type = PropertyType::where('status','=','1')->where('id',$id)->get();
        // dd($property_type);

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


    public function get_search_result(Request $request)
    {
        dd($request);
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






}
