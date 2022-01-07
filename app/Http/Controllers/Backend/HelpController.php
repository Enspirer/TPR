<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Help;

class HelpController extends Controller
{
    public function index()
    {
        return view('backend.help.index');
    }

    public function create()
    {
        return view('backend.help.create');
    }

    public function store(Request $request)
    {        
        // dd($request);       
   
        $add = new Help;

        $add->title=$request->title; 
        $add->description=$request->description;        
        $add->status=$request->status;
        $add->order=$request->order;
        $add->save();

        return redirect()->route('admin.help.index')->withFlashSuccess('Added Successfully');                   

    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Help::all();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.help.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    ->editColumn('status', function($data){
                        if($data->status == 0){
                            $status = '<span class="badge badge-warning">Disabled</span>';
                        }
                        else{
                            $status = '<span class="badge badge-success">Enabled</span>';
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
        $help = Help::where('id',$id)->first();
        
        // dd($help);              

        return view('backend.help.edit',[
            'help' => $help         
        ]);  
    }

    public function update(Request $request)
    {        
        // dd($request);

        $update = new Help;

        $update->title=$request->title; 
        $update->description=$request->description;        
        $update->status=$request->status;
        $update->order=$request->order;

        Help::whereId($request->hidden_id)->update($update->toArray());
   
        return redirect()->route('admin.help.index')->withFlashSuccess('Updated Successfully');                   

    }

    public function destroy($id)
    {        
        $data = Help::findOrFail($id);
        $data->delete();   
    }
}
