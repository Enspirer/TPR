@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
    <form action="{{route('admin.agent.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-5">
                                                <img src="{{url('files/agent_request/',$agent_request->photo)}}" class="img-fluid border border-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h4 class="mb-0">{{ $agent_request->name }}</h4>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #94ca60;">{{ $agent_request->country }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4 pe-0">
                                            <div class="col-6">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight: 600;">Agent Type</td>
                                                            <td>{{ $agent_request->agent_type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Company Name</td>
                                                            <td>{{ $agent_request->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Company Reg Number</td>
                                                            <td>{{ $agent_request->company_registration_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Email</td>
                                                            <td>{{ $agent_request->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Request</td>
                                                            <td>{{ $agent_request->request }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Description</td>
                                                            <td>{{ $agent_request->description_message }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="col-6 pe-0">
                                                <table class="table table-hover table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight: 600;">Tax Number</td>
                                                            <td>{{ $agent_request->tax_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Validation</td>
                                                            <td>{{ $agent_request->validation_type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Telephone</td>
                                                            <td>{{ $agent_request->telephone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 600;">Address</td>
                                                            <td>{{ $agent_request->address }}</td>
                                                        </tr>
                                                        <tr>
                                                            @if($agent_request->validation_type == 'NIC')
                                                                <td style="font-weight: 600;">NIC Number</td>
                                                                <td>{{ $agent_request->nic }}</td>
                                                            
                                                            @elseif($agent_request->validation_type == 'Passport')
                                                                <td style="font-weight: 600;">Passport Number</td>
                                                                <td>{{ $agent_request->passport }}</td>

                                                            @else                        
                                                                <td style="font-weight: 600;">License Number</td>
                                                                <td>{{ $agent_request->license }}</td>
                                                                
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            @if($agent_request->validation_type == 'NIC')
                                                                <td style="font-weight: 600;">NIC Photo</td>
                                                                <td><img src="{{url('files/agent_request/',$agent_request->nic_photo)}}" style="width: 40%;" alt="" ></td>
                                                            
                                                            @elseif($agent_request->validation_type == 'Passport')
                                                                <td style="font-weight: 600;">Passport Number</td>
                                                                <td> <img src="{{url('files/agent_request/',$agent_request->passport_photo)}}" style="width: 40%;" alt="" ></td>

                                                            @else                        
                                                                <td style="font-weight: 600;">License Number</td>
                                                                <td><img src="{{url('files/agent_request/',$agent_request->license_photo)}}" style="width: 40%;" alt="" ></td>
                                                                
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
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
                        </div>  -->

                       <!-- @if($agent_request->validation_type == 'NIC')
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
                        
                        @endif -->


                        <!-- @if($agent_request->validation_type == 'NIC')
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
                        </div> -->
                        
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Approved" {{ $agent_request->status == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Rejected" {{ $agent_request->status == 'Rejected' ? "selected" : "" }}>Reject</option> 
                                    <option value="Pending" {{ $agent_request->status == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $agent_request->id }}"/>
                                <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>






<br><br>
@endsection
