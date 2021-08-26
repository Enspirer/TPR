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
                    <div class="col-12 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Agent Request Form</h4>

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
                        
                            <form action="{{route('frontend.user.agent.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Country</label>
                                            <select class="form-control" name="country" id="country" required>
                                                <option value="" selected disabled>Select...</option>
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
                                            <select class="form-select cities" aria-label="Default select example" name="city" required>
                                            </select>
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
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Agent Type</label>
                                            <select class="form-select agent_type" name="agent_type" required>
                                                <option value="" selected disabled>Select...</option>
                                                <option value="Individual">Individual</option>
                                                <option value="Company">Company</option>
                                            </select>
                                        </div>  
                                    </div>   
                                    <div class="col-6 company_name d-none">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Name</label>
                                            <input type="text" class="form-control" name="company_name">
                                        </div> 
                                    </div>                                  
                                </div>  

                                <div class="row">
                                    <div class="col-6 company_reg_no d-none">
                                        <div>
                                            <label class="form-label mb-0 mt-4 required">Company Registration Number</label>
                                            <input type="text" class="form-control" name="company_reg_no">
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
                                            <label class="form-label mb-0 mt-4">Tax Number</label>
                                            <input type="text" class="form-control" name="tax">
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
                                                <option value="" selected disabled>Select...</option>
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
                                            <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC Number" > 
                                        </div>
                                        <div id="divFrmPassport" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport</label>
                                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport Number" > 
                                        </div>
                                        <div id="divFrmLicense" class="form-group form-validate-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License</label>
                                            <input type="text" class="form-control" id="license" name="license" placeholder="License Number" > 
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">

                                        <div id="imgNIC" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">NIC Photo</label>
                                            <input type="file" class="form-control" id="nic_photo" name="nic_photo" >                                            
                                        </div>
                                        <div id="imgPassport" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">Passport Photo</label>
                                            <input type="file" class="form-control" id="passport_photo" name="passport_photo" >                                            
                                        </div>
                                        <div id="imgLicense" class="form-group form-image-div" style="display:none">
                                            <label class="form-label mb-0 mt-4 required">License Photo</label>
                                            <input type="file" class="form-control" id="license_photo" name="license_photo" >                                            
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
                                        <label class="form-label mb-0 mt-4 required">Description Message (Minimum length of the characters in Description should be 600)</label>
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


    $('#validate').change(function() {

        if($(this).val() == 'NIC') {
            $('#nic').prop('required', true);
            $('#nic_photo').prop('required', true);

            $('#passport').prop('required', false);
            $('#passport_photo').prop('required', false);

            $('#license').prop('required', false);
            $('#license_photo').prop('required', false);
        }

        if($(this).val() == 'Passport') {
            $('#passport').prop('required', true);
            $('#passport_photo').prop('required', true);

            $('#nic').prop('required', false);
            $('#nic_photo').prop('required', false);

            $('#license').prop('required', false);
            $('#license_photo').prop('required', false);
        }

        if($(this).val() == 'License') {
            $('#license').prop('required', true);
            $('#license_photo').prop('required', true);

            $('#nic').prop('required', false);
            $('#nic_photo').prop('required', false);

            $('#passport').prop('required', false);
            $('#passport_photo').prop('required', false);
        }
    })


    $('#country').change(async function () {
        let country_name = $('#country').val();

        if(country_name != null) {
            let countries = <?php echo json_encode($countries); ?>;

            let name;
            let countryName;
            let template;

            for(let i = 0; i < countries.length; i++) {
                if(countries[i]['country_name'] == country_name) {
                    name = countries[i]['slug'];
                }
            }

            if(name.includes('-')){
                countryName = name.replace("-", " ");
            } else {
                countryName = name;
            }


            $.ajax({
                "type": "POST",
                "url": "https://countriesnow.space/api/v0.1/countries/cities",
                "data": {
                    "country": countryName
                }
            }).done(function (d) {

                for(let i = 0; i < d['data'].length; i++) {
                    template+= `
                        <option value="${d['data'][i]}">${d['data'][i]}</option>
                    `
                }

                $(".cities").html(template);
            });
        }
    });

</script>


@endif

@endsection

