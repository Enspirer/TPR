@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/signup.css') }}">

@endpush


    <section id="sign-up">
        <div class="container-fluid">
            <div class="container register-container" style="padding-top: 10rem; margin-bottom: 3rem">

                 @include('includes.partials.messages')

                 <h5 class="fw-bold d-inline-block px-4 py-3 mb-0" style="background: rgba(65, 149, 225, .3); color: #77CEEC">Sign Up</h5>

                <form action="{{ url('register') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                    <div class="row">
                    
                        <div class="col-6 pe-0 full-size-width">                       
                            <div class="text-center px-4 py-5" style="background: rgba(65, 149, 225, .3);">
                            
                                <div class="input-group has-validation mb-4">
                                    <input type="text" name="first_name" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputFirstName" placeholder="First Name" aria-describedby="firstName" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-person fs-5"></i></span>
                                    <div class="invalid-feedback">
                                        This is a mandatory field and must be entered to continue.
                                    </div>
                                </div>

                                <div class="input-group has-validation mb-4">
                                    <input type="text" name="last_name" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputLastName" placeholder="Last Name" aria-describedby="emailHelp" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-person-check fs-5"></i></span>
                                    <div class="invalid-feedback">
                                    This is a mandatory field and must be entered to continue.
                                    </div>
                                </div>

                                <div class="input-group has-validation mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputEmail" placeholder="Email" aria-describedby="emailHelp" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-envelope fs-5"></i></span>
                                    <div class="invalid-feedback">
                                    This is a mandatory field and enter email address correctly to continue.
                                    </div>
                                </div>
                              
                                <div class="input-group has-validation mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputPassword" placeholder="Password" aria-describedby="password" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-lock fs-5"></i></span>
                                    <div class="invalid-feedback">
                                    This is a mandatory field and must be entered to continue.
                                    </div>
                                </div>

                                <div class="input-group has-validation mb-4">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg sign-up-box shadow-sm" id="exampleInputConfirmPassword" placeholder="Confirm Password" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-lock fs-5"></i></span>
                                    <div class="invalid-feedback">
                                        This is a mandatory field and must be entered to continue.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 ps-0 full-size-width terms-area-mobile">
                            <div class="px-4 pt-5 mobile-pt-0" style="background: rgba(65, 149, 225, .3); padding-bottom: 1.05rem;">
                                <div class="row shadow-sm p-0 pt-2 terms">
                                    <p class="fw-bolder mb-2">
                                        Terms of User Agreement
                                    </p>
                                    <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                    </p>

                                    <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                    </p>

                                    <p style="text-align: justify;">By accessing any of the websites or mobile applications (collectively, hereinafter "website" or "websites") operated by The Canadian Real Estate Association (CREA), including , you, the user, agree to be bound by all of the terms for use and agree these terms constitute a binding contract between the user.
                                    </p>
                                </div>

                                <div class="row mt-3 mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1" style="font-size: 0.9rem; color: #747272">I agree to the Terms of Use/Privacy Policy</label>
                                        <!-- <label style="font-size: 0.9rem;">I agree to the Terms of Use/Privacy Policy</label>
                                        <div class="invalid-feedback">
                                            Acceptance of terms and conditions is required.
                                        </div> -->
                                    </div>
                                </div>


                                <!-- <div class="row mb-4">
                                    <div class="g-recaptcha p-0" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                                </div> -->

                                <div class="row">
                                    <button type="submit" class="btn btn-primary w-100 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;" id="submit_btn">Sign Up</button>

                                    <p class="mt-3 p-0">Already have an account? <a href="{{route('frontend.auth.login')}}" class="text-decoration-none" style="color: #77CEEC;">Sign In</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--get app-->
    <!-- <section id="get-app">
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
    </section> -->

@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script> -->
@endpush

