@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.global_advertisement.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">  

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $global_advertisement->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="2" name="description">{{ $global_advertisement->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="url" class="form-control" name="link" value="{{ $global_advertisement->link }}" required>
                        </div>
                        <div class="form-group">
                            <label>Image ( dimensions = width: 1330px * height: 745px )</label>
                            <input type="file" class="form-control" name="image">
                            <br>
                            <img src="{{url('files/global_advertisement',$global_advertisement->image)}}" style="width: 30%;" alt="" >
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
                <input type="hidden" name="hidden_id" value="{{ $global_advertisement->id }}"/>
                <a href="{{route('admin.global_advertisement.index')}}" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-primary">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button><br>
            </div><br>
            
            

        </div>

    </form>


<br><br>
@endsection
