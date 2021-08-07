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
        $promu = Properties::all();

        return view('frontend.residential',[
            'promo' => $promu
        ]);
    }
}
