<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Help;

class HelpController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $helps = Help::where('status',1)->orderBy('order','ASC')->get();
        // dd($helps);

        return view('frontend.help',[
            'helps' => $helps
        ]);
    }
}
