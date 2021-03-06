<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Properties;

/**
 * Class ContactController.
 */
class CommercialController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $promu = Properties::get();

        return view('frontend.commercial',[
            'promo' => $promu
        ]);
    }
}
