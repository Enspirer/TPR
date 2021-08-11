<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Properties;

/**
 * Class ContactController.
 */
class ResidentialController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $promu = Properties::where('main_category', 'residential')->get();

        return view('frontend.residential',[
            'promo' => $promu
        ]);
    }
}
