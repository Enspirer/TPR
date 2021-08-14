<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\GlobalAdvertisement;


class GlobalAdvertisementController extends Controller
{
    public function index()
    {
        return view('backend.global_advertisement.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = GlobalAdvertisement::all();
    
            return DataTables::of($data)
            
            ->addColumn('action', function($data){                       
                $button = '<a href="'.route('admin.global_advertisement.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $button;
            })

            ->addColumn('image', function($data){
                $img = '<img src="'.url('files/global_advertisement',$data->image).'" style="width: 100%">';                     
                return $img;
            })
                    
            ->addColumn('status', function($data){
                if($data->status == '1'){
                    $status = '<span class="badge badge-success">Enable</span>';
                }
                else{
                    $status = '<span class="badge badge-danger">Disable</span>';
                }   
                return $status;
            })
                    
            ->rawColumns(['action','image','status'])
            ->make(true);
        }
        return back();
    }

    


    public function store(Request $request)
    {        
        // dd($request);

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=1330,height=745',
        //     'order' => 'numeric'            
        // ]); 
    
        if($request->file('image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{
            $image_url = null;
        } 
        // dd($image_url);

        $addAD = new GlobalAdvertisement;
        
        $addAD->name=$request->name;
        $addAD->description=$request->description;
        $addAD->link=$request->link;
        $addAD->order=$request->order;
        $addAD->status=$request->status;
        $addAD->image=$image_url;
        $addAD->save();

        return back()->withFlashSuccess('Added Successfully');  


          
    }

    public function edit($id)
    {
        $global_advertisement = GlobalAdvertisement::where('id',$id)->first();
        
        // dd($property_type);              
        
        return view('backend.global_advertisement.edit',[
            'global_advertisement' => $global_advertisement         
        ]);  
    }

    public function update(Request $request)
    {    

        // $request->validate([
        //     'image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=1330,height=745',
        //     'order' => 'numeric'            
        // ]);      
        
        if($request->file('image'))
        {
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url = $preview_fileName;
        }else{            
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url = $detail->image;            
        }    
        
        $upAD = new GlobalAdvertisement;

        $upAD->name=$request->name;
        $upAD->description=$request->description;
        $upAD->link=$request->link;
        $upAD->order=$request->order;
        $upAD->status=$request->status;
        $upAD->image=$image_url;

        GlobalAdvertisement::whereId($request->hidden_id)->update($upAD->toArray());
   
        return redirect()->route('admin.global_advertisement.index')->withFlashSuccess('Updated Successfully');   

    }

    public function destroy($id)
    {        
        $data = GlobalAdvertisement::findOrFail($id);
        $data->delete();   
    }



}
