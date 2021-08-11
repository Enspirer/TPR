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
                    <h1 style="margin-top:60px;" class="display-5">Created Succesfully!</h1><br>
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
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Agent Request Form</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                            <h4>About Agent</h4>
                            <!-- class="needs-validation" novalidate -->
                        
                            <form action="{{route('frontend.user.agent.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Country</label>
                                            <select class="form-control" name="country">
                                                @foreach($countries as $country)
                                                    <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">City</label>
                                            <input type="text" class="form-control" name="city" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 company_name">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" required>
                                        </div> 
                                    </div>
                                    <div class="col-6 company_reg_no">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Registration Number</label>
                                            <input type="text" class="form-control" name="company_reg_no" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Agent Type</label>
                                            <select class="form-select agent_type" name="agent_type" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="Company">Company</option>
                                                <option value="Individual">Individual</option>
                                            </select>
                                        </div>  
                                    </div>                                    
                                </div>     

                                <h4 class="mt-5 mb-1">More About Agent</h4>
                                <h6 style="color: #5e6871">Tell us more about the agent</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Request</label>
                                            <input type="text" class="form-control" name="request_field" required>
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Agent Photo</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="photo" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Tax Number - Nullable</label>
                                            <input type="text" class="form-control" name="tax" required>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-5 mb-1">Validate Informations</h4>
                                <!-- <h6 style="color: #5e6871">Tell us more about the agent</h6> -->
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">NIC/ Passport/ License</label>
                                            <select class="form-select" name="validate" id="validate" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="NIC">NIC</option>
                                                <option value="Passport">Passport</option>
                                                <option value="License">License</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">  
                                    
                                        <div id="divFrmNIC" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC</label>
                                            <input type="text" class="form-control" name="nic" placeholder="NIC Number" > 
                                        </div>
                                        <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport</label>
                                            <input type="text" class="form-control" name="passport" placeholder="Passport Number" > 
                                        </div>
                                        <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License</label>
                                            <input type="text" class="form-control" name="license" placeholder="License Number" > 
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">

                                        <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC Photo</label>
                                            <input type="file" class="form-control" name="nic_photo" >                                            
                                        </div>
                                        <div id="imgPassport" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport Photo</label>
                                            <input type="file" class="form-control" name="passport_photo" >                                            
                                        </div>
                                        <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License Photo</label>
                                            <input type="file" class="form-control" name="license_photo" >                                            
                                        </div>

                                    </div>

                                </div>

                                
                                <h4 class="mt-5 mb-1">Contact Information</h4>
                                <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Address</label>
                                            <input type="address" class="form-control" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Telephone</label>
                                            <input type="telephone" class="form-control" name="telephone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label mb-0 mt-4 required">Description Message</label>
                                        <textarea class="form-control" rows="4" name="description_msg" placeholder="Description Message" required></textarea>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                                    <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                @else
                                    <input type="submit" value="Already added an Agent Request" class="btn rounded-pill text-light px-4 py-2 disabled" style="background-color: #85B556;">
                                @endif

                                    <!-- <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;"> -->
                                
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


    $('.agent_type').change(function() {
        if ($(this).val() == 'individual') {
            $('.company_name').css('display' , "none");
            $('.company_reg_no').css('display' , "none");
        }
        else {
            $('.company_name').css('display' , "block");
            $('.company_reg_no').css('display' , "block");
        }
    });

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

