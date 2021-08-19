@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
        </div>
    </section>


    <!--search-->
    <section id="index-search">
        <div class="container-md search">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item text-white rounded-0 fs-5 me-1" role="presentation">
                    <button class="nav-link text-white active" style="background-color : #83BC3E" id="pills-residential-tab" data-bs-toggle="pill" data-bs-target="#pills-residential" type="button" role="tab" aria-controls="pills-residential" aria-selected="true" data-aos="fade-up" data-aos-duration="500"><img src="{{ asset('tpr_templete/images/sale_icon.svg') }}" class="me-3" height="25rem" alt="">Residential</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white" style="background-color : #75CFED" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"><img src="{{ asset('tpr_templete/images/commercial_icon.svg') }}" class="me-3" height="25rem" alt="">Commercial</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-residential" role="tabpanel" aria-labelledby="pills-residential-tab">
                    <form method="post" action="{{route('frontend.search_result_function')}}">
                        <div class="input-group shadow-lg" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                            {{csrf_field()}}
                            <input type="hidden" name="category_type" value="residential">
                            <input type="text" name="search_keyword" class="form-control p-3 rounded-0" aria-label="search">
                               <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                            <button type="submit" class="btn rounded-0 text-white" style="background-color : #EB8EB0"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">
                    <form method="post" action="{{route('frontend.search_result_function')}}">
                        <div class="input-group shadow-lg" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                        {{csrf_field()}}
                            <input type="hidden" name="category_type" value="commercial">
                            <input type="text" name="search_keyword" class="form-control p-3 rounded-0" aria-label="search">
                            <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                            <button type="submit" class="btn rounded-0 text-white" style="background-color : #EB8EB0"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!--recent projects-->
    <section id="index-recent-projects">
        <div class="container text-center p-0">
            <h3 class="fw-bolder" data-aos="fade-up" data-aos-duration="500">Recent Projects</h3>

            <ul class="nav mb-3 justify-content-center" id="projects-tab" role="tablist">
                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
                    <a class="nav-link active tabs" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">All</a>
                </li>

                @foreach($ad_category as $key => $ad_cat)
                    <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                        <a class="nav-link tabs" id="{{ $ad_cat->name }}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{ $ad_cat->name }}" type="button" role="tab" aria-controls="tabs-leisure" aria-selected="false">{{ $ad_cat->name }}</a>
                    </li>
                @endforeach


                <!-- <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <a class="nav-link" id="new-development-tab" data-bs-toggle="tab" data-bs-target="#tab-new-development" type="button" role="tab" aria-controls="tabs-leisure" aria-selected="false">New Development</a>
                </li>
                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="450">
                    <a class="nav-link" id="investment-tab" data-bs-toggle="tab" data-bs-target="#tab-investment" type="button" role="tab" aria-controls="pills-apartments" aria-selected="false">Investment Properties</a>
                </li> -->


            </ul>

            <div class="tab-content mt-5 py-4" id="tabs-tabContent" style="background-color : #ECECEC">

                <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
                    <!-- <div class="row">
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                            <img src="{{url('tpr_templete/images/rp_1.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                            <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                            <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div> -->

                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide row">

                                <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                    <img src="{{url('tpr_templete/images/rp_1.svg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                    <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                                </div>
                                
                                <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                                    <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                                </div>

                            </div>

                            <div class="swiper-slide row">

                                <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                    <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                                </div>

                                <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                    <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                                </div>
                                
                                <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                                    <img src="{{url('tpr_templete/images/rp_1.svg')}}" class="img-fluid" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

                @foreach($ad_category as $key => $ad_cat)
                    <div class="tab-pane fade" id="tab-{{ $ad_cat->name }}" role="tabpanel" aria-labelledby="{{ $ad_cat->name }}-tab">
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide row">

                                    <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                        <img src="{{url('tpr_templete/images/rp_1.svg')}}" class="img-fluid" alt="">
                                    </div>

                                    <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                        <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                                    </div>
                                    
                                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                                        <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                                    </div>

                                </div>

                                <div class="swiper-slide row">

                                    <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                        <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                                    </div>

                                    <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                                        <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!--cards-->
    <section id="index-cards">
        <div class="container mt-5">
            <div class="row">
                <div class="col-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
                    <div class="card p-4 shadow-lg border-0">
                        <img src="{{url('tpr_templete/images/card_1.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center">Map Search</h4>
                            <h5 class="text-info">Draw your map Options</h5>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti sed dolor molestiae aut vero harum voluptatem expedita possimus alias natus, odit recusandae est sit quas ullam minus deserunt assumenda, quaerat id, excepturi ad illum animi? Autem temporibus natus doloribus!</p>
                        </div>
                    </div>
                </div>
                <div class="col-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <div class="card p-4 shadow-lg border-0">
                        <img src="{{url('tpr_templete/images/card_2.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center">Properties Near Me</h4>
                            <h5 class="text-info">SubTopic</h5>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti sed dolor molestiae aut vero harum voluptatem expedita possimus alias natus, odit recusandae est sit quas ullam minus deserunt assumenda, quaerat id, excepturi ad illum animi? Autem temporibus natus doloribus!</p>
                        </div>
                    </div>
                </div>
                <div class="col-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                    <div class="card p-4 shadow-lg border-0">
                        <img src="{{url('tpr_templete/images/card_3.svg')}}" class="card-img-top" alt="..." height="200rem">
                        <div class="card-body mt-4 p-2">
                            <h4 class="card-title text-center">Property Alerts Live</h4>
                            <h5 class="text-info">SubTopic</h5>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque deleniti sed dolor molestiae aut vero harum voluptatem expedita possimus alias natus, odit recusandae est sit quas ullam minus deserunt assumenda, quaerat id, excepturi ad illum animi? Autem temporibus natus doloribus!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--property search-->
    <section id="index-property-search">
        <div class="container pe-0" style="margin-top:5rem">
            <h3 class="fw-bolder text-center" data-aos="fade-up" data-aos-duration="500">Interactive Property Search</h3>

            <div class="row mt-4">
                <div class="col-3">
                    <h5 data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">Results: {{ count($promo) }} Listings</h5>
                    <div class="row align-items-center" data-aos="fade-right" data-aos-duration="500" data-aos-delay="400">
                        <div class="col-5">
                            <p class="mb-0 text">Sort By</p>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Newest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                    <li><a class="dropdown-item" href="#">Oldest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="properties">
                        @foreach($promo as $property)
                            <div class="row border align-items-center p-1">
                                <div class="col-6">
                                    <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{url('image_assest', $property->feature_image_id)}}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <p class="mb-0 small-num" style="font-size: 0.7rem;">{{ $property->created_at->toDateString() }}</p>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-0">{{ $property->name }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${{ $property->transaction_type }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Country: {{ $property->country }}</p>
                                    <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(get_country_cookie(request())->country_id, $property->price) }}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-9">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--featured projects-->
    <section id="index-featured-projects">
        <div class="container " style="margin-top:7rem">
            <h3 class="text-center fw-bolder" data-aos="fade-up" data-aos-duration="500">Featured Properties</h3>

            <div class="mt-5">
                <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Fresh in the Market</h4>

                <div class="row mt-4">

                    @if(count($latest) != 0)
                        @foreach($latest as $lat)
                            <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                <div class="card p-4 shadow border-0">
                                    <a href="{{ route('frontend.individual-property', $lat->id) }}"><img src="{{url('image_assest',$lat->feature_image_id)}}" class="card-img-top w-100" alt="..." style="object-fit:cover; height:210px;"></a>
                                    <div class="card-body mt-4">
                                        <h5 class="card-title">Jaffna, {{ $lat->country }}</h5>
                                        <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                        <p class="card-text">Lancaster, {{ $lat->country }}</p>
                                        <p class="mt-1 text-info">{{ current_price(get_country_cookie(request())->country_id, $property->price) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                    @endif
                
                </div>
            </div>


            <div style="margin-top: 6rem">
                <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Rental properties - recently Sold</h4>

                <div class="row mt-4">
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_rs_1.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_rs_2.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Colombo, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="600">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_rs_2.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Galle, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div style="margin-top: 6rem">
                <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Investment Opporunities</h4>

                <div class="row mt-4">
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_io_1.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_io_2.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Colombo, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="600">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_io_3.svg')}}" class="card-img-top" alt="..." style="object-fit:cover">
                            <div class="card-body mt-4">
                                <h5 class="card-title">Galle, Sri Lanka</h5>
                                <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                <p class="card-text">Lancaster, claited Kingdom</p>
                                <p class="mt-1 text-info">$ 480,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!--bottom banner-->
    <section id="index-bottom-banner">
        <div class="container-fluid bottom-banner" style="margin-top:5rem">
            <div class="container">
                <div class="row" style="padding: 18rem 0;">
                    <div class="col-6">
                        <h2 data-aos="fade-up" data-aos-duration="500">"I'm so pleased I chose <br> <span style="color: #79CEEC;">Tropical Property!</span> <br> My property was a great valuation <br> and sold quickly, the perfect outcome"</h2>
                        <div class="stars mt-5">
                            <i class="bi bi-star-fill me-3 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="200"></i>
                            <i class="bi bi-star-fill me-3 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="300"></i>
                            <i class="bi bi-star-fill me-3 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="400"></i>
                            <i class="bi bi-star-fill me-3 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="500"></i>
                            <i class="bi bi-star-fill me-3 bottom-banner-stars" data-aos="zoom-out" data-aos-duration="500" data-aos-delay="600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <section id="index-get-app">
        <div class="container-fluid p-0 get-app">
            <div class="container">
                <div class="row py-5 align-items-center justify-content-center">
                    <div class="col-6 text-center">
                        <h2 class="text-white fw-bolder" data-aos="fade-right" data-aos-duration="500">Get The App Now!</h2>
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{url('tpr_templete/images/appstore.svg')}}" alt="" height="50rem" class="me-3" data-aos="fade-left" data-aos-duration="500">
                        <img src="{{url('tpr_templete/images/playstore.svg')}}" alt="" height="50rem" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('before-scripts')
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 3,
                center: { lat: -28.024, lng: 140.887 },
            });

            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            const markers = locations.map((location, i) => {
                    return new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });

        });

            // let property = <?php echo json_encode($promo); ?>;

            

            // var infowindow = new google.maps.InfoWindow();

            // for(let i = 0; i < markers.length; i++) {
            //     for(let j = 0; j < property.length; j++) {
            //         let lat = markers[i].getPosition().lat();    
            //         let lng = markers[i].getPosition().lng();   

                    
            //         if(lat == property[j]['lat'] && lng == property[j]['long']) {
            //             let details = `<div class="row align-items-center p-1" style="width: 500px;">
            //                             <div class="col-6">
            //                                 <img src="{{url('/')}}/image_assest/${property[j]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
            //                             </div>
            //                             <div class="col-6">
            //                                 <h5 class="fw-bold mb-2">${property[j]['name']}</h5>
            //                                 <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${property[j]['transaction_type']}</p>
            //                                 <p class="mb-1" style="font-size: 0.8rem;">Country: ${property[j]['country']}</p>
            //                                 <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${property[j]['price']}</p>

            //                                 <div class="text-end">
            //                                     <a href="{{url('/')}}/individual-property/${property[j]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
            //                                 </div>
            //                             </div>
            //                         </div>`;

            //             markers[i].addListener('click', function() {
            //                 infowindow.setContent(details);           
            //                 infowindow.open(map, markers[i]);
            //             });
            //         }
                
            //     };
            // };



            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

            google.maps.event.addListener(markerCluster, 'click', function(c) {

                var markers = c.getMarkers();
                var newArray = [];

                let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;

                for (marker in markers) {
                    const cars = [];
                    cars['lat']= markers[marker].getPosition().lat();
                    cars['long']= markers[marker].getPosition().lng();
                    newArray.push(JSON.stringify(Object.assign({}, cars)));
                }

                myArray = JSON.stringify(Object.assign({}, newArray));

                $.post("{{url('/')}}/api/country_request",
                    {
                        coordinate_data: myArray,
                        country_id : country_id
                    },
                    function(data, status){

                        var obj = JSON.parse(data);

                        let template = '';
                        let info = [];

                        for(let i = 0; i < obj.length; i++) {

                            info[i] = [obj[i]['country'], obj[i]['long'], obj[i]['lat']];;
                        }


                        var infowindow = new google.maps.InfoWindow();


                        for(let i = 0; i < obj.length; i++) {
                            let details;
                            markers[i].addListener('click', function() {
                                if(info[i][1] == markers[i].getPosition().lng() && info[i][2] == markers[i].getPosition().lat()) {
                                    details = `  <div class="row align-items-center p-1" style="width: 500px;">
                                                    <div class="col-6">
                                                        <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>

                                                        <div class="text-end mt-2">
                                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    
                                    infowindow.setContent(details);           
                                    infowindow.open(map, markers[i]);
                                }
                            });
                        }
                        

                        
                        for(let i = 0; i < obj.length; i++) {

                            let date = obj[i]['created_at'].split(' ')[0];

                            template += `
                                <div class="row border align-items-center p-1">
                                    <div class="col-6">
                                        <a href="{{url('/')}}/individual-property/${obj[i]['id']}"><img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                    </div>
                                    <div class="col-6">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-9">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">${date}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">${obj[i]['price_currency']}</p>
                                    </div>
                                </div>
                            `
                        };


                        $(".properties").html(template);
                        heart_toggle();

                });
            });


        }

        const locations = [
            @foreach($promo as $prom)
                { lat: {{$prom->lat}}, lng: {{$prom->long}} },
            @endforeach
        ];

        function heart_toggle() {
            $('.small-heart').on('click', function(){
                $(".small-heart bi-heart").hide();
                $(".small-heart bi-heart-fill").show();
                
                $("i", this).toggle();
            });
        }
    
    </script>
    @endpush


@endsection



@push('after-scripts')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap" type="text/javascript"></script>


<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    observer: true,
	observeParents: true
  });
</script>

@endpush
