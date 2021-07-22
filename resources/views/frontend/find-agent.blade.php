@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/find-agent.css') }}">
@endpush


    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
            <div class="container">
                <div class="row justify-content-between" style="padding-top: 14rem;">
                    <div class="col-5" style="color: black;">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore laudantium impedit nobis ea praesentium. Laudantium?</h3>
                    </div>
                    <div class="col-5">
                        <form>
                            <div class="mb-4">
                                <select class="form-select p-3" aria-label="Default select example">
                                    <option selected>Area</option>
                                    <option value="1">Colombo</option>
                                    <option value="2">Jaffna</option>
                                    <option value="3">Kandy</option>
                                  </select>
                            </div>
                            <div class="mb-4">
                                <select class="form-select p-3" aria-label="Default select example">
                                    <option selected>Agent Type</option>
                                    <option value="1">lorem</option>
                                    <option value="2">lorem</option>
                                    <option value="3">lorem</option>
                                  </select>
                            </div>
                            <div class="mb-4">
                            <input class="form-control p-3" name="name" id="name" placeholder="Agent Name"></input>
                            </div>
                            <button type="submit" class="btn rounded-0 fw-bold fs-5 p-2" style="background-color: #77CEEC; width:100%; color:white;">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--directory-->
    <section id="directory">
        <div class="container" style="margin-top: 6rem;">
            <h3 class="fw-bolder">Directory of Real Estate Agents / Brokers / Realtors in Sri Lanka</h3>

            <div class="row shadow py-5 px-4" style="margin-top: 5rem;">
                <div class="col-4">
                    <img src="{{ asset('tpr_templete/images/directory_menavid.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-8">
                    <div>
                        <div class="row">
                            <div class="clearfix">
                                <div class="float-start">
                                    <h5 class="fw-bolder">MENAVID Private Limited</h5>
                                </div>
                                <div class="float-end">
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                </div>
                            </div>
                        </div>
                        <h6>Area(s) covered: Island Wide.</h6>
                        <div class="row mt-3">
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #77CEEC; border-radius: 0.7rem;">Sales</button>
                            </div>
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                            </div>
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                            </div>
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #7DCAC4; border-radius: 0.7rem;">PropertyLand</button>
                            </div>
                        </div>
                        <p class="mt-3" style="text-align: justify;">Established in June 1980 by Rimza Zaveer, MENAVID (Pvt) Ltd was set up with the aim of offering superior and unparalleled real estate options via high-class properties to purchase, own, rent out, sell, lease and manage for both residential and commercial purposes. Our commercial projects include up-market business premises/ buildings for office spaces, embassies and..</p>

                        <div class="row">
                            <div class="clearfix">
                                <div class="float-end">
                                    <a href="{{ route('frontend.individual-agent') }}"><button class="btn border-1 border-dark rounded-0 px-5 py-2">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-3">
                                <button class="btn w-100 agent-contact"><i class="fas fa-mobile-alt me-2"></i> 071 123 4567</button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 agent-contact"><i class="fas fa-envelope me-2"></i> Email</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row shadow py-5 px-4" style="margin-top: 5rem;">
                <div class="col-4">
                    <img src="{{ asset('tpr_templete/images/directory_myColombo.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-8">
                    <div>
                        <div class="row">
                            <div class="clearfix">
                                <div class="float-start">
                                    <h5 class="fw-bolder">MyColomboProperties - Trusted Choice in Real Estate</h5>
                                </div>
                                <div class="float-end">
                                    <i class="bi bi-star-fill me-3 gray-stars"></i>
                                    <i class="bi bi-star-fill me-3 gray-stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                    <i class="bi bi-star-fill me-3 stars"></i>
                                </div>
                            </div>
                        </div>
                        <h6>Area(s) covered: Residential propeeties in Western Province and com</h6>
                        <div class="row mt-3">
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #77CEEC; border-radius: 0.7rem;">Sales</button>
                            </div>
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                            </div>
                            <div class="col-2 p-1">
                                <button class="btn w-100 text-white" style="background-color: #7DCAC4; border-radius: 0.7rem;">PropertyLand</button>
                            </div>
                        </div>
                        <p class="mt-3" style="text-align: justify;">My Colombo Properties (MCP) is a real estate property portal and one-stop-shop for all your property needs; buying, selling renting latest homes, lands, apartments, commercial and residential properties across Sri Lanka. With MCP, customers will receive the services of experienced, highly professional property personnel, who will embroider all their needs through every single..</p>

                        <div class="row">
                            <div class="clearfix">
                                <div class="float-end">
                                    <button class="btn border-1 border-dark rounded-0 px-5 py-2">MORE <i class="bi bi-chevron-double-right ms-1"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-3">
                                <button class="btn w-100 agent-contact"><i class="fas fa-mobile-alt me-2"></i> 071 123 4567</button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 agent-contact"><i class="fas fa-envelope me-2"></i> Email</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


     <!--get app-->
     <section id="index-get-app">
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
    </section>

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush