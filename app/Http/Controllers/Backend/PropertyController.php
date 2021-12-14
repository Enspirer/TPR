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

class PropertyController extends Controller
{
    
    public function index()
    {
        return view('backend.property.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Properties::where('country_manager_approval','=','Approved')->get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Approval </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('admin_approval', function($data){
                        if($data->admin_approval == 'Approved'){
                            $status = '<span class="badge badge-success">Approved</span>';
                        }elseif($data->admin_approval == 'Disapproved'){
                            $status = '<span class="badge badge-danger">Disapproved</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','admin_approval'])
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

        return view('backend.property.edit', [
            'property' => $property,
            'images' => $images ,
            'property_type' => $property_type,
            'agent_details' => $agent_details,
            'external_parameter' => $external_parameter,
            'listing_history' => $listing_history
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);

       
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
            

        
        $updatproperty = new Properties;        
        $updatproperty->admin_approval=$request->admin_approval;
   
        Properties::whereId($request->hidden_id)->update($updatproperty->toArray());



        return redirect()->route('admin.property.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = Properties::findOrFail($id);
        $data->delete();   
    }


}
