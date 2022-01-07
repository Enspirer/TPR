<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\FileManager;
use App\Models\Auth\User;
use App\Models\AgentRequest; 
use App\Models\SidebarAd; 
use App\Models\Favorite; 
use App\Models\ListingHistory; 
use App\Models\WatchListing; 


/**
 * Class IndividualPropertyController.
 */
class IndividualPropertyController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $property_details = Properties::where('id',$id)->first();
        // dd($property_details->image_ids);
        $users = User::where('id',$property_details->user_id)->get();
        // dd($users);
        
        $agent = AgentRequest::where('user_id',$property_details->user_id)->first();
        // dd($agent);

        $feature_image = FileManager::where('id',$property_details->feature_image_id)->get();
        // dd($feature_image);

        if(get_country_cookie(request())){
            $side_ads = SidebarAd::where('admin_approval', 'Approved')->where('country',get_country_cookie(request())->country_name)->where('status', 'Enable')->get();            
        }
        else{
            $side_ads = SidebarAd::where('admin_approval', 'Approved')->where('status', 'Enable')->latest()->take(2)->get();
        }

         $final_out = [];

        if(json_decode($property_details->image_ids) == null){
        }
        else{            
            foreach(json_decode($property_details->image_ids) as $key => $image){
                
                $image_ids = FileManager::where('id',$image)->first();

                $file_details = [
                    $image_ids->file_name
                ];
                array_push($final_out,$file_details);
            }
            // dd($final_out);
        }

        $interior_image = json_decode($property_details->interior_image);

        
        $random = Properties::where('admin_approval', 'Approved')->where('sold_request',null)->inRandomOrder()->limit(4)->get();
        // dd($random);


        if(auth()->user())
        {
            $favourite = Favorite::where('property_id',$id)
                ->where('user_id',auth()->user()->id)
                ->first();
        }else{
            $favourite = null;
        }

        if(auth()->user())
        {
            $watch_list = WatchListing::where('property_id',$id)
                ->where('user_id',auth()->user()->id)
                ->first();
        }else{
            $watch_list = null;
        }



        if(json_decode($property_details->external_parameter) == null){
            $external_parameter = null;
        }else{
            $external_parameter = json_decode($property_details->external_parameter);
        }
        // dd($external_parameter);


        $listing_history = ListingHistory::where('property_id',$id)->get();
        // dd($listing_history);

        return view('frontend.individual-property',[
            'property_details' => $property_details,
            'users' => $users,
            'feature_image' => $feature_image,
            'agent' => $agent,  
            'random' => $random,          
            'final_out' => $final_out,
            'side_ads' => $side_ads,
            'favourite' => $favourite,
            'external_parameter' => $external_parameter,
            'listing_history' => $listing_history,
            'watch_list' => $watch_list,
            'interior_image' => $interior_image
        ]);
    }

    public function watch_listing(Request $request)
    { 
        // dd($request);

        $user_id = auth()->user()->id;

        $add = new WatchListing;

        if($request->new_list != null){
            $add->new_list=$request->new_list; 
        }

        if($request->sold_list != null){
            $add->sold_list=$request->sold_list; 
        }

        if($request->de_list != null){
            $add->de_list=$request->de_list; 
        }

        if($request->watch_listing != null){
            $add->watch_list=$request->watch_listing; 
        }

        $add->property_id=$request->pro_hidden_id; 
        $add->user_id=$user_id;

        $add->save();

        return back();

    }

    public function change_watch_listing(Request $request)
    {        
        // dd($request);
        $user_id = auth()->user()->id;

        $update = new WatchListing;

        if($request->new_list != null){
            $update->new_list=$request->new_list; 
        }
        else{
            $update->new_list=null; 
        }

        if($request->sold_list != null){
            $update->sold_list=$request->sold_list; 
        }
        else{
            $update->sold_list=null; 
        }

        if($request->de_list != null){
            $update->de_list=$request->de_list; 
        }
        else{
            $update->de_list=null; 
        }

        if($request->watch_listing != null){
            $update->watch_list=$request->watch_listing; 
        }
        else{
            $update->watch_list=null; 
        }

        $update->property_id=$request->pro_hidden_id; 
        $update->user_id=$user_id;
        
        WatchListing::whereId($request->watch_list)->update($update->toArray());
        
        return back();
    }

    public function propertyFavourite(Request $request)
    { 
        // dd($request);
        $addfav = new Favorite;

        $user_id = auth()->user()->id;

        $addfav->property_id=$request->prop_hidden_id; 
        $addfav->user_id=$user_id;

        $addfav->save();

        return back();

    }

    public function propertyFavouriteDelete($id)
    {        
        $data = Favorite::findOrFail($id);
        $data->delete();   

        return back();
    }


    public function contact_agent(Request $request)
    {
        $booking = new Booking;
        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->method_of_contact = $request->contact_method;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->message = $request->message;
        $booking->im_resident = $request->im_resident;
        $booking->tpr_respond_check = 'Pending';
        $booking->user_id = auth()->user()->id;
        $booking->property_id = $request->property_id;
        $booking->agent_id = $request->agent_id;
        $booking->booking_time = $request->time;
        $booking->book_a_viewing = $request->book_a_viewing;
        $booking->status = 'Pending';
        $booking->save();

        session()->flash('message','Thanks!');
        
        return back();

    }


    public function calculator($id)
    {
        $property_details = Properties::where('id',$id)->first();
        
        return view('frontend.includes.calculator');
    }


    
}
