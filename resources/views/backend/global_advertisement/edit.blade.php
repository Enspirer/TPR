@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')




<form action="{{route('admin.global_advertisement.update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                        
                    
                    <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $global_advertisement->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="description">{{ $global_advertisement->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Global Ad Category</label>
                            <select class="form-control" id="category" name="category" placeholder="Global Ad Category" required>
                                <option value="" selected disabled hidden>Global Ad Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == App\Models\GlobalAdvertisement::where('id', $global_advertisement->id)->first()->global_category ? "selected" : "" }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" value="{{ $global_advertisement->order }}" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $global_advertisement->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $global_advertisement->status == '0' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>                
                        
                    </div>   
                </div>
            </div>
            
            <input type="hidden" name="hidden_id" value="{{ $global_advertisement->id }}"/>
            <a href="{{route('admin.global_advertisement.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button>
            
            <br>        
        </div>

        <div class="col-6">

            <div class="card">
                <div class="card-body" >
                    <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                    <h5>Large Left</h5>                                                 
                        <div class="form-group">
                            <label>Image ( dimensions = width: 600px * height: 300px )</label>
                            <input type="file" class="form-control" name="large_left_image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->image)}}" style="width: 30%;" alt="" >
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="ll_link" value="{{ $global_advertisement->link }}">
                        </div> 
                        <br>
                        <div class="d-flex justify-content-end">
                        <a href="{{route('admin.global_advertisement.clear1',$global_advertisement->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-danger">Clear</a>
                        </div>
                    </div>   
                </div>
            </div> 
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                    <h5>Large Right</h5>                                               
                        <div class="form-group">
                            <label>Image ( dimensions = width: 600px * height: 300px )</label>
                            <input type="file" class="form-control" name="large_right_image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->large_right_image)}}" style="width: 30%;" alt="" >
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="lr_link" value="{{ $global_advertisement->large_right_link }}">
                        </div> 
                        <br>
                        <div class="d-flex justify-content-end">
                        <a href="{{route('admin.global_advertisement.clear2',$global_advertisement->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-danger">Clear</a>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: dashed;border-width: 1px;padding: 20px;"> 
                    <h5>Small Left</h5>                                                 
                        <div class="form-group">
                            <label>Image ( dimensions = width: 500px * height: 250px )</label>
                            <input type="file" class="form-control" name="small_left_image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->small_left_image)}}" style="width: 30%;" alt="" >
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sl_link" value="{{ $global_advertisement->small_left_link }}">
                        </div> 
                        <br>
                        <div class="d-flex justify-content-end">
                        <a href="{{route('admin.global_advertisement.clear3',$global_advertisement->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-danger">Clear</a>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: dashed;border-width: 1px;padding: 20px;">   
                    <h5>Small Middle</h5>                                               
                        <div class="form-group">
                            <label>Image ( dimensions = width: 500px * height: 250px )</label>
                            <input type="file" class="form-control" name="small_middle_image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->small_middle_image)}}" style="width: 30%;" alt="" >
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sm_link" value="{{ $global_advertisement->small_middle_link }}">
                        </div> 
                        <br>
                        <div class="d-flex justify-content-end">
                        <a href="{{route('admin.global_advertisement.clear4',$global_advertisement->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-danger">Clear</a>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: dashed;border-width: 1px;padding: 20px;">   
                    <h5>Small Right</h5>                                               
                        <div class="form-group">
                            <label>Image ( dimensions = width: 500px * height: 250px )</label>
                            <input type="file" class="form-control" name="small_right_image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->small_right_image)}}" style="width: 30%;" alt="" >
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sr_link" value="{{ $global_advertisement->small_right_link }}" >
                        </div> 
                        <br>
                        <div class="d-flex justify-content-end">
                        <a href="{{route('admin.global_advertisement.clear5',$global_advertisement->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-danger">Clear</a>
                        </div>
                    </div>   
                </div>
            </div>

        </div>

    </div>
</form>


<br><br>
@endsection
