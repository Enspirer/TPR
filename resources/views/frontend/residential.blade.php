@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/residential.css') }}">
@endpush


    <!--residential property search-->
    <section id="residential-property-search">
        <div class="container pe-0" style="margin-top:5rem">
            <h3 class="fw-bolder text-center">Interactive Property Search</h3>

            <div class="row mt-4">
                @if(count($filteredProperty) > 0)
                    <div class="col-3">
                        <h5>Results: {{ count($filteredProperty) }} Listings</h5>
                        <div class="row align-items-center">
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
                            @foreach($filteredProperty as $property)
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

                                        @if(get_country_cookie(request()))
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(get_country_cookie(request())->country_id, $property->price) }}</p>
                                        @else
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(1, $property->price) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-3">
                        <div class="">
                            <div class="no-result border py-2 px-3">
                                <h4 class="text-center">No Results</h4>
                                <p class="ns mb-1">Please refine your search criteria.</p>
                                <p class="ns">Suggestions:</p>

                                <ul>
                                    <li class="no-result-list">Modify your search criteria</li>
                                    <li class="no-result-list">Update your search location</li>
                                    <li class="no-result-list">Broaden your map area</li>
                                    <li class="no-result-list">Modify your keywords</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-9">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--residential search-->
    <!--search-->
    <section id="index-search" class="container-fluid" style="margin-top: 7rem;">
        <div class="container-md ">
            <ul class="nav nav-pills ms-4" id="pills-tab" role="tablist">
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0 active px-5" style="background-color : #83BC3E" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true" data-aos="fade-up" data-aos-duration="500">All</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0" style="background-color : #00C1FB" id="pills-residential-tab" data-bs-toggle="pill" data-bs-target="#pills-residential" type="button" role="tab" aria-controls="pills-residential" aria-selected="true" data-aos="fade-up" data-aos-duration="500">Residential</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0" style="background-color : #83BC3E" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Commercial</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0" style="background-color : #EB8EB0" id="pills-coming-tab" data-bs-toggle="pill" data-bs-target="#pills-coming" type="button" role="tab" aria-controls="pills-coming" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Coming Soon</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0" style="background-color : #0EA7CE" id="pills-tp-tab" data-bs-toggle="pill" data-bs-target="#pills-tp" type="button" role="tab" aria-controls="pills-tp" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">TP Developer</button>
                </li>
                <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
                    <button class="nav-link text-white rounded-0" style="background-color : #4195E1" id="pills-investments-tab" data-bs-toggle="pill" data-bs-target="#pills-investments" type="button" role="tab" aria-controls="pills-investments" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Investments</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <form method="post" action="{{route('frontend.search_result_function')}}">
                        <div class="input-group">
                            {{csrf_field()}}
                            <input type="hidden" name="category_type" value="all">
                            <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                               <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                            <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                            <button type="button" class="btn rounded-pill ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem; border: 1px solid #ced4da;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="pills-residential" role="tabpanel" aria-labelledby="pills-residential-tab">
                    <form method="post" action="{{route('frontend.search_result_function')}}">
                        <div class="input-group">
                            {{csrf_field()}}
                            <input type="hidden" name="category_type" value="residential" class="category">
                            <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                               <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                            <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                            <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">
                    <form method="post" action="{{route('frontend.search_result_function')}}">
                        <div class="input-group">
                        {{csrf_field()}}
                            <input type="hidden" name="category_type" value="commercial" class="category">
                            <input type="text" name="search_keyword" class="form-control p-3" aria-label="search">
                            <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                            <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                            <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!--residential properties-->

    @if(count($filteredProperty) > 0)
        <section id="residential-properties">
            <div class="container" style="margin-top: 6rem">
                <h3 class="text-center fw-bolder">{{ ucfirst($category_type) }} Properties in {{ get_country_cookie(request())->country_name }}</h3>


                <div class="row mt-5">
                    <div class="col-8">
                        
                            @foreach($filteredProperty as $property)
                                <div class="property mb-5 p-3 custom-shadow">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{ route('frontend.image_assets', $property->feature_image_id) }}" alt="" class="img-fluid w-100" style="object-fit:cover; height:240px;"></a>
                                        </div>
                                        <div class="col-6 ps-4">
                                            <div class="row justify-content-between">
                                                <div class="col-9">
                                                    <h5 class="property-price mb-0">{{ $property->name }}</h5>
                                                    <h5 class="property-location">{{ get_currency(request() ,$property->price)}}</h5>
                                                </div>
                                        
                                                @auth
                                                    @if(is_favorite($property->id, auth()->user()->id))
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="favourite">
                                                                <button class="bi bi-heart-fill border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @else
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="non-favourite">
                                                                <button class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                @else
                                                    <div class="col-3 small-heart">
                                                        <a href="{{ route('frontend.auth.login') }}" class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF"></a>
                                                    </div>
                                                @endauth
                                            </div>
                                            
                                            <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                            <p class="text-secondary mt-1">{{ $property->country }}</p>
                                            <div class="project-list">
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Transaction Type : {{ $property->transaction_type }}</p>
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            </div>

                                            @if($property->baths != null && $property->beds != null)
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> {{ $property->baths }} <i class="fas fa-bed ms-4 me-2"></i>{{ $property->beds }}</p>
                                            @else
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i>Not available<i class="fas fa-bed ms-4 me-2"></i>Not available</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <h6 class="text-secondary mb-0">Listed on {{ $property->created_at->toDateString() }}</h6>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="mb-0"><i class="bi bi-telephone me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                                <div class="col-6" >
                                                    <p class="mb-0" id="ppp" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><i class="bi bi-envelope me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>

                    <div class="col-4">
                        @if(count($side_ads) > 0)
                            @foreach($side_ads as $side_ad)
                                <div class="row custom-shadow mt-5">
                                    <div class="col-12">
                                        <a href="{{ $side_ad->link }}"><img src="{{url('files/sidebar_ad', $side_ad->image)}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="col-12 mt-3" style="text-align: justify;">
                                        <p class="ns" style="height:140px; overflow:hidden !important; text-overflow: ellipsis;">{{ $side_ad->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

    @else
        <section id="residential-properties">
            <div class="container text-center" style="margin-top: 10rem">
                <p class="display-3 text-secondary">RESULTS NOT FOUND!</p>
            </div>
        </section>
    @endif


        <!-- Filter Modal -->
        <form method="post" action="{{route('frontend.search_result_function')}}" id="filter-form">
            {{csrf_field()}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Search Filters</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <input type="text" name="search_keyword" class="form-control p-3 rounded-0" aria-label="search" placeholder="Search Property">
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <div>
                                            <label for="propertyType" class="form-label mb-0 required">Property Type</label>
                                            <select class="form-select" aria-label="propertyType" name="propertyType" id="propertyType" onChange="renderFields()">

                                                <option value="" selected> Select </option>
                                            @foreach($property_types as $type)
                                                <option value="{{$type->id}}"> {{$type->property_type_name}} </option>
                                            @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    
                                    <div class="col-3">
                                        <div>
                                            <label for="transaction_type" class="form-label mb-0 required">Transaction Type</label>
                                            <select class="form-select" aria-label="transaction_type" name="transaction_type" id="transaction_type">
                                                <option value="">Select</option>
                                                <option value="sale">For sale</option>
                                                <option value="rent">For rent</option>
                                            </select>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-3">
                                        <div>
                                            <label for="min_price" class="form-label mb-0 required">Min Price</label>
                                            <select class="form-select" aria-label="min_price" name="min_price" id="min_price">
                                                <option value="0">0</option>
                                                <option value="25000">25,000</option>
                                                <option value="50000">50,000</option>
                                                <option value="75000">75,000</option>
                                                <option value="100000">100,000</option>
                                                <option value="125000">125,000</option>
                                                <option value="150000">150,000</option>
                                                <option value="175000">175,000</option>
                                                <option value="200000">200,000</option>
                                                <option value="225000">225,000</option>
                                                <option value="250000">250,000</option>
                                                <option value="275000">275,000</option>
                                                <option value="300000">300,000</option>
                                                <option value="325000">325,000</option>
                                                <option value="350000">350,000</option>
                                                <option value="375000">375,000</option>
                                                <option value="400000">400,000</option>
                                                <option value="425000">425,000</option>
                                                <option value="450000">450,000</option>
                                                <option value="475000">475,000</option>
                                                <option value="500000">500,000</option>
                                                <option value="550000">550,000</option>
                                                <option value="600000">600,000</option>
                                                <option value="650000">650,000</option>
                                                <option value="700000">700,000</option>
                                                <option value="750000">750,000</option>
                                                <option value="800000">800,000</option>
                                                <option value="850000">850,000</option>
                                                <option value="900000">900,000</option>
                                                <option value="950000">950,000</option>
                                                <option value="1000000">1,000,000</option>
                                                <option value="1100000">1,100,000</option>
                                                <option value="1200000">1,200,000</option>
                                                <option value="1300000">1,300,000</option>
                                                <option value="1400000">1,400,000</option>
                                                <option value="1500000">1,500,000</option>
                                                <option value="1600000">1,600,000</option>
                                                <option value="1700000">1,700,000</option>
                                                <option value="1800000">1,800,000</option>
                                                <option value="1900000">1,900,000</option>
                                                <option value="2000000">2,000,000</option>
                                                <option value="2500000">2,500,000</option>
                                                <option value="3000000">3,000,000</option>
                                                <option value="3500000">3,500,000</option>
                                                <option value="4000000">4,000,000</option>
                                                <option value="4500000">4,500,000</option>
                                                <option value="5000000">5,000,000</option>
                                                <option value="5500000">5,500,000</option>
                                                <option value="6000000">6,000,000</option>
                                                <option value="6500000">6,500,000</option>
                                                <option value="7000000">7,000,000</option>
                                                <option value="7500000">7,500,000</option>
                                                <option value="10000000">10,000,000</option>
                                                <option value="15000000">15,000,000</option>
                                                <option value="20000000">20,000,000</option>
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="col-3">
                                        <div>
                                            <label for="max_price" class="form-label mb-0 required">Max Price</label>
                                            <select class="form-select" aria-label="max_price" name="max_price" id="max_price">
                                                <option value="0">Unlimited</option>
                                                <option value="25000">25,000</option>
                                                <option value="50000">50,000</option>
                                                <option value="75000">75,000</option>
                                                <option value="100000">100,000</option>
                                                <option value="125000">125,000</option>
                                                <option value="150000">150,000</option>
                                                <option value="175000">175,000</option>
                                                <option value="200000">200,000</option>
                                                <option value="225000">225,000</option>
                                                <option value="250000">250,000</option>
                                                <option value="275000">275,000</option>
                                                <option value="300000">300,000</option>
                                                <option value="325000">325,000</option>
                                                <option value="350000">350,000</option>
                                                <option value="375000">375,000</option>
                                                <option value="400000">400,000</option>
                                                <option value="425000">425,000</option>
                                                <option value="450000">450,000</option>
                                                <option value="475000">475,000</option>
                                                <option value="500000">500,000</option>
                                                <option value="550000">550,000</option>
                                                <option value="600000">600,000</option>
                                                <option value="650000">650,000</option>
                                                <option value="700000">700,000</option>
                                                <option value="750000">750,000</option>
                                                <option value="800000">800,000</option>
                                                <option value="850000">850,000</option>
                                                <option value="900000">900,000</option>
                                                <option value="950000">950,000</option>
                                                <option value="1000000">1,000,000</option>
                                                <option value="1100000">1,100,000</option>
                                                <option value="1200000">1,200,000</option>
                                                <option value="1300000">1,300,000</option>
                                                <option value="1400000">1,400,000</option>
                                                <option value="1500000">1,500,000</option>
                                                <option value="1600000">1,600,000</option>
                                                <option value="1700000">1,700,000</option>
                                                <option value="1800000">1,800,000</option>
                                                <option value="1900000">1,900,000</option>
                                                <option value="2000000">2,000,000</option>
                                                <option value="2500000">2,500,000</option>
                                                <option value="3000000">3,000,000</option>
                                                <option value="3500000">3,500,000</option>
                                                <option value="4000000">4,000,000</option>
                                                <option value="4500000">4,500,000</option>
                                                <option value="5000000">5,000,000</option>
                                                <option value="5500000">5,500,000</option>
                                                <option value="6000000">6,000,000</option>
                                                <option value="6500000">6,500,000</option>
                                                <option value="7000000">7,000,000</option>
                                                <option value="7500000">7,500,000</option>
                                                <option value="10000000">10,000,000</option>
                                                <option value="15000000">15,000,000</option>
                                                <option value="20000000">20,000,000</option>
                                            </select>
                                        </div> 
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-3">
                                        <div>
                                            <label for="category_type" class="form-label mb-0 required">Category</label>
                                            <select class="form-select" aria-label="category_type" name="category_type" id="category_type">
                                                <option value="">Select</option>
                                                <option value="residential">Residential</option>
                                                <option value="commercial">Commercial</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div>
                                            <label for="listed_since" class="form-label mb-0 required">Listed Since</label>
                                            <input type="date" name="listed_since" class="form-control" aria-label="listed_since">
                                        </div> 
                                    </div>

                                    <div class="col-3 first-incoming-field">
                                    
                                    </div>

                                    <div class="col-3 second-incoming-field">
                                    
                                    </div>
                                </div>


                                <div class="row" id="incoming_fields">

                                </div>

                            </div>
                            
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn rounded-pill me-2 p-0 ps-3 filter-reset" style="border: 1px solid #CCCCCC; color: #23A1C0">Reset <i class="fas fa-undo ms-3"></i></button>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Search</button>
                            </div>
                    
                        </div>
                    </div>
                </div>
        </form>


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


    @push('before-scripts')
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 3,
                center: { lat: -28.024, lng: 140.887 },
            });
            // Create an array of alphabetical characters used to label the markers.
            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            // Add some markers to the map.
            // Note: The code uses the JavaScript Array.prototype.map() method to
            // create an array of markers based on a given "locations" array.
            // The map() method here has nothing to do with the Google Maps API.
            const markers = locations.map((location, i) => {
                    return new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });
        });


            // let property = <?php echo json_encode($filteredProperty); ?>;

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

            // Add a marker clusterer to manage the markers.
            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });


            google.maps.event.addListener(markerCluster, 'click', function(c) {
                // console.log('Number of managed markers in cluster: ' + c.getSize());
                var markers = c.getMarkers();

                

                // console.log('Number of managed markers in cluster: ' + c.getSize());
                var newArray = [];

                @if(get_country_cookie(request()))
                    let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                @else
                    let country_id = 1;
                @endif

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

                            info[i] = [obj[i]['country'], obj[i]['long'], obj[i]['lat']];
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
                            // info[i] = [obj[i]['long'], obj[i]['lat']];

                            

                        };

                        // console.log(obj);

                        $(".properties").html(template);

                        // var infoWindow = new google.maps.InfoWindow({
                        //     content:'<h1>dfdf</h1>'
                        // });

                        // for (marker in markers) {
                        //     const cars = [];
                        //     cars['lat']= markers[marker].getPosition().lat();
                        //     cars['long']= markers[marker].getPosition().lng();
                        // }

                });
            });


        }
        const locations = [
            @foreach($filteredProperty as $property)
                { lat: {{$property->lat}}, lng: {{$property->long}} },
            @endforeach
        ];
    </script>
    @endpush

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif


<!-- <script src="{{ asset('tpr_templete/scripts/map.js') }}"></script> -->

<script>
    // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();

            if(value == '') {
                

            } 
            else {
                let url = '{{url('/')}}/api/get_property_type_details/' + value;

                const res = await fetch(url);
                const data = await res.json();
                const fields = (data[0]['activated_fields']);
                let template = '';
                let first = '';
                let second = '';

                for(let i = 0; i < fields.length; i++) {
                    if(i == 0) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                first = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                            first = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    } 

                    else if(i == 1) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                second = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        second = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }
                    else {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                template += `<div class="col-3">
                                            <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                            <select class="form-select" name="${name}" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        template += `<div class="col-3">
                                                        <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                        else {
                            template += `<div class="col-3">
                                <div>
                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>
                            </div>`
                        }
                    }
                }
                $('.first-incoming-field').html(first);
                $('.second-incoming-field').html(second);
                $('#incoming_fields').html(template);
            }
        }

        // window.addEventListener('DOMContentLoaded', () => renderFields());

    $('.filter-button').on('click', function(){
            renderFields();
    })

    $('.filter-reset').click(function(){
        $('#filter-form')[0].reset();
    });
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

<script>
    $('.small-heart').on('click', function(){

        let status = $(this).find('.favourite').val();

        if(status == 'non-favourite') {
            $(this).find('button').removeClass('bi-heart');
            $(this).find('button').addClass('bi-heart-fill');
            $(this).find('.favourite').val('favourite');
        }
        else {
            $(this).find('button').removeClass('bi-heart-fill');
            $(this).find('button').addClass('bi-heart');
            $(this).find('.favourite').val('non-favourite');
        }
    });
</script>

@endpush