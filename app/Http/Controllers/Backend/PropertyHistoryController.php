<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\AgentRequest;
use App\Models\ListingHistory;
use App\Models\WatchListing;


class PropertyHistoryController extends Controller
{
    public function index()
    {
        return view('backend.sold_properties.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::where('country_manager_approval','=','Approved')->where('admin_approval','=','Approved')->where('sold_request','!=',null)->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.sold_properties.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Approval </a>';
                        // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('sold_request', function($data){
                        if($data->sold_request == 'Sold'){
                            $status = '<span class="badge badge-success">Sold</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','sold_request'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $property = Properties::where('id',$id)->first();

        $property_type = PropertyType::where('id', $property->property_type)->first();

        $agent_details = AgentRequest::where('user_id', $property->user_id)->first(); 

        if($property->image_ids == NULL){
            $images = null;
        } else {
            $images = json_decode($property->image_ids);
        }

        if($property->interior_image == NULL){
            $interior_image = null;
        } else {
            $interior_image = json_decode($property->interior_image);
        }

        // $images = json_decode($property->image_ids);
        
        // dd($property);    
        
        if(json_decode($property->external_parameter) == null){
            $external_parameter = null;
        }else{
            $external_parameter = json_decode($property->external_parameter);
        }
        // dd($external_parameter);

        $listing_history = ListingHistory::where('property_id',$property->id)->get();
        // dd($listing_history);

        return view('backend.sold_properties.edit', [
            'property' => $property,
            'images' => $images ,
            'property_type' => $property_type,
            'agent_details' => $agent_details,
            'external_parameter' => $external_parameter,
            'listing_history' => $listing_history,
            'interior_image' => $interior_image
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);


        if($request->sold_request == 'Sold'){
            $watch_listings = WatchListing::where('property_id',$request->hidden_id)->get();

            foreach($watch_listings as $watch_listing){

                if($watch_listing->watch_list != null){
                    push_notification('Property Sold', 'You have received this notification because you have chosen to receive Watched Community updates. If you do not wish to receive this update you may change your preferences.', $request->hidden_id, $watch_listing->user_id);
                }
                                
            }  
            

        }

       
        
        $updatproperty = new Properties;
        
        $updatproperty->sold_request=$request->sold_request;
   
        Properties::whereId($request->hidden_id)->update($updatproperty->toArray());



        if($request->start_date != null){
           
            $listing_history = [
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'price' => $request->price,
                'event' => $request->event,
                'listing_id' => $request->listing_id
            ];
    
            // dd($listing_history['listing_id']);

            ListingHistory::where('property_id',$request->hidden_id)->delete();
                        
            foreach($listing_history['start_date'] as $key => $listing){
                // dd($listing_history['start_date'][0]);
    
                DB::table('listing_histories')->insert([
                    'date_start' => $listing_history['start_date'][$key],
                    'date_end' => $listing_history['end_date'][$key],
                    'price' => $listing_history['price'][$key],
                    'event' => $listing_history['event'][$key],
                    'listing_id' => $listing_history['listing_id'][$key],
                    'property_id' => $request->hidden_id,
                    'user_id' => auth()->user()->id
                ]);
    
            }  

        }   



        return redirect()->route('admin.sold_properties.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = Properties::findOrFail($id);
        $data->delete();   
    }
}
