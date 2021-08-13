<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\FileManager;
use App\Models\Auth\User;
use App\Models\AgentRequest; 
use App\Models\SidebarAd; 
use App\Models\Favorite; 


/**
 * Class ContactController.
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

        $ad1 = SidebarAd::where('other', '=', 'ad1')->where('status', '=', '1')->first();
        $ad2 = SidebarAd::where('other', '=', 'ad2')->where('status', '=', '1')->first();

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
        
        $random = Properties::inRandomOrder()->limit(4)->get();
        // dd($random);


        if(auth()->user())
        {
            $favourite = Favorite::where('property_id',$id)
                ->where('user_id',auth()->user()->id)
                ->first();
        }else{
            $favourite = null;
        }


        // dd($favourite);

        return view('frontend.individual-property',[
            'property_details' => $property_details,
            'users' => $users,
            'feature_image' => $feature_image,
            'agent' => $agent,  
            'random' => $random,          
            'final_out' => $final_out,
            'ad1' => $ad1,
            'ad2' => $ad2,
            'favourite' => $favourite
        ]);
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


    
}
