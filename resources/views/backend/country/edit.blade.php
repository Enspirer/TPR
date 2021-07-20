@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.country.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Country Name</label>
                            <input type="text" class="form-control" name="country_name" value="{{ $country->country_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>SLUG</label>
                            <input type="text" class="form-control" name="slug" value="{{ $country->slug }}" required>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" class="form-control" name="currency" value="{{ $country->currency }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID</label>
                            <input type="text" class="form-control" name="country_id" value="{{ $country->country_id }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country Manager</label>
                            <input type="text" class="form-control" name="country_manager" value="{{ $country->country_manager }}" required>
                        </div> 
                        <div class="form-group">
                            <label>Features Flag</label>
                            <input type="text" class="form-control" name="features_flag" value="{{ $country->features_flag }}" required>
                        </div>  
                        <div class="form-group">
                            <label>Features Manager</label>
                            <input type="text" class="form-control" name="features_manager" value="{{ $country->features_manager }}" required>
                        </div>                      
                        
                        <!-- <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="8" required></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled" {{ $country->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $country->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $country->id }}"/>
                <a href="{{route('admin.country.index')}}" class="btn btn-info pull-right ml-4">Back</a>&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            

        </div>

    </form>






<br><br>
@endsection
