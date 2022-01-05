<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\UserFeedback;

class UsersFeedbackController extends Controller
{
    public function index()
    {
        return view('backend.feedback.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = UserFeedback::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.feedbacks.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->editColumn('stars', function($data){
                        if($data->stars == '1 Star'){
                            $stars = '<span class="badge badge-danger">1 Star</span>';
                        }
                        elseif($data->stars == '2 Stars'){
                            $stars = '<span class="badge badge-info">2 Stars</span>';
                        }
                        elseif($data->stars == '3 Stars'){
                            $stars = '<span class="badge badge-info">3 Stars</span>';
                        }
                        elseif($data->stars == '4 Stars'){
                            $stars = '<span class="badge badge-success">4 Stars</span>';
                        }
                        else{
                            $stars = '<span class="badge badge-success">5 Stars</span>';
                        }   
                        return $stars;
                    })                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Pending'){
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }
                        else{
                            $status = '<span class="badge badge-success">Seen</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status','stars'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $feedback = UserFeedback::where('id',$id)->first();
        
        // dd($feedback);              
        
        return view('backend.feedback.edit',[
            'feedback' => $feedback         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $update = new UserFeedback;

        $update->status='Seen';        
        
        UserFeedback::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.feedbacks.index')->withFlashSuccess('Updated Successfully'); 
                            

    }

    public function destroy($id)
    {        
        $data = UserFeedback::findOrFail($id);
        $data->delete();   
    }
}
