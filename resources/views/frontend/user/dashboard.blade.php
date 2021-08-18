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
                                                    <input type="text" class="form-control" value="{{ $user_edit->first_name }}" id="firstName" aria-describedby="firstName" name="first_name" required>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="lastName" class="form-label mb-0 required">Last Name</label>
                                                    <input type="text" value="{{ $user_edit->last_name }}" class="form-control" id="lastName" aria-describedby="lastName" name="last_name" required>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="displayName" class="form-label mb-0 mt-4 required">Display Name</label>
                                                    <input type="text" class="form-control" id="displayName" name="display_name" aria-describedby="displayName" value="{{ $user_edit->display_name }}" required>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                                    <input value="{{ $user_edit->email }}" type="email" class="form-control" id="email" aria-describedby="email" name="email" required>
                                                </div>  
                                            </div>
                                        </div>
                                    

                                        <h4 class="mt-5 mb-1">More About You</h4>
                                        <h6 style="color: #5e6871">Tell us more about you and your real estate needs.</h6>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="userType" class="form-label mb-0 required">I am a</label>
                                                <select class="form-select" aria-label="userType" id="userType" name="user_type" value="{{ $user_edit->user_type }}" required>
                                                    <option value="">No Preference</option>
                                                    <option value="first-time-buyer">First time buyer</option>
                                                    <option value="repeat-buyer">Repeat buyer</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="residential-investor">Residential investor</option>
                                                    <option value="commercial-investor">Commercial investor</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="dob" class="form-label mb-0 required">Year of birth</label>
                                                <!-- <select class="form-select" aria-label="birth" id="dob" name="dob" value="{{ $user_edit->dob }}" required>
                                                    <option>Select</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                </select> -->
                                                <input value="{{ $user_edit->dob }}" type="date" class="form-control" id="dob" aria-describedby="dob" name="dob" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="gender" class="form-label mb-0 mt-4 required">Gender</label>
                                                <select class="form-select" aria-label="gender" id="gender" name="gender" value="{{ $user_edit->gender }}" required>
                                                    <option value="">Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="displayName" class="form-label mb-0 mt-4 required">Marital Status</label>
                                                <select class="form-select" aria-label="Default select example" id="marital" name="marital" value="{{ $user_edit->marital_status }}" required>
                                                    <option value="">Select</option>
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
                                                    <label for="city" class="form-label mb-0 required">City</label>
                                                    <input type="text" class="form-control" id="city" aria-describedby="city" name="city" value="{{ $user_edit->city }}" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="province" class="form-label mb-0 required">Province</label>
                                                    <input type="province" class="form-control" id="province" aria-describedby="province" name="province" value="{{ $user_edit->province }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="country" class="form-label mb-0 mt-4 required">Country</label>
                                                <select class="form-select" aria-label="country" id="country" name="country" required>
                                                    <option value="">Select</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Virgin Islands">British Virgin Islands</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burma">Burma</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Galapagos Islands">Galapagos Islands</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Ivory Coast">Ivory Coast</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Martin">Saint Martin</option>
                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Turks and Cacaos Islands">Turks and Cacaos Islands</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="United States Virgin Islands">United States Virgin Islands</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Zambia">Zambia</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="postal-code" class="form-label mb-0 mt-4 required">Postal Code</label>
                                                    <input type="postal-code" class="form-control" id="postal-code" name="postal_code" aria-describedby="postal-code" value="{{ $user_edit->postal_code }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <label for="home-phone" class="form-label mb-0 mt-4 required">Home Phone</label>
                                                    <input type="home-phone" class="form-control" id="home-phone" name="home_phone" aria-describedby="home-phone" value="{{ $user_edit->home_phone }}" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="mobile-phone" class="form-label mb-0 mt-4 required">Mobile Phone</label>
                                                    <input type="mobile-phone" class="form-control" id="mobile-phone" name="mobile_phone" aria-describedby="mobile-phone" value="{{ $user_edit->mobile_phone }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-5 text-center">
                                            <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #6e6e70;">Deactivate Account</button>
                                            <input type="hidden" class="form-control" value="{{ $user_edit->id }}" name="hid_id">
                                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                <!---------------------------------------- agent information  ----------------------------------------- -->



                    @if($agent_edit)
                    <div class="tab-pane fade" id="pills-lorem" role="tabpanel" aria-labelledby="pills-lorem-tab">

                        <form action="{{route('frontend.user.dashboard.update_agent')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}

                            <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Country</label>
                                            <select class="form-control" name="country" required>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->country_name}}" {{ $agent_edit->country == $country->country_name ? "selected" : "" }}>{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
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
                                            <select class="form-select agent_type" name="agent_type" required>

                                                <option value="Individual" {{ $agent_edit->agent_type == 'Individual' ? "selected" : "" }}>Individual</option>
                                                <option value="Company" {{ $agent_edit->agent_type == 'Company' ? "selected" : "" }}>Company</option>
                                                

                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-6 company_name">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Name</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->company_name }}" name="company_name" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 company_reg_no">
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
                                            <label class="form-label mb-0 mt-4 required">Tax Number</label>
                                            <input type="text" class="form-control" value="{{ $agent_edit->tax_number }}" name="tax">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-5 mb-1">Validate Informations</h4>

                                
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">NIC/ Passport/ License</label>
                                            <select class="form-select" name="validate" id="validate" value="{{ $agent_edit->validation_type }}" required>
    
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
                                            <input type="text" class="form-control" id="nic" name="nic" value="{{ $agent_edit->nic }}" placeholder="NIC Number" > 
                                        </div>
                                        <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport</label>
                                            <input type="text" class="form-control" id="passport" value="{{ $agent_edit->passport }}" name="passport" placeholder="Passport Number" > 
                                        </div>
                                        <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License</label>
                                            <input type="text" class="form-control" id="license" value="{{ $agent_edit->license }} name="license" placeholder="License Number" > 
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">

                                    <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC Photo</label>
                                            <input type="file" class="form-control" id="nic_photo" name="nic_photo">   
                                            <br>
                                            @if($agent_edit->nic_photo == !null)
                                            <img src="{{url('files/agent_request',$agent_edit->nic_photo)}}" style="width: 40%;" alt="" >
                                            @endif                                        
                                        </div>
                                        <div id="imgPassport" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport Photo</label>
                                            <input type="file" class="form-control" id="passport_photo" name="passport_photo">   
                                            <br>
                                            @if($agent_edit->passport_photo == !null)
                                            <img src="{{url('files/agent_request',$agent_edit->passport_photo)}}" style="width: 40%;" alt="" >
                                            @endif                                          
                                        </div>
                                        <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License Photo</label>
                                            <input type="file" class="form-control" id="license_photo" name="license_photo">  
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
                                <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
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

        $(document).ready(function() {
        if ($('.agent_type').val() == 'Individual') {
            $('.company_name').addClass('d-none');
            $('.company_reg_no').addClass('d-none');
            $('.company_name').find('input').removeAttr('required');
            $('.company_reg_no').find('input').removeAttr('required');
        }
        else {
            $('.company_name').removeClass('d-none');
            $('.company_reg_no').removeClass('d-none');
            $('.company_name').find('input').prop('required', true);
            $('.company_reg_no').find('input').prop('required', true);
        }
    });

    $('.agent_type').change(function() {
        if ($(this).val() == 'Individual') {
            $('.company_name').addClass('d-none');
            $('.company_reg_no').addClass('d-none');
            $('.company_name').find('input').removeAttr('required');
            $('.company_reg_no').find('input').removeAttr('required');
        }
        else {
            $('.company_name').removeClass('d-none');
            $('.company_reg_no').removeClass('d-none');
            $('.company_name').find('input').prop('required', true);
            $('.company_reg_no').find('input').prop('required', true);
        }
    });


        $(document).ready(function() {
            let value = <?php echo json_encode ($user_edit->user_type ) ?>

            $('#userType option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });

        $(document).ready(function() {
            let value = <?php echo json_encode ($user_edit->dob ) ?>

            $('#dob option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });

        $(document).ready(function() {
            let value = <?php echo json_encode ($user_edit->gender ) ?>

            $('#gender option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });

        $(document).ready(function() {
            let value = <?php echo json_encode ($user_edit->marital_status ) ?>

            $('#marital option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });

         $(document).ready(function() {
            let value = <?php echo json_encode ($user_edit->country ) ?>

            $('#country option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });      



        $(document).ready(function() {
        if($('#validate').val() == 'NIC') {
            $('#nic').prop('required', true);
            // $('#nic_photo').prop('required', true);
        }

        if($('#validate').val() == 'Passport') {
            $('#passport').prop('required', true);
            // $('#passport_photo').prop('required', true);
        }

        if($('#validate').val() == 'License') {
            $('#license').prop('required', true);
            // $('#license_photo').prop('required', true);
        }
    });

    $('#validate').change(function() {
        if($(this).val() == 'NIC') {
            $('#nic').prop('required', true);
            $('#nic_photo').prop('required', true);
        }

        if($(this).val() == 'Passport') {
            $('#passport').prop('required', true);
            $('#passport_photo').prop('required', true);
        }

        if($(this).val() == 'License') {
            $('#license').prop('required', true);
            $('#license_photo').prop('required', true);
        }
    })  
    
    </script>    

@endsection

