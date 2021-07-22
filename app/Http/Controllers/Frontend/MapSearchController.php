<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Properties;
use Illuminate\Http\Request;

/**
 * Class ContactController.
 */
class MapSearchController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     return view('frontend.map-search');
    // }


    public function index()
    {
        $promu = Properties::all();

        return view('frontend.map-search',[
            'promo' => $promu
        ]);
    }
    

}
