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

    public function create()
    {
        return view('backend.global_advertisement.create');
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

            // ->addColumn('image', function($data){
            //     $img = '<img src="'.url('files/global_advertisement',$data->image).'" style="width: 100%">';                     
            //     return $img;
            // })
                    
            ->addColumn('status', function($data){
                if($data->status == '1'){
                    $status = '<span class="badge badge-success">Enable</span>';
                }
                else{
                    $status = '<span class="badge badge-danger">Disable</span>';
                }   
                return $status;
            })
                    
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return back();
    }

    


    public function store(Request $request)
    {        
        // dd($request);

        $request->validate([
            'large_left_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300',
            'large_right_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300',
            'small_left_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250',
            'small_middle_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250',
            'small_right_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250'         
        ]); 
    
        if($request->file('large_left_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->large_left_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->large_left_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url1 = $preview_fileName;
        }else{
            $image_url1 = null;
        } 
        if($request->file('large_right_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->large_right_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->large_right_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url2 = $preview_fileName;
        }else{
            $image_url2 = null;
        } 
        if($request->file('small_left_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_left_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_left_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url3 = $preview_fileName;
        }else{
            $image_url3 = null;
        } 
        if($request->file('small_middle_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_middle_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_middle_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url4 = $preview_fileName;
        }else{
            $image_url4 = null;
        } 
        if($request->file('small_right_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_right_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_right_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url5 = $preview_fileName;
        }else{
            $image_url5 = null;
        } 
        // dd($image_url);

        $addAD = new GlobalAdvertisement;
        
        $addAD->name=$request->name;
        $addAD->description=$request->description;
        $addAD->order=$request->order;
        $addAD->status=$request->status;

        $addAD->link=$request->ll_link;
        $addAD->image=$image_url1;

        $addAD->large_right_link=$request->lr_link;
        $addAD->large_right_image=$image_url2;

        $addAD->small_left_link=$request->sl_link;
        $addAD->small_left_image=$image_url3;

        $addAD->small_middle_link=$request->sm_link;
        $addAD->small_middle_image=$image_url4;

        $addAD->small_right_link=$request->sr_link;
        $addAD->small_right_image=$image_url5;

        $addAD->save();

        return redirect()->route('admin.global_advertisement.index')->withFlashSuccess('Added Successfully');  
          
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

        $request->validate([
            'large_left_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300',
            'large_right_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=600,height=300',
            'small_left_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250',
            'small_middle_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250',
            'small_right_image'  => 'mimes:jpeg,png,jpg|max:20000|dimensions:width=500,height=250'         
        ]);  
        
        if($request->file('large_left_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->large_left_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->large_left_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url1 = $preview_fileName;
        }else{
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url1 = $detail->image;
        } 
        if($request->file('large_right_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->large_right_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->large_right_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url2 = $preview_fileName;
        }else{
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url2 = $detail->large_right_image;
        } 
        if($request->file('small_left_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_left_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_left_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url3 = $preview_fileName;
        }else{
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url3 = $detail->small_left_image;
        } 
        if($request->file('small_middle_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_middle_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_middle_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url4 = $preview_fileName;
        }else{
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url4 = $detail->small_middle_image;
        } 
        if($request->file('small_right_image'))
        {            
            $preview_fileName = time().'_'.rand(1000,10000).'.'.$request->small_right_image->getClientOriginalExtension();
            $fullURLsPreviewFile = $request->small_right_image->move(public_path('files/global_advertisement'), $preview_fileName);
            $image_url5 = $preview_fileName;
        }else{
            $detail = GlobalAdvertisement::where('id',$request->hidden_id)->first();
            $image_url5 = $detail->small_right_image;
        } 

         
        
        $upAD = new GlobalAdvertisement;

        $upAD->name=$request->name;
        $upAD->description=$request->description;        
        $upAD->order=$request->order;
        $upAD->status=$request->status;

        $upAD->link=$request->ll_link;
        $upAD->image=$image_url1;

        $upAD->large_right_link=$request->lr_link;
        $upAD->large_right_image=$image_url2;

        $upAD->small_left_link=$request->sl_link;
        $upAD->small_left_image=$image_url3;

        $upAD->small_middle_link=$request->sm_link;
        $upAD->small_middle_image=$image_url4;

        $upAD->small_right_link=$request->sr_link;
        $upAD->small_right_image=$image_url5;

        GlobalAdvertisement::whereId($request->hidden_id)->update($upAD->toArray());
   
        return redirect()->route('admin.global_advertisement.index')->withFlashSuccess('Updated Successfully');   

    }

    public function destroy($id)
    {        
        $data = GlobalAdvertisement::findOrFail($id);
        $data->delete();   
    }

    public function clear1($id)
    {      
        $detail = GlobalAdvertisement::where('id',$id)->first();
        $detail->image = null;
        $detail->link = null;

        GlobalAdvertisement::whereId($id)->update($detail->toArray());

        return back(); 
    }

    public function clear2($id)
    {      
        $detail = GlobalAdvertisement::where('id',$id)->first();
        $detail->large_right_image = null;
        $detail->large_right_link = null;

        GlobalAdvertisement::whereId($id)->update($detail->toArray());

        return back(); 
    }
    public function clear3($id)
    {      
        $detail = GlobalAdvertisement::where('id',$id)->first();
        $detail->small_left_image = null;
        $detail->small_left_link = null;

        GlobalAdvertisement::whereId($id)->update($detail->toArray());

        return back(); 
    }
    public function clear4($id)
    {      
        $detail = GlobalAdvertisement::where('id',$id)->first();
        $detail->small_middle_image = null;
        $detail->small_middle_link = null;

        GlobalAdvertisement::whereId($id)->update($detail->toArray());

        return back(); 
    }
    public function clear5($id)
    {      
        $detail = GlobalAdvertisement::where('id',$id)->first();
        $detail->small_right_image = null;
        $detail->small_right_link = null;

        GlobalAdvertisement::whereId($id)->update($detail->toArray());

        return back(); 
    }




}
