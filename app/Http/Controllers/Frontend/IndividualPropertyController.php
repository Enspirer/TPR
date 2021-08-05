<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\FileManager;
use App\Models\Auth\User;

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
        // dd($property_details);
        $users = User::where('id',$property_details->user_id)->get();
        // dd($users);
        $feature_image = FileManager::where('id',$property_details->feature_image_id)->get();
        // dd($feature_image);

        $final_out = [];
        foreach(json_decode($property_details->image_ids) as $key => $image){
            
            $image_ids = FileManager::where('id',$image)->first();

            $file_details = [
                $image_ids->file_name
            ];

            array_push($final_out,$file_details);
        }
        // dd($final_out);

        return view('frontend.individual-property',[
            'property_details' => $property_details,
            'users' => $users,
            'feature_image' => $feature_image,
            'final_out' => $final_out
        ]);
    }

    // image_ids

    // public function property_details($id)
    // {
    //     $property_details = Properties::where('id',$id)->first();
    //     $user_id = $property_details->user_id;

    //     $users = User::where('id',$user_id)->get();

    //     return view('frontend.individual-property');
      
    // }


}
