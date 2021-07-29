<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\AgentRequest;

class AgentRequestController extends Controller
{
    
    public function index()
    {
        return view('backend.agent_request.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = AgentRequest::all();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.agent.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Approval </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == 'Approval'){
                            $status = '<span class="badge badge-success">Approval</span>';
                        }elseif($data->status == 'Decline'){
                            $status = '<span class="badge badge-danger">Decline</span>';
                        }else{
                            $status = '<span class="badge badge-warning">Pending</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }

    public function edit($id)
    {
        $agent_request = AgentRequest::where('id',$id)->first();
        
        // dd($agent_request);              

        return view('backend.agent_request.edit',[
            'agent_request' => $agent_request         
        ]);  
    }

    public function update(Request $request)
    {    
        // $request->validate([
        //     'order' => 'numeric'                
        // ]); 

        $upagent = new AgentRequest;
        
        // $upagent->name=$request->name;
        // $upagent->country=$request->country;
        // $upagent->email=$request->email;
        // $upagent->telephone=$request->telephone;
        $upagent->status=$request->status;
   
        AgentRequest::whereId($request->hidden_id)->update($upagent->toArray());

        return redirect()->route('admin.agent.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function destroy($id)
    {        
        $data = AgentRequest::findOrFail($id);
        $data->delete();   
    }

}
