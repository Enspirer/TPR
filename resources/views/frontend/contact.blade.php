@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/contact-us.css') }}">
@endpush

@if ( session()->has('message') )


    <div class="container" style="background-color: #c6e4ee; padding-top:5px; border-radius: 50px 50px; text-align:center;">

        <h1 style="margin-top:150px;" class="display-4">Thank You!</h1><br>
        <p class="lead"><h4>We appreciate you contacting us. One of our member will get back in touch with you soon!<br><br> Have a great day!</h4></p>
        <hr><br>    
        <p class="lead">
            <a class="btn btn-success btn-md mb-5" href="{{url('contact')}}" role="button">Go to Global Contact Page</a>
        </p>
    </div>
  

@else

    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
        </div>
    </section>


    <!-- contact-us -->
    <section id="contact-us">
        <div class="container" style="margin-top: 6rem; margin-bottom:5rem;">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3 class="fw-bolder">Contact Us</h3>

                    <!-- <p class="mt-5" style="text-align: justify;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae quo saepe odio error fugiat numquam eum, minima tenetur qui voluptates repudiandae doloribus porro eos iste tempore rerum! Nisi, molestias consectetur.</p> -->

                    @if(isset(get_country_cookie(request())->country_id))
                        @if(get_country_cookie(request()))
                            <div class="row align-items-center mt-5">
                                <div class="col-1">
                                    <i class="bi bi-geo-alt-fill fs-3"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-0">{{get_country_cookie(request())->address}}.</p>
                                </div>
                            </div>                    
                            <div class="row align-items-center mt-2">
                                <div class="col-1">
                                    <i class="bi bi-clock-fill fs-3"></i>
                                </div>
                                <div class="col-11">
                                    <p class="mb-0">{{get_country_cookie(request())->opening_hours}}.</p>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-1">
                                    <img src="{{ asset('tpr_templete/images/contact_phone_icon.svg') }}" alt="">
                                </div>
                                <div class="col-11">
                                    @foreach(json_decode(get_country_cookie(request())->phone_numbers) as $key => $number)
                                        <p class="mb-0">{{$number->number}}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif


                    <div class="contact-map" style="margin-top: 7rem;">
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=16/3%20Elliot%20Pl,%20Colombo%2000800&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies2.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:500px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:500px; border-radius: 25rem;}</style></div></div>
                    </div>
                </div>

    
                   
                    <div class="col-5">
                        @if(isset(get_country_cookie(request())->country_id))
                            @if(get_country_cookie(request()))
                                <form action="{{route('frontend.manager_contact_store.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control py-3 shadow" name="name" placeholder="Name" aria-describedby="name" required>
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control py-3 shadow" name="phone" placeholder="Phone" aria-describedby="phone" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control py-3 shadow" name="email" placeholder="Email" aria-describedby="email" required>
                                    </div>
                                    <div class="mb-4">
                                    <textarea class="form-control py-3 shadow" name="message" name="message" cols="60" rows="5" placeholder="Message" required></textarea>
                                    </div>
                                    <input type="hidden" value="{{get_country_cookie(request())->country_manager}}" class="form-control py-3 shadow" name="country_manager">
                                    <input type="submit" class="btn rounded-0 fw-bold w-100 text-white p-3" style="background-color: #77CEEC;" value="Submit" />
                                </form>
                            @endif
                        @endif

                        <!-- <div class="follow" style="margin-top: 7rem;">
                            <h5 class="fw-bolde mb-5">Follow Us</h5>
                            <div class="row mt-5">
                                <div class="col-2 me-3">
                                    <a href="#" class="p-4 fs-3" style="color: #79CEEB; border: 2px solid #79CEEB;"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="col-2 me-3">
                                    <a href="#" class="p-4 fs-3" style="color: #7BCBD4; border: 2px solid #7BCBD4;"><i class="fab fa-instagram"></i></a>
                                </div>
                                <div class="col-2 me-3">
                                    <a href="#" class="p-4 fs-3" style="color: #7DC9AF; border: 2px solid #7DC9AF;"><i class="fab fa-facebook-messenger"></i></a>
                                </div>
                                <div class="col-2 me-3">
                                    <a href="#" class="p-4 fs-3" style="color: #7FC587; border: 2px solid #7FC587;"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="p-4 fs-3" style="color: #81BF50; border: 2px solid #81BF50;"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                
            </div>
        </div>
    </section>


    <!--get app-->
    <!-- <section id="index-get-app">
        <div class="container-fluid p-0 get-app" style="margin-top: 10rem;">
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
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush



@endif