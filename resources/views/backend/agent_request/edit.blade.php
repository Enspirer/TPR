@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
<form action="{{route('admin.agent.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $agent_request->name }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country" value="{{ $agent_request->country }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $agent_request->company_name }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Company Registration Number</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $agent_request->company_registration_number }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $agent_request->address }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $agent_request->telephone }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->email }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Agent Type</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->agent_type }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Description Message</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->description_message }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Request</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->request }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Tax Number</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->tax_number }}" readonly>
                        </div> 
                        <div class="form-group">
                            <label>Validation Type</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->validation_type }}" readonly>
                        </div> 
                       
                        @if($agent_request->validation_type == 'NIC')
                            <div class="form-group">
                            <label>NIC Number</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->nic }}" readonly>
                            </div>
                        
                        @elseif($agent_request->validation_type == 'Passport')
                            <div class="form-group">
                            <label>Passport Number</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->passport }}" readonly>
                            </div>
                        
                        @else                        
                            <div class="form-group">
                            <label>License Number</label>
                            <input type="text" class="form-control" name="email" value="{{ $agent_request->license }}" readonly>
                            </div>
                        
                        @endif


                        @if($agent_request->validation_type == 'NIC')
                            <div class="form-group">
                                <label>NIC Photo</label>
                                <br>
                                <img src="{{url('files/agent_request/',$agent_request->nic_photo)}}" style="width: 40%;" alt="" >
                            </div>
                        
                        @elseif($agent_request->validation_type == 'Passport')
                            <div class="form-group">
                                <label>Passport Photo</label>
                                <br>
                                <img src="{{url('files/agent_request/',$agent_request->passport_photo)}}" style="width: 40%;" alt="" >
                            </div>
                        
                        @else                        
                            <div class="form-group">
                                <label>License Photo</label>
                                <br>
                                <img src="{{url('files/agent_request/',$agent_request->license_photo)}}" style="width: 40%;" alt="" >
                            </div>
                        
                        @endif

                        <div class="form-group">
                            <label>Agent Photo</label>
                            <br>
                            <img src="{{url('files/agent_request/',$agent_request->photo)}}" style="width: 40%;" alt="" >
                        </div>

                        
                        
                    </div>
                </div>

                <input type="hidden" name="hidden_id" value="{{ $agent_request->id }}"/>
                <a href="{{route('admin.agent.index')}}" class="btn btn-primary pull-right ml-4">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approval" {{ $agent_request->status == 'Approval' ? "selected" : "" }}>Approval</option>   
                                    <option value="Decline" {{ $agent_request->status == 'Decline' ? "selected" : "" }}>Decline</option> 
                                    <option value="Pending" {{ $agent_request->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
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
