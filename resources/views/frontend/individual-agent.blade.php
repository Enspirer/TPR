@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-agent.css') }}">
@endpush


    <!-- banner -->

    @if($agent_details->cover_photo == null)
        <section id="index-banner">
            <div class="container-fluid banner" style="background-image: url('{{ url('images/no_image_available.png') }}');">
            </div>
        </section>
    @else
        <section id="index-banner">
            <div class="container-fluid banner" style="background-image: url('{{url('files/agent_request/',$agent_details->cover_photo)}}');">
            </div>
        </section>
    @endif

    <!-- profile picture -->

    @if($agent_details->photo == null)

    <section id="profile-picture">
        <div class="container position-relative" style="margin-top: 7rem;">
            <img src="{{ url('images/no_image_available.png') }}" alt="" class="profile-picture">
        </div>
    </section>

    @else

    <section id="profile-picture">
        <div class="container position-relative" style="margin-top: 7rem;">
            <img src="{{ url('files/agent_request',$agent_details->photo) }}" alt="" class="profile-picture">
        </div>
    </section>
    
    @endif
   
    



    <!-- about -->
    <section id="about">
        <div class="container" style="margin-top: 15rem;">
            <h3 class="fw-bolder text-center">{{ $agent_details->company_name }}</h3>

            <p class="mt-4" style="text-align: justify;">{!! $agent_details->description_message !!}</p>

            <!-- <p class="mt-4" style="text-align: justify;">Established in June 1980 by Rimza Zaveer, MENAVID (Pvt) Ltd was set up with the aim of offering superior and unparalleled real estate options via high-class properties to purchase, own, rent out, sell, lease and manage for both residential and commercial purposes. Our commercial projects in clude up-market business premises/buildings for office spaces, embassies and overseas/local companies in the BOI, NGOs, and expatriates on projects funded by international organisations.</p>

            <p style="text-align: justify;">With over 3 decades of experience in the industry and continuous success in fulfilling the ever-changing needs of our clients, MENAVID (Pvt) Ltd has grown from strength-to-strength over the years. Our values are rooted in our foundations, allowing us to provide consistently professional, friendly, and unparalleled services when helping you develop concepts designs, market strategies, building solutions and frameworks as per your individual requirements.</p>

            <p style="text-align: justify;">We offer peace of mind with our extensive knowledge of the city and suburbs, as well as diverse neighborhoods to walk our customers through their options thoroughly. This ensures hassle-free arrangements and the highest quality every step of the way, no matter whether you are after a house, apartment or any other form of building space.</p> -->


            <div class="row">
                <div class="clearfix">
                    <div class="col-7 float-end">
                        <div class="row mt-3">
                            <div class="col-3">
                                <a href="tel:{{ $agent_details->telephone }}" class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_phone_icon.svg') }}" alt="" class="img-fluid me-2"> Call</a>
                            </div>
                            <div class="col-3">
                                <a href="mailto:{{ $agent_details->email }}" class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_email_icon.svg') }}" alt="" class="img-fluid me-2"> Email</a>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_heart_icon.svg') }}" alt="" class="img-fluid me-2"> Save</button>
                            </div>
                            <div class="col-3">
                                <button class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_share_icon.svg') }}" alt="" class="img-fluid me-2"> Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- agent tabs -->
    <section id="agent-tabs">
        <div class="container" style="margin-top: 7rem;">
            <h4 class="fw-bold">All ads from MENAVID Private Limited</h4>


            <ul class="nav mb-3 mt-5" id="pills-tab" role="tablist">
                <li class="nav-item me-3 all" role="presentation" style="border: 2px solid #4A4A4A;">
                  <a class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true" style="color: #4A4A4A;">ALL</a>
                </li>
                <li class="nav-item me-3 sales" role="presentation" style="border: 2px solid #77CEEC;">
                  <a class="nav-link" id="pills-sales-tab" data-bs-toggle="pill" data-bs-target="#pills-sales" type="button" role="tab" aria-controls="pills-sales" aria-selected="false" style="color: #77CEEC;">SALES</a>
                </li>
                <li class="nav-item me-3 rentals" role="presentation" style="border: 2px solid #4195E1;">
                  <a class="nav-link" id="pills-rentals-tab" data-bs-toggle="pill" data-bs-target="#pills-rentals" type="button" role="tab" aria-controls="pills-rentals" aria-selected="false" style="color: #4195E1;">RENTALS</a>
                </li>
                <li class="nav-item me-3 commercial" role="presentation" style="border: 2px solid #83BE43;">
                    <a class="nav-link" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="false" style="color: #83BE43;">COMMERCIAL</a>
                  </li>
                  <li class="nav-item me-3 property-land" role="presentation" style="border: 2px solid #7CCABD;">
                    <a class="nav-link" id="pills-propertyLand-tab" data-bs-toggle="pill" data-bs-target="#pills-propertyLand" type="button" role="tab" aria-controls="pills-propertyLand" aria-selected="false" style="color: #7CCABD;">PROPERTY LAND</a>
                  </li>
            </ul>

            <div class="tab-content mt-5" id="pills-tabContent">
                
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_1.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">COLOMBO CITY CENTRE - Large - Two - Bedroom - Apartment For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_2.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">Shangri-la / Emperor / CCC / ONTHREE20 Apartments For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="menavid.html"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_3.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">7th SENSE THREE Bedroom Apartment For Immediate Rent.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="menavid.html"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_4.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">EMPEROR TWO &THREE Bedroom for rent.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="menavid.html"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab">

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_1.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">COLOMBO CITY CENTRE - Large - Two - Bedroom - Apartment For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #77CEEC; border-radius: 0.7rem;">Sales</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="tab-pane fade" id="pills-rentals" role="tabpanel" aria-labelledby="pills-rentals-tab">

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_1.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">COLOMBO CITY CENTRE - Large - Two - Bedroom - Apartment For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="menavid.html"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_2.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">Shangri-la / Emperor / CCC / ONTHREE20 Apartments For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_3.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">7th SENSE THREE Bedroom Apartment For Immediate Rent.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_4.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">EMPEROR TWO &THREE Bedroom for rent.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Rentals</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_2.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">COLOMBO CITY CENTRE - Large - Two - Bedroom - Apartment For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2 p-2">
                                        <button class="btn text-white w-100" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-propertyLand" role="tabpanel" aria-labelledby="pills-propertyLand-tab">

                    <div class="row border py-4 px-3 mb-4">
                        <div class="col-4">
                            <img src="{{ asset('tpr_templete/images/menavid_rentals_4.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="ps-2">
                                <div class="row">
                                    <h5 class="fw-bolder">COLOMBO CITY CENTRE - Large - Two - Bedroom - Apartment For RENT.</h5>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3 p-2">
                                        <button class="btn text-white w-100" style="background-color: #7DCAC4; border-radius: 0.7rem;">Property Land</button>
                                    </div>
                                    <div class="col-3">
                                        <p class="ns fw-bolder tab-price">Rs.22.41M <small class="fw-normal">upwards</small></p>
                                    </div>
                                </div>
                                            
                                        
                                <p class="mt-4 mb-0" style="text-align: justify;">COLOMBO CITY CENTRE - Large Two-Bedroom Apartment For Immediate RENT.</p>

                                <div class="row mt-3 justify-content-between">
                                    <div class="col-8">
                                        <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <a href="#"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="clearfix">
                    <div class="float-start">
                        <p style="color: #EFCAD8;">Showing page <span style="font-weight: 1000; color: #E88EAF;">1</span> of 7</p>
                    </div>
                    <div class="float-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true"><i class="bi bi-chevron-left" style="color: #E88EAF;"></i></span>
                                </a>
                              </li>
                              <li class="page-item active shadow-sm me-2"><a class="page-link" href="">1</a></li>
                              <li class="page-item shadow-sm me-2"><a class="page-link" href="#">2</a></li>
                              <li class="page-item shadow-sm me-2"><a class="page-link" href="">3</a></li>
                              <li class="page-item shadow-sm me-2">
                                <a class="page-link" href="" aria-label="Next">
                                  <span aria-hidden="true"><i class="bi bi-chevron-right" style="color: #E88EAF;"></i></span>
                                </a>
                              </li>
                            </ul>
                        </nav>
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
                        <img src="{{ asset('tpr_templete/images/appstore.svg') }}" alt="" height="50rem">
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

    <script>
        let color;

        $('#agent-tabs .nav-item').on('mouseenter', function(){
            color = $(this).children('.nav-link').css('color');
            $(this).css('backgroundColor', color);
            $(this).children('.nav-link').css('color' , 'white');
        }).on('mouseleave', function() {
            $(this).css('backgroundColor', '');
            $(this).children('.nav-link').css('color' , color);
        });
    </script>
@endpush