<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


/**
 * Class FooterController.
 */
class FooterController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function mobileApps()
    {
        return view('frontend.mobile-apps');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function cookiePolicy()
    {
        return view('frontend.cookie-policy');
    }

    public function termsOfUse()
    {
        return view('frontend.terms-of-use');
    }

    public function TipsforBuyers()
    {
        return view('frontend.tips_for_buyers');
    }

    public function TipsforSellers()
    {
        return view('frontend.tips_for_sellers');
    }

    public function CommercialResources()
    {
        return view('frontend.commercial_resources');
    }


}
