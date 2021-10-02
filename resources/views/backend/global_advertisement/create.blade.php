@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')


<!-- <div class="form-group">
            <div class="row m-0">
              
              @if(session()->has('error'))
                  <div class="alert alert-danger">
                      {{ session()->get('error') }}
                  </div>
              @endif
                                      
            </div>
          </div> -->

<form action="{{route('admin.global_advertisement.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                        
                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="category" name="category" placeholder="Global Ad Category" required>
                                <option value="" selected disabled hidden>Global Ad Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1">Enable</option>   
                                <option value="0">Disable</option>                                
                            </select>
                        </div>                 
                        
                    </div>   
                </div>
            </div>
            
            <a href="{{route('admin.global_advertisement.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Create New</button>
            
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
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="ll_link">
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
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="lr_link">
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
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sl_link">
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
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sm_link">
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
                        </div>  
                        <div class="form-group mb-3">
                            <label>Link</label>
                            <input type="text" class="form-control" name="sr_link">
                        </div> 
                    </div>   
                </div>
            </div>

        </div>

    </div>
</form>    

<br><br>



@endsection
