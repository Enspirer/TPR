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
                    <h1 style="margin-top:60px;" class="display-6">Feedback Submitted Succesfully!</h1><br>
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
                        <h4 class="fs-4 fw-bolder user-settings-head">Feedback Form</h4>

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
                            <h5>Add Your Feedback</h5>
                            <br>
                            <!-- class="needs-validation" novalidate -->
                        
                            <form action="{{route('frontend.user.feedback.store')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="row mb-3">                                    
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user_details->first_name.' '.$user_details->last_name }}" required>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label class="form-label mb-0 required">Country</label>
                                            <select class="form-control" name="country" required>
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">  
                                    <div class="col-12">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Title</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label mb-0 mt-4 required">Message</label>
                                        <textarea class="form-control" rows="6" name="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
  

                                <div class="mt-5 text-center">
                                <!-- @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                                    <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                @else
                                    <input type="submit" value="Already added an Agent Request" class="btn rounded-pill text-light px-4 py-2 disabled" style="background-color: #85B556;">
                                @endif -->

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


    $('.agent_type').change(function() {
        if ($(this).val() == 'individual') {
            $('.company_name').addClass('d-none');
            $('.company_reg_no').addClass('d-none');
        }
        else {
            $('.company_name').removeClass('d-none');
            $('.company_reg_no').removeClass('d-none');
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

