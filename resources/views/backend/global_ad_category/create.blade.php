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

<form action="{{route('admin.global_ad_categories.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-12">
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
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" required>
                        </div>
                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" class="form-control" id="icon" name="icon">
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

            <div class="text-center">
                <a href="{{route('admin.global_ad_categories.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Create New</button>
            </div>
             
        </div>
    </div>
</form>    

<br><br>



@endsection
