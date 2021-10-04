@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/login.css') }}">
@endpush

    <!-- <div class="container-fluid p-0 second-nav bg-light">
        <nav class="container navbar navbar-expand-lg bg-light navbar-light">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav2">
                <ul class="navbar-nav">
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                        <a class="nav-link text-body fw-bold" href="residential.html">Residential</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">
                        <a class="nav-link text-body fw-bold" href="#">Commercial</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="600">
                        <a class="nav-link text-body fw-bold" href="#">New Homes</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="700">
                        <a class="nav-link text-body fw-bold" href="#">Text</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item contact" data-aos="fade-left" data-aos-duration="500" data-aos-delay="800" style="padding-left : 3rem">
                        <a class="nav-link text-body fw-bold" href="contact-us.html">Contact Us</a>
                        <div class="line"></div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    </section> -->

    <!-- sign in form -->
    <section id="sign-in">
        <div class="container-fluid">
            <div class="container" style="margin-top: 10rem; margin-bottom: 3rem">

            @include('includes.partials.messages')

                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="fw-bold d-inline-block px-4 py-3 mb-0" style="background: rgba(65, 149, 225, .3); color: #77CEEC">Sign In</h5>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="text-center px-4 py-5" style="background: rgba(65, 149, 225, .3);">
                            <form method="post" action="{{route('frontend.auth.login.post')}}" class="needs-validation" novalidate>
                                {{csrf_field()}}
                                <div class="input-group has-validation mb-5">
                                    <input type="email" name="email" class="form-control form-control-lg sign-in-box shadow-sm p-3" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-envelope fs-5"></i></span>
                                    <div class="invalid-feedback">
                                        This is a mandatory field and enter email address correctly to continue.
                                    </div>
                                </div>

                                <div class="input-group has-validation mb-3">
                                    <input type="password" name="password" class="form-control form-control-lg sign-in-box shadow-sm p-3" id="exampleInputPassword1" placeholder="Password" required>
                                    <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-lock fs-5"></i></span>
                                    <div class="invalid-feedback">
                                        This is a mandatory field and must be entered to continue.
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1" style="font-size: 0.9rem; color: #747272;">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="float-end">
                                            <a href="#" class="text-decoration-none" style="font-size: 0.9rem; color: #0A5C78">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-3 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Sign In</button>
                            </form>


                            <p class="mt-3 text-start" style="color: #747272;">Don't have an account? <a href="{{route('frontend.auth.register')}}" class="text-decoration-none" style="color: #0A5C78;">Sign Up</a></p>


                            <!-- <div class="follow" style="margin-top: 6rem;">
                                <h6 class="fw-bolder mb-5">With Social Media</h6>
                                <div class="row mt-5">
                                    <div class="col-2 me-3">
                                        <a href="#" class="fs-3" style="color: #79CEEB; border: 2px solid #79CEEB; padding: 24px 28px;"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                    <div class="col-2 me-3">
                                        <a href="#" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="bi bi-twitter"></i></a>
                                    </div>
                                    <div class="col-2 me-3">
                                        <a href="#" class="p-4 fs-3" style="color: #7DC8B1; border: 2px solid #7DC8B1"><i class="bi bi-google"></i></a>
                                    </div>
                                    <div class="col-2 me-3">
                                        <a href="#" class="p-4 fs-3" style="color: #7FC481; border: 2px solid #7FC481;"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="fs-3" style="color: #83BE4A; border: 2px solid #83BE4A; padding: 24px 27px;"><i class="fab fa-apple"></i></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <!-- <section id="get-app">
        <div class="container-fluid p-0 get-app" style="margin-top: 4rem;">
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
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
