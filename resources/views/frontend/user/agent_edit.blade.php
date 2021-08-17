@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush


@if ( session()->has('message') )


<div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between mt-4">

                    <div class="container-fluid jumbotron text-center" style="background-color: #c6e4ee; border-radius: 15px 50px;">
                    <h1 style="margin-top:60px;" class="display-5">Succesfully Updated!</h1><br>
                        <!-- <p class="lead"><h3>Your request is sent. One of our member will get back in touch with you soon!<br><br> Have a great day!</h3></p> -->
                        <hr><br>    
                        <p class="lead">
                            <a class="btn btn-success btn-md" href="{{url('/')}}" role="button">Go Back to Home Page</a>
                        </p>
                        <br>
                    </div>

                </div>                
            </div>
        </div>
    </div>


@else

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-12 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit Agent Request Form</h4>

                        <div class="form-group">
                            <div class="row">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif                                                    
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <h4>About Agent</h4>
                            <!-- class="needs-validation" novalidate -->
                        
                            <form action="{{route('frontend.user.agent.update_agent')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}

                            <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Country</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->country }}" name="country" required>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->name }}" name="name" required>
                                            <!-- <input type="text" class="form-control" value="{{ $agent_edit->name }}" name="name" required> -->
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">City</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->city }}" name="city" required>
                                        </div>  
                                    </div>                                    
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Email</label>
                                            <input type="email" class="form-control" value="{{ $agent_edit->email }}" name="email" required>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Agent Type</label>
                                            <select class="form-select" name="agent_type" required>

                                                <option value="Company" {{ $agent_edit->agent_type == 'company' ? "selected" : "" }}>company</option>
                                                <option value="Individual" {{ $agent_edit->agent_type == 'individual' ? "selected" : "" }}>individual</option>

                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Name</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->company_name }}" name="company_name" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Registration Number</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->company_registration_number }}" name="company_reg_no" required>
                                        </div>  
                                    </div>                                    
                                </div>
                                
                            

                                <h4 class="mt-5 mb-1">More About Agent</h4>
                                <h6 style="color: #5e6871">Tell us more about the agent</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Request</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->request }}" name="request_field" required>
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Agent Photo</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="photo">                                                
                                            </div>
                                            <br>
                                            <img src="{{url('files/agent_request',$agent_edit->photo)}}" style="width: 30%;" alt="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Tax Number - Nullable</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->tax_number }}" name="tax" required>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-5 mb-1">Validate Informations</h4>

                                
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">NIC/ Passport/ License</label>
                                            <select class="form-select" name="validate" id="validate" required>
    
                                                <option value="NIC" {{ $agent_edit->validation_type == 'NIC' ? "selected" : "" }}>NIC</option>
                                                <option value="Passport" {{ $agent_edit->validation_type == 'Passport' ? "selected" : "" }}>Passport</option>
                                                <option value="License" {{ $agent_edit->validation_type == 'License' ? "selected" : "" }}>License</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">  
                                    
                                        <div id="divFrmNIC" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC</label>
                                            <input type="text" class="form-control" name="nic" value="{{ $agent_edit->nic }}" placeholder="NIC Number" > 
                                        </div>
                                        <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport</label>
                                            <input type="text" class="form-control" name="passport" value="{{ $agent_edit->passport }}" placeholder="Passport Number" > 
                                        </div>
                                        <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License</label>
                                            <input type="text" class="form-control" name="license" value="{{ $agent_edit->license }}" placeholder="License Number" > 
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">

                                        <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC Photo</label>
                                            <input type="file" class="form-control" name="nic_photo" >   
                                            <br>
                                            @if($agent_edit->nic_photo == !null)
                                            <img src="{{url('files/agent_request',$agent_edit->nic_photo)}}" style="width: 40%;" alt="" >
                                            @endif                                        
                                        </div>
                                        <div id="imgPassport" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport Photo</label>
                                            <input type="file" class="form-control" name="passport_photo" >   
                                            <br>
                                            @if($agent_edit->passport_photo == !null)
                                            <img src="{{url('files/agent_request',$agent_edit->passport_photo)}}" style="width: 40%;" alt="" >
                                            @endif                                          
                                        </div>
                                        <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License Photo</label>
                                            <input type="file" class="form-control" name="license_photo" >  
                                            <br>
                                            @if($agent_edit->license_photo == !null)
                                            <img src="{{url('files/agent_request',$agent_edit->license_photo)}}" style="width: 40%;" alt="" >
                                            @endif                                           
                                        </div>
                                       

                                    </div>

                                </div>

                                
                                <h4 class="mt-5 mb-1">Contact Information</h4>
                                <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Address</label>
                                            <input type="address" class="form-control" name="address" value="{{ $agent_edit->address }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Telephone</label>
                                            <input type="telephone" class="form-control" value="{{ $agent_edit->telephone }}" name="telephone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label mb-0 mt-4 required">Description Message (Minimum length of the characters in Description should be 600)</label>
                                        <textarea class="form-control" rows="4" name="description_msg" placeholder="Description Message" required> {{ $agent_edit->description_message }} </textarea>
                                    </div>
                                </div>


                            <div class="col-6 mt-4">
                                <div>
                                    <label class="form-label mb-0 required">Cover Photo</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="cover_photo">
                                    </div>
                                    <br>
                                    @if($agent_edit->cover_photo == !null)
                                        <img src="{{url('files/agent_request',$agent_edit->cover_photo)}}" style="width: 60%;" alt="" >
                                    @endif 
                                </div>
                            </div>

                            <br>

                            <div class="mt-5 text-center">
                                <input type="hidden" class="form-control" value="{{$agent_edit->id}}" name="hidden_id">
                                <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                            </div>

                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>



<script>
        
    $(function() {
        $( "#validate" ).change(function() {  
            validate();
        });
        function validate() {
            $('.form-validate-div').hide();
            var divKey = $( "#validate option:selected" ).val();                
            $('#divFrm'+divKey).show();

            $('.form-image-div').hide();
            var divKey = $( "#validate option:selected" ).val();                
            $('#img'+divKey).show();
        }       
        validate();
    });
    

    // function validateForm() {
    //     let x = document.forms["myForm"]["nic"].value;
    //     if (x == "") {
    //         alert("NIC Number must be filled out");
    //         return false;
    //     }
    // }

</script>

<!-- <script>
    $(document).ready(function(){
        $("form").submit(function(){
        alert("Submitted");
        });
    });
</script> -->





@endif

@endsection

