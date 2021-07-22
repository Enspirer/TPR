@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    <!-- navbar -->


    <!-- banner -->
    <section id="index-banner">
        <div class="container-fluid banner">
        </div>
    </section>


    <!--search-->
    <section id="index-search">
        <div class="container-md search">
            <button class="btn text-white rounded-0 py-3 px-5 fs-5 me-1" style="background-color : #83BC3E" data-aos="fade-up" data-aos-duration="500"><img src="images/sale_icon.svg" class="me-3" height="25rem" alt="">Residential</button>
            <button class="btn text-white rounded-0 py-3 px-5 fs-5" style="background-color : #75CFED" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"><img src="images/commercial_icon.svg" class="me-3" height="25rem" alt="">Commercial</button>

            <div class="input-group shadow-lg" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                <input type="text" class="form-control p-3 rounded-0" aria-label="search">
                <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button>
                <button class="btn rounded-0 text-white" style="background-color : #EB8EB0"><i class="bi bi-search"></i> Search</button>
            </div>
        </div>
    </section>


    <!--recent projects-->
    <section id="index-recent-projects">
        <div class="container text-center p-0">
            <h3 class="fw-bolder" data-aos="fade-up" data-aos-duration="500">Recent Projects</h3>

            <ul class="nav mb-3 justify-content-center" id="projects-tab" role="tablist">
                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">All</a>
                </li>
                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <a class="nav-link" id="new-development-tab" data-bs-toggle="tab" data-bs-target="#tab-new-development" type="button" role="tab" aria-controls="tabs-leisure" aria-selected="false">New Development</a>
                </li>
                <li class="nav-item project-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="450">
                    <a class="nav-link" id="investment-tab" data-bs-toggle="tab" data-bs-target="#tab-investment" type="button" role="tab" aria-controls="pills-apartments" aria-selected="false">Investment Properties</a>
                </li>
            </ul>

            <div class="tab-content mt-5 py-4 px-5" id="tabs-tabContent" style="background-color : #ECECEC">

                <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row">
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500">
                            <img src="{{url('tpr_templete/images/rp_1.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                            <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="400">
                            <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-new-development" role="tabpanel" aria-labelledby="new-development-tab">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{url('tpr_templete/images/rp_2.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-investment" role="tabpanel" aria-labelledby="investment-tab">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{url('tpr_templete/images/rp_3.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
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
                    <h5 data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">Results: 159,728 Listings</h5>
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
                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_1.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_2.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_3.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_4.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mt-2 mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_1.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_2.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>

                        <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{url('tpr_templete/images/ps_3.svg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>

                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div>
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
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_fm_1.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_fm_2.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_fm_3.svg')}}" class="card-img-top" alt="...">
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
                <h4 data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">Rental properties - recently Sold</h4>

                <div class="row mt-4">
                    <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                        <div class="card p-4 shadow border-0">
                            <img src="{{url('tpr_templete/images/fp_rs_1.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_rs_2.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_rs_2.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_io_1.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_io_2.svg')}}" class="card-img-top" alt="...">
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
                            <img src="{{url('tpr_templete/images/fp_io_3.svg')}}" class="card-img-top" alt="...">
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


@endsection

@push('after-scripts')
<script src="{{ asset('tpr_templete/scripts/map.js') }}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script>
@endpush