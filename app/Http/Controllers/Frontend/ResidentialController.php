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
        $user_id = auth()->user()->id;

        $promu = Properties::where('main_category', 'residential')->get();
        $favorite = Favorite::where('user_id', $user_id)->get();

        dd($favorite);

        return view('frontend.residential',[
            'promo' => $promu
        ]);
    }
}
