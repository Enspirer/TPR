@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    
<form action="{{route('admin.property.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <!-- <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled">Disable</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="text" class="form-control" name="order" required>
                        </div> -->
                        
                    </div>
                </div>

                <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Admin Approval</label>
                                <select class="form-control" name="admin_approval" required>
                                    <option value="Approval" {{ $property->admin_approval == 'Approval' ? "selected" : "" }}>Approval</option>   
                                    <option value="Decline" {{ $property->admin_approval == 'Decline' ? "selected" : "" }}>Decline</option> 
                                    <option value="Pending" {{ $property->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>
                            <br>                       
                                 

                        </div>
                    </div>
                </div>
                

            </div><br>

        </div>

    </form>






<br><br>
@endsection
