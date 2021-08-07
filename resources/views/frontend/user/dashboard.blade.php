@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

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

                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-accountInformation-tab" data-bs-toggle="pill" data-bs-target="#pills-accountInformation" type="button" role="tab" aria-controls="pills-accountInformation" aria-selected="true">Accout Information</button>
                    </li>
                    @if($agent_edit)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lorem-tab" data-bs-toggle="pill" data-bs-target="#pills-lorem" type="button" role="tab" aria-controls="pills-lorem" aria-selected="false">Agent Information</button>
                    </li>
                    @endif
                </ul>
                                    
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-accountInformation" role="tabpanel" aria-labelledby="pills-accountInformation-tab">

                        <div class="row justify-content-between">
                            <div class="col-8 p-0">
                                <h4 class="fs-4 fw-bolder user-settings-head">Account Information</h4>
                                <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 border">
                                <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                                    <h4>About You</h4>
                                    
                                    <form action="{{route('frontend.user.dashboard.userStore')}}" method="post" enctype="multipart/form-data" >
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="firstName" class="form-label mb-0 required">First Name</label>
                                                    <input type="text" class="form-control" value="{{auth()->user()->first_name}}" id="firstName" aria-describedby="firstName" name="first_name">
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="lastName" class="form-label mb-0 required">Last Name</label>
                                                    <input type="text" value="{{auth()->user()->last_name}}" class="form-control" id="lastName" aria-describedby="lastName" name="last_name">
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="displayName" class="form-label mb-0 mt-4 required">Display Name</label>
                                                    <input type="text" class="form-control" id="displayName" name="display_name" aria-describedby="displayName">
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                                    <input value="{{auth()->user()->email}}" type="email" class="form-control" id="email" aria-describedby="email" name="email">
                                                </div>  
                                            </div>
                                        </div>
                                    

                                        <h4 class="mt-5 mb-1">More About You</h4>
                                        <h6 style="color: #5e6871">Tell us more about you and your real estate needs.</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="userType" class="form-label mb-0">I am a</label>
                                                <select class="form-select" aria-label="userType" id="userType">
                                                    <option selected>No Preference</option>
                                                    <option value="1">First time buyer</option>
                                                    <option value="2">Repeat buyer</option>
                                                    <option value="3">Seller</option>
                                                    <option value="3">Residential investor</option>
                                                    <option value="3">Commercial investor</option>
                                                    <option value="3">Seller</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="birth" class="form-label mb-0">Year of birth</label>
                                                <select class="form-select" aria-label="birth" id="birth">
                                                    <option selected>Select</option>
                                                    <option value="1">2021</option>
                                                    <option value="2">2020</option>
                                                    <option value="3">2019</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="gender" class="form-label mb-0 mt-4">Gender</label>
                                                <select class="form-select" aria-label="gender" id="gender">
                                                    <option selected>Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="displayName" class="form-label mb-0 mt-4">Marital Status</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select</option>
                                                    <option value="single">Single</option>
                                                    <option value="common-law">Common Law</option>
                                                    <option value="married">Married</option>
                                                    <option value="separated">separated</option>
                                                    <option value="divorced">Divorced</option>
                                                    </select>
                                            </div>
                                        </div>


                                        <h4 class="mt-5 mb-1">Contact Information</h4>
                                        <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="city" class="form-label mb-0">City</label>
                                                    <input type="city" class="form-control" id="city" aria-describedby="city">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="province" class="form-label mb-0">Province</label>
                                                    <input type="province" class="form-control" id="province" aria-describedby="province">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="country" class="form-label mb-0 mt-4">Country</label>
                                                <select class="form-select" aria-label="country" id="country">
                                                    <option selected>Sri Lanka</option>
                                                    <option value="india">India</option>
                                                    <option value="australia">Australia</option>
                                                    </select>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="postal-code" class="form-label mb-0 mt-4">Postal Code</label>
                                                    <input type="postal-code" class="form-control" id="postal-code" aria-describedby="postal-code">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="home-phone" class="form-label mb-0 mt-4">Home Phone</label>
                                                    <input type="home-phone" class="form-control" id="home-phone" aria-describedby="home-phone">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="mobile-phone" class="form-label mb-0 mt-4">Mobile Phone</label>
                                                    <input type="mobile-phone" class="form-control" id="mobile-phone" aria-describedby="mobile-phone">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-5 text-center">
                                            <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #6e6e70;">Deactivate Account</button>
                                            <input type="hidden" class="form-control" value="{{$user_edit->id}}" name="hid_id">
                                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- ***************************************  agent information  *************************************************************************************************************************************** -->
                   

                    @if($agent_edit)
                    <div class="tab-pane fade" id="pills-lorem" role="tabpanel" aria-labelledby="pills-lorem-tab">

                        <form action="{{route('frontend.user.dashboard.editAgent')}}" method="post" enctype="multipart/form-data" >
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
                                            <input type="text" class="form-control" value="{{ $agent_edit->name }}" name="name" required>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Agent Type</label>
                                            <select class="form-select" name="agent_type" required>
                 
                                                <option value="Company" {{ $agent_edit->agent_type == 'Company' ? "selected" : "" }}>Company</option>
                                                <option value="Individual" {{ $agent_edit->agent_type == 'Individual' ? "selected" : "" }}>Individual</option>
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
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Email</label>
                                            <input type="email" class="form-control" value="{{ $agent_edit->email }}" name="email" required>
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
                                        <label class="form-label mb-0 mt-4 required">Description Message</label>
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

                    @endif
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
        
    
    </script>    

@endsection

