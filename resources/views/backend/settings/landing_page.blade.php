@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

    
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.landing_page_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body">                    
                    
                        <div class="form-group">
                            <label>Drop down</label>
                            <select class="form-control" name="{{ $settings->name }}"> 
                                <option value="Enable" {{ $settings->static_value == 'Enable' ? "selected" : "" }}>Enable</option>   
                                <option value="Disable" {{ $settings->static_value == 'Disable' ? "selected" : "" }}>Disable</option>                                                                    
                            </select>
                        </div>  
                   
                        
                </div>
            </div>

            <!-- <input type="hidden" name="hidden_id" value=""/> -->
            <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            
        </form>
    </div>         

            
</div>    

<br><br>



@endsection
