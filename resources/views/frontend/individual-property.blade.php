@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}">
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/swiper.css') }}">
@endpush


    <!-- back to search-->
    <section id="path">
        <div class="container" style="margin-top: 10rem;">
            <a href="{{ route('frontend.search_function', ['key_name', 'max_price', 'min_price', 'category_type', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type'] )}}" class="text-decoration-none text-body fw-bolder"><i class="bi bi-chevron-left"></i> Back to search results</a>
        </div>
    </section>


    <!-- content -->
    <section id="content">
        <div class="container mt-4">
            <div class="row justify-content-between">

                <div class="col-8">

                    @if(json_decode($property_details->image_ids) == null)

                        <div align="center">
                            <img src="{{ url('images/no_image_available.png') }}" style="object-fit: cover;" width="100%" height="300" alt="...">
                        </div>

                    @else
                        <div class="carousel">
                            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                @foreach($final_out as $key => $image)
                                    @if($key == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ url('images',$image) }}" class="d-block w-100" alt="...">
                                    </div>
                                    @else  
                                    <div class="carousel-item">
                                        <img src="{{ url('images',$image) }}" class="d-block w-100" alt="...">
                                    </div>
                                    @endif    
                                @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="details mt-5">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="mb-1" style="color: #79CEEC;">$ {{ $property_details->price }}</h5>
                                <h5 style="color: #83BE43">Colombo, {{ $property_details->country }}</h5>

                                @if($property_details->beds == null)
                                @else
                                    <p class="fw-bold mt-5" style="font-size: 1rem;">
                                        {{ $property_details->beds }} bed semi-detached house
                                    </p>
                                @endif

                                <!-- <p class="fw-bold mt-5" style="font-size: 1rem;">
                                    2 bed semi-detached house
                                </p> -->
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn rounded-0 text-light px-4 py-2 mt-2" style="background-color: #EB8EB0;">Floor Plans</button>
                                
                                <p class="text-secondary mt-5">
                                    @if($property_details->baths == null)
                                    @else
                                    <i class="fas fa-bath me-1"></i>{{ $property_details->baths }} bath
                                    @endif

                                    @if($property_details->beds == null)
                                    @else
                                    <i class="fas fa-bed ms-3 me-1"></i>{{ $property_details->beds }} bed
                                    @endif
                                </p>

                                <!-- <p class="text-secondary mt-5"><i class="fas fa-bath me-1"></i>1 bath<i class="fas fa-bed ms-3 me-1"></i>2 bed</p> -->

                            </div>
                        </div>
                    </div>

                    <div class="location">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                        <input type="text" name="lat" id="lat" value="{{$property_details->lat}}" class="mt-3 d-none">
                        <input type="text" name="lng" id="lng" value="{{$property_details->long}}" class="mt-3 d-none">
                    </div>

                    <div class="extra-details mt-2">
                        <div class="row text-secondary">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-8">
                                        <p class="mb-0">Lancaster, claited Kingdom</p>
                                    </div>
                                    <div class="col-4 border-end">
                                        <p class="mb-0">0.4 miles</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-8">
                                        <p class="mb-0 ps-3">Lancaster, claited Kingdom</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p class="mb-0">0.7 miles</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="features">
                        <h4 class="fw-bold" style="margin-top: 6rem;">Features and description</h4>
                        <div class="row mt-4 collapse" id="collapseExample" aria-expanded="false">
                            <div class="col-6">
                                <ul>

                                @if($property_details->baths == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Baths : {{ $property_details->baths }}</li>
                                @endif 
                                @if($property_details->beds == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Beds : {{ $property_details->beds }}</li>
                                @endif                                 
                                @if($property_details->parking_type == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Parking Type : {{ $property_details->parking_type }}</li>
                                @endif 
                                @if($property_details->building_type == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Building Type : {{ $property_details->building_type }}</li>
                                @endif 
                                @if($property_details->farm_type == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Farm Type : {{ $property_details->farm_type }}</li>
                                @endif 
                                @if($property_details->open_house_only == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Open House Only : {{ $property_details->open_house_only }}</li>
                                @endif 
                                @if($property_details->number_of_units == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Number of Units : {{ $property_details->number_of_units }}</li>
                                @endif 
                                @if($property_details->land_size == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Land Size : {{ $property_details->land_size }}</li>
                                @endif 
                                @if($property_details->zoning_type == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Zoning Type : {{ $property_details->zoning_type }}</li>
                                @endif 
                                @if($property_details->building_size == null)
                                @else
                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Building Size : {{ $property_details->building_size }}</li>
                                @endif 


                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <!-- <li class="mb-3" style="font-size: 0.9rem;">11Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">22Electric panel heating Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">33Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">44Electric panel heating Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">55Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">66Electric panel heating Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">77Electric panel heating</li>
                                    <li class="mb-3" style="font-size: 0.9rem;">88Electric panel heating Electric panel heating</li> -->
                                </ul>
                            </div>
                        </div>

                        <hr class="mt-3">
                        <div class="row justify-content-center text-center">
                            <div class="col-6 p-0">
                                <a role="button" class="collapsed text-decoration-none text-body collapse-button" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 0.8rem;"></a>
                                <i class="bi bi-chevron-down ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 0.8rem; cursor: pointer;"></i>
                                <i class="bi bi-chevron-up ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="display: none; font-size: 0.8rem; cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="more-information">
                        <h4 class="fw-bold" style="margin-top: 3rem;">More Information</h4>
                        <div class="1strow">
                            <div class="row mt-4 justify-content-between">
                                <a href="#" class="text-decoration-none text-dark more-box ms-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            Street view
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark more-box me-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            Street view
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="2ndrow">
                            <div class="row mt-4 justify-content-between">
                                <a href="#" class="text-decoration-none text-dark more-box ms-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            Street view
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none text-dark more-box me-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            Street view
                                        </div>
                                        <div class="float-end">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-4 px-5">

                    <div class="row justify-content-center shadow py-4" style="margin-top: 3rem;">
                        <div align="center">
                            <a href="{{ url('individual-agent',$agent->id) }}" style="text-decoration:none">
                            @if($agent->photo == null)
                            <img src="{{ url('images/no_image_available.png') }}" class="mb-4" style="border-radius: 50%; object-fit:cover; width: 150px" height="150px">
                            @else
                            <img src="{{ url('files/agent_request',$agent->photo) }}" class="mb-4" style="border-radius: 50%; object-fit:cover; width: 150px" height="150px">
                            @endif
                                
                            </a>
                        </div>

                        <!-- <h6 class="fw-bold mb-0">Hamptons - New Homes</h6> -->

                        <a href="{{ url('individual-agent',$agent->id) }}" style="text-decoration:none; color:black"><h6 align="center" class="justify-content-center fw-bold mb-2">{{ $agent->name }}</h6></a>
                        <a href="{{ url('individual-agent',$agent->id) }}" style="text-decoration:none; color:black"><p align="center">View agent property</p></a>

                        <h6 class="fw-bold mb-0 text-center mt-3">Call agent : {{ $agent->telephone }}</h6>

                        <div class="col-12 text-center mt-3">
                            <a class="btn rounded-0 py-2 fw-bold w-75 text-light" href="" data-bs-toggle="modal" data-bs-target="#emailModal" style="background-color: #EB8EB0;"><i class="fas fa-envelope me-2"></i>Email Agent</a>
                        </div>

                        <div class="row mt-5 justify-content-between">
                            <a data-toggle="modal" data-target="#shareModal" class="btn rounded-0" style="border: 1.5px solid #707070; width: 100%;"><img src="{{ asset('tpr_templete/images/individual_share_icon.svg') }}" alt="" class="me-2" >Share</a>

                            <!-- <button class="btn rounded-0" style="border: 1.5px solid #707070; width: 47%;"><i class="bi bi-heart me-1"></i> Save</button> -->
                        </div>
                    </div><br><br>




                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <a href="mailto:{{ $agent->email }}"><button class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid #707070;"><i class="bi bi-envelope"></i> Create email alert</button></a>
                        </div>


                        @auth
                            @if($favourite  == null)

                                <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-12 text-center mt-4">
                                        <input type="hidden" name="prop_hidden_id" value="{{ $property_details->id }}" />
                                        <button type="submit" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"><i class="bi bi-heart me-1"></i> Save this Property</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-12 text-center mt-4">
                                        <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                        <button type="submit" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid; background-color:#ff4da5; color:white; "><i class="bi bi-heart me-1"></i> Unsave this Property</button>
                                    </div>
                                </form>
                            @endif

                        @else

                            <div class="col-12 text-center mt-4">
                                <a href="{{route('frontend.auth.login')}}" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"><i class="bi bi-heart me-1"></i> Save this Property</a>
                            </div>

                        @endauth



                        
                        <hr class="mt-5" style="border: 1px solid #707070;">
                    </div>

                    
                    @if($ad1 == null)                    
                    @else
                    <a href="{{ $ad1->link }}" style="text-decoration: none">
                        <div class="row shadow mt-5">
                            <div class="col-12">
                                <img src="{{url('files/sidebar_ad',$ad1->image)}}" style="object-fit:cover;" class="img-fluid" alt="">
                            </div>
                            <div class="col-12 mt-3" style="text-align: justify;">
                                <p class="ns" style="height:140px; overflow:hidden !important; text-overflow: ellipsis;">{{ $ad1->description }}</p>
                            </div>        
                        </div>
                    </a>
                    @endif

                    @if($ad2 == null)
                    @else
                    <a href="{{ $ad2->link }}" style="text-decoration: none">
                        <div class="row shadow mt-5">
                            <div class="col-12">
                                <img src="{{url('files/sidebar_ad',$ad2->image)}}" style="object-fit:cover;" class="img-fluid" alt="">                           
                            </div>
                            <div class="col-12 mt-3" style="text-align: justify;">
                                <p class="ns" style="height:140px; overflow:hidden !important; text-overflow: ellipsis;">{{ $ad2->description }}</p>
                            </div>
                        </div>
                    </a>
                    @endif



                </div>
            </div>
        </div>
    </section>



    <!-- similar properties -->
    <section id="similar-properties">
        <div class="container" style="margin-top: 6rem;">
            <h6 class="fw-bold">Similar Properties</h6>

            <div class="row mt-4">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="row px-5">

                            @foreach($random as $key=> $ran)
                                @foreach(App\Models\FileManager::where('id',$ran->feature_image_id)->get() as $feature_image)
                                    <div class="col-3">
                                        <div class="card p-2 shadow border-0">
                                            <a href="{{ url('individual-property',$ran->id) }}" class="text-decoration-none">
                                                <img src="{{ url('images',$feature_image->file_name) }}" style="object-fit: cover; height:200px" width="100%" class="card-img-top" alt="...">
                                            </a>
                                            <div class="card-body">
                                                <p class="text-danger fw-bold mb-0">$ {{$ran->price}}</p>
                                                <h6 class="card-title">Colombo, Sri Lanka</h6>

                                                <p class="text-secondary">
                                                    @if($ran->baths == null)
                                                    @else
                                                    <i class="fas fa-bath me-2"></i>{{ $ran->baths }} bath
                                                    @endif

                                                    @if($ran->beds == null)
                                                    @else
                                                    <i class="fas fa-bed ms-4 me-2"></i>{{ $ran->beds }} bed
                                                    @endif
                                                </p>

                                                <!-- <p class="text-secondary"><i class="fas fa-bath me-2"></i>2<i class="fas fa-bed ms-4 me-2"></i>5</p> -->
                                                
                                                @if($ran->beds == null)
                                                @else
                                                    <p class="card-text mt-3 mb-0 text-body fw-bold">
                                                        {{ $ran->beds }} bed semi-detached house
                                                    </p>
                                                @endif

                                                <p class="card-text mb-0 mt-1" style="font-size: 0.8rem;">Lancaster, claited Kingdom</p>
                                                <p class="card-text" style="font-size: 0.8rem;">0.7 miles St Thomas</p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach
                            @endforeach
                                
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>

            <div class="row text-end mt-5">
                <a href="#" class="text-decoration-none" style="color: #333232;">See all residential properties for sale in New homes <i class="bi bi-chevron-right"></i></a>
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


    <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="row mt-4 mb-4 justify-content-between">
                <div class="col-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('individual-property') }}&quote=Check%20is%20property%20:{{ url('individual-property',$property_details->id) }}" class="p-4 fs-3" style="color: #79CEEB; border: 2px solid #79CEEB;"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="col-3">
                    <a href="http://twitter.com/home?status=Check%20this%20property%20{{ url('individual-property',$property_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="bi bi-twitter"></i></a>
                </div>
                <div class="col-3">
                    <a href="whatsapp://send?text=Check%20this%20is%20property%20:{{ url('individual-property',$property_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="bi bi-whatsapp"></i></a>
                </div>
                <div class="col-3">
                    <a href="sms:?body=Check%20this%20property%20:%20{{ url('individual-property',$property_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="fas fa-sms"></i></a>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
        </div>



    <!-- email modal -->
    @auth
        <div class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 910px;max-width: 1040px;">
                <div class="modal-content">
                    <form action="{{route('frontend.invidual_property')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contact Agent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <h4>To:</h4>
                                    <div class="row">
                                        <div class="col-4">
                                        <!-- background-repeat: no-repeat;background-position: center;background-size: cover;margin-bottom: 20px; -->                                    
                                            <div class="" >
                                            <img src="{{ url('files/agent_request',$agent->photo) }}" alt="" style="object-fit: cover; height:170px" width="100%" class="profile-picture">
                                            </div>
                                        </div>
                                        <div class="col-8 align-middle">
                                            <label><b>Name:</b></label> {{$agent->name}} <br>
                                            <label><b>Phone Number:</b></label> {{$agent->telephone}} <br>
                                            <label><b>Address:</b></label> {{$agent->address}} <br>
                                            <label><b>Country:</b></label> {{$agent->country}} <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">


                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>First Name  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="last_name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Im a <span style="color: red">*</span></label>
                                        <select class="form-control" name="im_resident" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="First Time Buyer">First Time Buyer</option>
                                            <option value="No Preference">No Preference</option>
                                            <option value="Repeat Buyer">Repeat Buyer</option>
                                            <option value="Seller">Seller</option>
                                            <option value="Residential Investor">Residential Investor</option>
                                            <option value="Commercial Investor">Commercial Investor</option>
                                            <option value="Commercial buyer or leaser">Commercial buyer or leaser</option>
                                            <option value="Land for development">Land for development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preferred method of contact  <span style="color: red">*</span></label>
                                        <select class="form-control" name="contact_method" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Email">Email</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Text">Text</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email  <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number  <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message  <span style="color: red">*</span></label>
                                        <textarea type="text" rows="3" class="form-control" name="message" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <!-- <div class="fakeLabel"><b>Information to help the TROPICAL® respond</b>:</div>
                            <br>
                            

                            <div class="row">
                                <div class="form-group mb-3">
                                    <input type="checkbox" id="Check" onclick="myFunction()">
                                    <label for="Check">I wish to book a showing. Date and time combinations.</label> 

                                    <div class="row" style="margin-left:6px;">
                                        <div class="col-4">
                                            <input type="date" id="date" class="form-control col-sm-4 mt-2" style="display:none" placeholder="Any Date" />
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control mt-2" id="time" style="display:none"> 
                                                <option value="Any Time">Any Time</option>   
                                                <option value="Morning">Morning</option>  
                                                <option value="Afternoon">Afternoon</option>  
                                                <option value="Evening">Evening</option>                                                                    
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <input type="checkbox" id="myCheck" onclick="myFunction()">
                                    <label for="myCheck">I am currently working with a TROPICAL®.</label> 
                                    <div class="row" style="margin-left:6px;">
                                        <div class="col-6">
                                            <input type="text" id="text" class="form-control mt-2" style="display:none;" placeholder="First and Last Name of My TROPICAL®" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="checkbox" id="tick1">
                                    <label for="tick1">I have been pre-approved for a mortgage.</label> 
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="tick2">
                                    <label for="tick2">I wish to give my location, if available.</label> 
                                </div>
                            </div>     -->


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @else
    <div class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 910px;max-width: 1040px;">
                <div class="modal-content">
                    <form action="{{route('frontend.invidual_property')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contact Agent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <h4>To:</h4>
                                    <div class="row">
                                        <div class="col-4">
                                        <!-- background-repeat: no-repeat;background-position: center;background-size: cover;margin-bottom: 20px; -->                                    
                                            <div class="" >
                                            <img src="{{ url('files/agent_request',$agent->photo) }}" alt="" style="object-fit: cover; height:170px" width="100%" class="profile-picture">
                                            </div>
                                        </div>
                                        <div class="col-8 align-middle">
                                            <label><b>Name:</b></label> {{$agent->name}} <br>
                                            <label><b>Phone Number:</b></label> {{$agent->telephone}} <br>
                                            <label><b>Address:</b></label> {{$agent->address}} <br>
                                            <label><b>Country:</b></label> {{$agent->country}} <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">


                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>First Name  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="last_name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Im a <span style="color: red">*</span></label>
                                        <select class="form-control" name="im_resident" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="First Time Buyer">First Time Buyer</option>
                                            <option value="No Preference">No Preference</option>
                                            <option value="Repeat Buyer">Repeat Buyer</option>
                                            <option value="Seller">Seller</option>
                                            <option value="Residential Investor">Residential Investor</option>
                                            <option value="Commercial Investor">Commercial Investor</option>
                                            <option value="Commercial buyer or leaser">Commercial buyer or leaser</option>
                                            <option value="Land for development">Land for development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preferred method of contact  <span style="color: red">*</span></label>
                                        <select class="form-control" name="contact_method" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Email">Email</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Text">Text</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email  <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number  <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message  <span style="color: red">*</span></label>
                                        <textarea type="text" rows="3" class="form-control" name="message" required></textarea>
                                    </div>
                                </div>

                            </div>
                            <br>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('frontend.auth.login') }}" class="btn btn-primary">Send</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endauth

@endsection



@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <script>
        function myFunction() {
            var checkBox1 = document.getElementById("Check");
            var date = document.getElementById("date");
            var time = document.getElementById("time");
            if (checkBox1.checked == true){
                date.style.display = "block";
            } else {
                date.style.display = "none";
            }
            if (checkBox1.checked == true){
                time.style.display = "block";
            } else {
                time.style.display = "none";
            }

            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }

        }
    </script>    


<script>

    function initMap() {
        let lat = $('#lat').val();
        let lng = $('#lng').val();

        const myLatLng = { lat: parseFloat(lat), lng: parseFloat(lng) };

            let options = {
            zoom: 8,
            center: myLatLng
            };

            const map = new google.maps.Map(document.getElementById("map"), options);


            let marker = new google.maps.Marker({
                position: myLatLng,
                map:map
            });

            // console.log(myLatLng);
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

<script>
    $('.collapse-button').on('click', function(){
        $(".bi bi-chevron-down").hide();
        $(".bi bi-chevron-up").show();
        
        $(".features i").toggle();
    });
</script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

@endpush