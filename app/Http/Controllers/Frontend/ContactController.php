<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\SendContact;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use DB;
use App\Models\ContactUs;
use Mail;
use \App\Mail\ContactUsMail;
use App\Models\Auth\User;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {        
        // dd($request);     
   
        $contactus = new ContactUs;

        $contactus->name=$request->name;
        $contactus->phone=$request->phone;
        $contactus->email=$request->email;
        $contactus->message=$request->message;
        $contactus->status='Pending'; 

        $contactus->save();

        $details = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ];

        \Mail::to('nihsaan.enspirer@gmail.com')->send(new ContactUsMail($details));
       
        session()->flash('message','Thanks!');

        return back();    
    }


    public function landingContact()
    {
        return view('frontend.landing_contact');
    }


    public function manager_contact_store(Request $request)
    {        
        // dd($request);

        $country_manager_email = User::where('id',$request->country_manager)->first(); 

        $details = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ];

        \Mail::to([$country_manager_email->email,'nihsaan.enspirer@gmail.com'])->send(new ContactUsMail($details));
       
        session()->flash('message','Thanks!');

        return back();    
    }

}
