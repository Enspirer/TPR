@extends('backend.layouts.app')

@section('title', __('Property Calculator'))

@section('content')


<div class="row">
    <div class="col-12">
        <form action="{{route('admin.pro_cal_update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        
            <div class="row">
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">          
                            <div class="form-group">
                                <label>API Client Id</label>
                                <input type="text" class="form-control mt-1" name="api_client_id" value="{{$api_client_id->key}}" required/>
                            </div>                       
                            <div class="form-group">
                                <label>API Key</label>
                                <input type="text" class="form-control mt-1" name="api_key" value="{{$api_key->key}}" required/>
                            </div> 
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control mt-1" name="url" value="{{$url->key}}" required/>
                            </div>  
                                                        
                        </div>
                    </div>
                </div>
            </div>
            
        
            <div class="text-center">
                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Update</button><br><br><br>
            </div>

        </form>
    </div>         

            
</div>



@endsection
