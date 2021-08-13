@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/signup.css') }}">

@endpush


    <section id="sign-up">
        <div class="container-fluid banner">
            <div class="container" style="padding-top: 10rem;">

                 @include('includes.partials.messages')

                <h2 class="fw-bolder text-center">Sign Up</h2>
                <div class="row justify-content-center mt-5">
                    <div class="col-6">                       
                        
                        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                            
                            <div class="input-group has-validation mb-5">
                              <input type="text" name="first_name" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputFirstName" placeholder="First Name" aria-describedby="firstName" required>
                              <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-person fs-5"></i></span>
                              <div class="invalid-feedback">
                                This is a mandatory field and must be entered to continue.
                              </div>
                            </div>

                            <div class="input-group has-validation mb-5">
                                <input type="text" name="last_name" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputLastName" placeholder="Last Name" aria-describedby="emailHelp" required>
                                <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-person-check fs-5"></i></span>
                                <div class="invalid-feedback">
                                  This is a mandatory field and must be entered to continue.
                                </div>
                              </div>

                              <div class="input-group has-validation mb-5">
                                <input type="email" name="email" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputEmail" placeholder="Email" aria-describedby="emailHelp" required>
                                <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-envelope fs-5"></i></span>
                                <div class="invalid-feedback">
                                  This is a mandatory field and enter email address correctly to continue.
                                </div>
                              </div>
                              
                              <div class="input-group has-validation mb-5">
                                <input type="password" name="password" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputPassword" placeholder="Password" aria-describedby="password" required>
                                <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-lock fs-5"></i></span>
                                <div class="invalid-feedback">
                                  This is a mandatory field and must be entered to continue.
                                </div>
                              </div>

                            <div class="input-group has-validation mb-5">
                              <input type="password" name="password_confirmation" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputConfirmPassword" placeholder="Confirm Password" required>
                              <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-lock fs-5"></i></span>
                              <div class="invalid-feedback">
                                This is a mandatory field and must be entered to continue.
                              </div>
                            </div>

                            <div class="row shadow-sm p-0 terms">
                                <h6 class="fw-bolder">
                                    Terms of User Agreement
                                </h6>
                                <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                </p>

                                <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                </p>

                                <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                </p>
                            </div>

                            <div class="row">
                                <div class="clearfix">
                                    <div class="float-end">
                                        <div class="mb-3 form-check mt-3">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                            <label class="form-check-label" for="exampleCheck1" style="font-size: 0.9rem;">I agree to the Terms of Use/Privacy Policy</label>
                                            <!-- <label style="font-size: 0.9rem;">I agree to the Terms of Use/Privacy Policy</label>
                                            <div class="invalid-feedback">
                                                Acceptance of terms and conditions is required.
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <br>                   
    
                            <button type="submit" class="btn btn-primary w-100 mt-4 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Sign Up</button>
                        </form>


                        <p class="text-end mt-3">Already have an account? <a href="{{route('frontend.auth.login')}}" class="text-decoration-none" style="color: #77CEEC;">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--get app-->
    <section id="get-app">
        <div class="container-fluid p-0 get-app" style="margin-top: 44rem;">
            <div class="container">
                <div class="row py-5 align-items-center justify-content-center">
                    <div class="col-6 text-center">
                        <h2 class="text-white fw-bolder">Get The App Now!</h2>
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('tpr_templete/images/appstore.svg') }}" alt="" height="50rem" class="me-3">
                        <img src="{{ asset('tpr_templete/images/playstore.svg') }}" alt="" height="50rem">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush

