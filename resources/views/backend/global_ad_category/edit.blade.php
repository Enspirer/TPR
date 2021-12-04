@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')




<form action="{{route('admin.global_ad_categories.update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body" >
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                        
                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="description" value="{{ $category->description }}">{{ $category->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order" value="{{ $category->order }}" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $category->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $category->status == '0' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>                
                        
                    </div>   
                </div>
            </div>      
        </div>

        <div class="col-6">

            <div class="card">
                <div class="card-body" >
                    <div style="border-style: dashed;border-width: 1px;padding: 20px;"> 

                        <div class="form-group">
                            <label>Icon</label>
                            <img src="{{ url('files/global_advertisement', $category->icon) }}" alt="" width="40%" class="img-fluid">
                            <input type="hidden" class="form-control" name="old_icon" value="{{$category->icon}}">

                            <div class="input-group mt-4">
                                <input type="file" class="form-control" id="icon" name="new_icon" value="" >
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        <div class="text-center">
            <input type="hidden" name="hidden_id" value="{{ $category->id }}"/>
            <a href="{{route('admin.global_ad_categories.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button>
        </div>
    </div>
</form>


<br><br>
@endsection
