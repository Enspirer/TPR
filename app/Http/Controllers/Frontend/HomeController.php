<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;

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

    public function index($slug,$currency)
    {
        return view('frontend.home_page.index');
    }
}
