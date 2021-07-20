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
                            <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $country->country_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>SLUG</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $country->slug }}" required>
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
                                <option value="1" {{ $country->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $country->status == '0' ? "selected" : "" }}>Disable</option>                                
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



<script>

$("#country_name").keyup(function(){
    var str = $(this).val();
    var trims = $.trim(str)
    var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $("#slug").val(slug.toLowerCase()) 
})

</script>


<br><br>
@endsection
