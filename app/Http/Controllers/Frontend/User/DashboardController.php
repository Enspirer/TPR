<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use DB;
use App\Models\AgentRequest;
use App\Models\Auth\User;
use App\Models\Properties;
use App\Models\FileManager;
use App\Models\Favorite; 
use App\Models\Country;
use App\Models\Feedback;
use App\Models\UserSearch;
use App\Models\WatchListing;
use DataTables;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $agent_edit = AgentRequest::where('user_id',$user_id)->first();
        $user_edit = User::where('id',$user_id)->first();
        $countries = Country::where('status',1)->get();

        // agent edit function in agentController
        
        return view('frontend.user.dashboard',[
            'agent_edit' => $agent_edit,
            'user_edit' => $user_edit,
            'countries' => $countries
        ]);
    }    

    public function communications() {
        return view('frontend.user.communications');
    }

    public function accountDashboard(Request $request)
    {
        $user_id = auth()->user()->id;
        $all_favourite = Favorite::where('user_id', $user_id)->get()->count();        
        $supports = Feedback::where('user_id', $user_id)->get()->where('status','=','Pending')->count();
        $bookings = Booking::where('user_id', $user_id)->get()->count();
        $user = User::where('id', $user_id)->first();

        return view('frontend.user.account-dashboard',[
            'all_favourite' => $all_favourite,
            'bookings' => $bookings,
            'supports' => $supports,
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        // dd($request);

        // $user = new User;

        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->email = $request->email;
        // $user->display_name = $request->display_name;

        // User::whereId($request->hid_id)->update($user->toArray());

        // return back();

        // if (!isset($res)) 
        //     $res = new stdClass();

        //     $res->success = false;

        // $user_id = auth()->user()->id;

        $first_name = request('first_name');
        $last_name = request('last_name');
        $email = request('email');
        $display_name = request('display_name');
        $user_type = request('user_type');
        $dob = request('dob');
        $gender = request('gender');
        $marital = request('marital');
        $city = request('city');
        $province = request('province');
        $country = request('country');
        $postal_code = request('postal_code');
        $home_phone = request('home_phone');
        $mobile_phone = request('mobile_phone');

        $users = DB::table('users') ->where('id', '=', request('hid_id'))->update(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'display_name' => $display_name,
                'user_type' => $user_type,
                'dob' => $dob,
                'gender' => $gender,
                'marital_status' => $marital,
                'city' => $city,
                'province' => $province,
                'country' => $country,
                'postal_code' => $postal_code,
                'home_phone' => $home_phone,
                'mobile_phone' => $mobile_phone,
                

            ]
        );

        return redirect('/dashboard');


    }

    public function favourites()
    {
        $favourite = Favorite::where('user_id',auth()->user()->id)->get();
        // dd($favourite);

        // $final_out = [];
        // foreach($favourite as $fav){
        //     array_push($final_out,$fav->property_id);
        // }
        // dd($final_out);

        $property = Properties::get();
        // dd($property);

        // $final_out2 = [];
        // foreach($property as $prop){
        //     array_push($final_out2,$prop->feature_image_id);
        // }
        // dd($final_out2);

        // $feature_image = FileManager::whereIn('id',$final_out2)->get();

        // dd($feature_image);

        return view('frontend.user.favourites',[
            'favourite' => $favourite,
            'property' => $property
        ]);
    }


    public function favouritesDelete($id) {

        $favourite = Favorite::where('property_id', $id)->delete();

        return back();
    }


    public function myBookings()
    {
        $bookings = Booking::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();

        return view('frontend.user.my-bookings',[
            'bookings' => $bookings
        ]);
    }

    public function feedback()
    {
        $countries = Country::where('status',1)->get();

        $user_id = auth()->user()->id;
        $user_details = User::where('id',$user_id)->first();

        return view('frontend.user.feedback',[
            'countries' => $countries,
            'user_details' => $user_details
        ]);
    }

    public function feedbackStore(request $request)
    {
        // dd($request);

        $addfeedback = new Feedback;

        $addfeedback->name = $request->name;
        $addfeedback->country = $request->country;
        $addfeedback->title = $request->title;
        $addfeedback->message = $request->message;
        $addfeedback->status = 'Pending';
        $addfeedback->user_id = auth()->user()->id;

        $addfeedback->save();

        session()->flash('message','Thanks!');

        return back(); 
        
    }

    public function search_history()
    {
        return view('frontend.user.search_history');
    }


    public function search_history_get_details(Request $request)
    {
        $user_search = UserSearch::where('user_id',auth()->user()->id)->get();

        if($request->ajax())
        {
            return DataTables::of($user_search)
                    ->addColumn('action', function($data){
                                              
                        $button = '<form target="_blank"><button formaction="'.url($data->url).'" class="btn text-light table-btn me-4" style="background-color: #4195E1"> Click Here to Visit the Saved Page </button></form>';
                        $button .= '<input type="hidden" name="hid_id" value="'.$data->id.'">';
                        // $button .= '<button name="delete" id="'.$data->id.'" class="btn text-light table-btn disapprove" style="background-color: #FF2C4B;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Disapprove</button>';

                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }   

 
    public function watch_listing()
    {
        $watch_listing = WatchListing::where('user_id',auth()->user()->id)->get();
        // dd($watch_listing);

        $property = Properties::get();

        return view('frontend.user.watch_listing',[
            'watch_listing' => $watch_listing,
            'property' => $property
        ]);
    }


    public function watch_listingDelete($id) {

        $favourite = WatchListing::where('property_id', $id)->delete();

        return back();
    }

    


}
