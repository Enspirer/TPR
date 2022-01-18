@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}">
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/swiper.css') }}">
@endpush

@if ( session()->has('message') )


    <div class="container" style="background-color: #c6e4ee; padding-top:5px; border-radius: 50px 50px; text-align:center;">

        <h1 style="margin-top:150px;" class="display-6">Thanks for Booking!</h1><br>
        <p class="lead"><h4>One of our member will get back in touch with you soon!<br><br> Have a great day!</h4></p>
        <hr><br>    
        <p class="lead">
            <a class="btn btn-success btn-md mb-5" href="{{ url('individual-property',$property_details->id) }}" role="button">Go Back to View Property</a>
        </p>
    </div>
  

@else


    <!-- back to search-->
    <section id="path">
        <div class="container" style="margin-top: 10rem;">
            <a href="{{ route('frontend.search_function', ['key_name', 'max_price', 'min_price', 'category_type', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator', 'external_keyword'] )}}" class="text-decoration-none text-body fw-bolder"><i class="bi bi-chevron-left"></i> Back to search results</a>
        </div>
    </section>

    <!-- title-->
    <section>
        <div class="container" style="margin-top: 3rem;">
            <h3>{{ $property_details->name }}</h3>
        </div>
    </section>


    <!-- content -->
    <section id="content">
        <div class="container mt-4">
            <div class="row justify-content-between">

                <div class="col-8 full-size-width">

                    @if(json_decode($property_details->image_ids) == null)

                        <div align="center">
                            <img src="{{ url('images/no_image_available.png') }}" style="object-fit: cover;" width="100%" height="300px" alt="...">
                        </div>

                    @else
                        <div class="carousel">
                            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" style="height:400px;">

                                @auth
                                    @if($interior_image != NULL)
                                        @foreach($interior_image as $key => $interior)  

                                            @if($property_details->interior_image_access == 'agents')
                                                @if( App\Models\AgentRequest::where('user_id',auth()->user()->id)->where('status','Approved')->first() != null )                                             
                                                
                                                    <div class="carousel-item" data-toggle="modal" data-target="#interiorModal_{{$key}}">
                                                        <img  src="{{url('images', App\Models\FileManager::where('id', $interior)->first()->file_name)}}" class="d-block w-100" style="height:600px; object-fit:cover;" alt="...">
                                                    </div>  
                                                    
                                                    <div class="modal fade bd-example-modal-lg" id="interiorModal_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            
                                                            <div class="modal-content" style="position: relative;">
                                                                <button style="position: absolute; top: 0; right: 0; z-index: 1; margin-right:8px;" type="button" class="btn-close text-right mt-2" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                                <img src="{{ url('images',App\Models\FileManager::where('id', $interior)->first()->file_name) }}" class="d-block w-100" alt="..." style="object-fit:contain;">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                @endif    
                                            @else 
                                                <div class="carousel-item" data-toggle="modal" data-target="#interiorModal_{{$key}}">
                                                        <img src="{{url('images', App\Models\FileManager::where('id', $interior)->first()->file_name)}}" class="d-block w-100" style="height:600px; object-fit:cover;" alt="...">
                                                    </div>  
                                                    
                                                    <div class="modal fade bd-example-modal-lg" id="interiorModal_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            
                                                            <div class="modal-content" style="position: relative;">
                                                                <button style="position: absolute; top: 0; right: 0; z-index: 1; margin-right:8px;" type="button" class="btn-close text-right mt-2" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                                <img src="{{ url('images',App\Models\FileManager::where('id', $interior)->first()->file_name) }}" class="d-block w-100" alt="..." style="object-fit:contain;">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                            @endif                                

                                            

                                        @endforeach
                                    @endif                                
                                @endauth

                                @foreach($final_out as $key => $image)
                                    @if($key == 0)
                                    <div class="carousel-item active" width="100%" data-toggle="modal" data-target="#exampleModal_{{$key}}">
                                        <img onclick="count_views('{{$property_details->id}}','{{$image[$key]}}',1)"  src="{{ url('images',$image) }}" class="d-block w-100" alt="..." style="object-fit:cover; height: 600px;">
                                    </div>
                                    @else  
                                    <div class="carousel-item" width="100%" data-toggle="modal" data-target="#exampleModal_{{$key}}">
                                        <img onclick="count_views('{{$property_details->id}}','{{$image[0]}}',1)" src="{{ url('images',$image) }}" class="d-block w-100" alt="..." style="object-fit:cover;">
                                    </div>

                                    @endif
                                    <!-- Modal -->


                                        <div class="modal fade bd-example-modal-lg" id="exampleModal_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                
                                                <div class="modal-content" style="position: relative;">
                                                    <button style="position: absolute; top: 0; right: 0; z-index: 1; margin-right:8px;" type="button" class="btn-close text-right mt-2" data-dismiss="modal" aria-label="Close">
                                                    </button>
                                                    <img src="{{ url('images',$image) }}" class="d-block w-100" alt="..." style="object-fit:contain;">

                                                    @php
                                                        $countDetails = \App\Models\PropertyCalulation::where('file_id',$image[0])->first();
                                                        if($countDetails){
                                                            $no_views = $countDetails->count;
                                                        }else{
                                                            $no_views = 0;
                                                        }
                                                    @endphp


                                                        <div style="padding: 10px;background: black;color: white;"><i class="fa fa-eye"></i> View Count {{$no_views}}</div>

                                                </div>
                                                
                                            </div>
                                        </div>
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
                            <div class="col-5 full-size-width">
                                <h5 class="mb-1" style="color: #79CEEC;">{{ get_currency(request(),$property_details->price ) }}</h5>
                                <h5 style="color: #83BE43">{{ $property_details->city }}, {{ $property_details->country }}</h5>

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
                            <div class="col-4 full-size-width">

                            @auth
                                @if($property_details->virtual_tour != null)
                                    @if($property_details->virtual_tour_access == 'agents')
                                        @if( App\Models\AgentRequest::where('user_id',auth()->user()->id)->where('status','Approved')->first() != null )
                                            <div class="mt-3">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#virtual_tour_modal">Virtual Tour</button>
                                            </div>
                                        @endif
                                    @else
                                        <div class="mt-3">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#virtual_tour_modal">Virtual Tour</button>
                                        </div>
                                    @endif
                                @endif

                            @else
                                @if($property_details->virtual_tour != null)
                                    <div class="mt-3">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#loginModal">Virtual Tour</button>
                                    </div>
                                @endif
                            @endauth
                            

                            </div>
                            <div class="col-3 full-size-width text-end">

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

                    <!-- <div class="extra-details mt-2">
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
                    </div> -->

                    <div class="features">
                        <h4 class="fw-bold" style="margin-top: 6rem;">Features and Description</h4>

                        <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
                            <li class="nav-item w-25 text-center" role="presentation">
                                <button class="nav-link active w-100" id="highlights-tab" data-bs-toggle="tab" data-bs-target="#highlights" type="button" role="tab" aria-controls="highlights" aria-selected="true">
                                    <i class="fas fa-star decription-icon"></i>
                                    <h6 class="fw-bold mobile-font-small">Highlights</h6>
                                    <!-- <i class="fa fa-circle tabDot"></i> -->
                                </button>
                            </li>
                            <li class="nav-item w-25" role="presentation">
                                <button class="nav-link w-100" id="neighbourhood-tab" data-bs-toggle="tab" data-bs-target="#neighbourhood" type="button" role="tab" aria-controls="neighbourhood" aria-selected="false">
                                    <img src="{{ url('img/icon_neighbourhood_gray.svg') }}" alt="" class="img-fluid mb-1" style="opacity: 0.6">
                                    <h6 class="fw-bold mobile-font-small">Neighbourhood</h6>
                                </button>
                            </li>
                            <li class="nav-item w-25" role="presentation">
                                <button class="nav-link w-100" id="statistics-tab" data-bs-toggle="tab" data-bs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false">
                                    <i class="fas fa-chart-bar decription-icon"></i>
                                    <h6 class="fw-bold mobile-font-small">Statistics</h6>
                                </button>
                            </li>

                            <li class="nav-item w-25" role="presentation">
                                <button class="nav-link w-100" id="calculators-tab" data-bs-toggle="tab" data-bs-target="#calculators" type="button" role="tab" aria-controls="calculators" aria-selected="false">
                                    <i class="fas fa-calculator decription-icon"></i>
                                    <h6 class="fw-bold mobile-font-small">Calculators</h6>
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="highlights" role="tabpanel" aria-labelledby="highlights-tab">
                                <div class="row mt-4 collapse" id="collapseExample" aria-expanded="false">
                                    <div class="col-12">
                                        <ul style="list-style:none; padding:0">

                                            <div class="row">
                                            
                                            @if($property_details->baths == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Baths : {{ $property_details->baths }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->beds == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Beds : {{ $property_details->beds }}</li>
                                                </div>
                                            @endif  
                                                                        
                                            @if($property_details->parking_type == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Parking Type : {{ $property_details->parking_type }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->building_type == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Building Type : {{ $property_details->building_type }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->farm_type == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Farm Type : {{ $property_details->farm_type }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->open_house_only == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Open House Only : {{ $property_details->open_house_only }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->number_of_units == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Number of Units : {{ $property_details->number_of_units }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->land_size == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Land Size : {{ $property_details->land_size }}</li>
                                                </div>
                                            @endif 

                                            @if($property_details->zoning_type == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Zoning Type : {{ $property_details->zoning_type }}</li>
                                                </div>                                
                                            @endif 

                                            @if($property_details->building_size == null)
                                            @else
                                                <div class="col-6">
                                                    <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">Building Size : {{ $property_details->building_size }}</li>
                                                </div>
                                            @endif 

                                            </div>

                                            @if($external_parameter != null)
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: 600;" class="mb-3">External Features:</label>
                                                            <br>                                                        
                                                                @foreach($external_parameter as $external)
                                                                    <div class="col-6">
                                                                        <li class="mb-3 p-2" style="font-size: 1rem; border:2px solid grey;">{{$external->label}} : {{$external->userData[0]}}</li>
                                                                    </div>                                                           
                                                                @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label style="font-weight: 600;" class="mb-3">Description:</label>
                                                        <table >
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $property_details->description}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </ul>
                                    </div>
                                    
                                </div>

                                <hr class="mt-3">
                                <div class="row justify-content-center text-center">
                                    <div class="col-6 p-0">
                                        <a role="button" class="collapsed text-decoration-none text-body collapse-button" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 0.8rem;">
                                        <i class="bi bi-chevron-down ms-1 collapsed" style="font-size: 0.8rem; cursor: pointer;"></i>
                                        <i class="bi bi-chevron-up ms-1 collapsed" style="display: none; font-size: 0.8rem; cursor: pointer;"></i>
                                    </a>
                                  
                                    
                                       

                                        <!-- <i class="bi bi-chevron-down ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 0.8rem; cursor: pointer;"></i>
                                        <i class="bi bi-chevron-up ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="display: none; font-size: 0.8rem; cursor: pointer;"></i> -->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="neighbourhood" role="tabpanel" aria-labelledby="neighbourhood-tab">
                                <div class="row mt-3">

                                    <div style="border:1px solid red; text-align:center" class="mb-4 p-1">
                                        <h6 style="color:red" class="mb-2 mt-1">Warning!</h6><h6 class="mb-1" style="font-size:15px;"> Statistics API not connected. Please connect your Statistics API.</h6>
                                    </div>

                                    <div class="col-5 pe-0">

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-school text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Elementary Schools</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-graduation-cap text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">High Schools</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-school text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Elementary Schools</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-volume-mute text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Quiet</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-walking text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Pedestrian friendly</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-tree text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Parks</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-bus text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Transit Friendly</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-car text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Car Friendly</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-utensils text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Restaurants</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-shopping-bag text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Shopping</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-baby text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Daycares</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-coffee text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Cafes</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-school text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Vibrant</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3 py-2 border">
                                            <div class="row align-items-center">
                                                <div class="col-2 text-center">
                                                    <i class="fas fa-cloud-moon text-secondary"></i>
                                                </div>
                                                <div class="col-8">
                                                    <p class="mb-0" style="font-size: 13px;">Nightlife</p>
                                                </div>
                                                <div class="col-2 ps-0 text-center">
                                                    <div style="padding: 0.2rem;">
                                                        <p class="mb-0 number" style="font-size: 13px;">10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-7 ps-0">
                                        <div class="location">
                                            <div id="map2" style="height: 749px; width: 100%;"></div>
                                            <input type="text" name="lat" id="lat2" value="{{$property_details->lat}}" class="mt-3 d-none">
                                            <input type="text" name="lng" id="lng2" value="{{$property_details->long}}" class="mt-3 d-none">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">

                                <div style="border:1px solid red; text-align:center" class="mt-3 mb-4 p-1">
                                    <h6 style="color:red" class="mb-2 mt-1">Warning!</h6><h6 class="mb-1" style="font-size:15px;"> Statistics API not connected. Please connect your Statistics API.</h6>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="calculators" role="tabpanel" aria-labelledby="calculators-tab">


                                <iframe src="{{route('frontend.calc_tpr',$property_details->price)}}" height="1000" width="100%" title="W3Schools Free Online Web Tutorials"></iframe>

                            </div>
                        </div>

                        
                    </div>



                        @if(count($listing_history) != 0)
                            <div class="features">
                                <h4 class="fw-bold" style="margin-top: 5rem;">Listing History</h4>

                                <table class="styled-table">
                                    <thead>
                                        <tr>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Price</th>
                                            <th>Event</th>
                                            <th>Listing ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listing_history as $listing)
                                            <tr>
                                                <td>{{$listing->date_start}}</td>
                                                <td>{{$listing->date_end}}</td>
                                                <td>{{$listing->price}}</td>
                                                <td>{{$listing->event}}</td>
                                                <td>{{$listing->listing_id}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                
                            </div>

                        @endif


    
                </div>

                <div class="col-4 px-5 full-size-width">

                    <div class="row justify-content-center shadow py-4">
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

                        @if($property_details->sold_request == 'Sold')
                            <div class="col-12 text-center mt-3">
                                <a class="btn rounded-0 py-2 fw-bold w-75 text-light btn-danger">Sold</a>
                            </div> 
                        @else
                            <div class="col-12 text-center mt-3">
                                @auth
                                    <a class="btn rounded-0 py-2 fw-bold w-75 text-light" href="" data-bs-toggle="modal" data-bs-target="#emailModal" style="background-color: #FF69B4;"><i class="fas fa-envelope me-2"></i>Email Agent</a>
                                @else
                                    <a class="btn rounded-0 py-2 fw-bold w-75 text-light" href="" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color: #FF69B4;"><i class="fas fa-envelope me-2"></i>Email Agent</a>
                                @endauth
                            </div>  
                                        

                            <div class="col-12 text-center mt-3">

                                @auth     
                                    <a class="btn rounded-0 py-2 fw-bold w-75 text-light" href="" data-bs-toggle="modal" data-bs-target="#bookaview" style="background-color: #008080;"><i class="fas fa-bookmark me-2"></i>Book a Viewing</a>                    
                                @else
                                    <a class="btn rounded-0 py-2 fw-bold w-75 text-light" href="" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color: #008080;"><i class="fas fa-bookmark me-2"></i>Book a Viewing</a>
                                @endauth
                            
                            
                                <!-- <button class="btn rounded-0 py-2 fw-bold w-75 text-light" style="background-color:#008080;"><i class="fas fa-bookmark me-2"></i> Book a Viewing</button>                         -->
                            </div>

                        @endif 

                        <div class="col-12 text-center mt-3">
                            <a data-toggle="modal" data-target="#shareModal" class="btn rounded-0 py-2 fw-bold w-75" style="border: 1.5px solid #707070;"><i class="far fa-share-square me-2"></i>Share</a>                            
                        </div>
                    </div><br><br>




                    <div class="row justify-content-center">
                        <!-- <div class="col-12 text-center">
                            <a href="mailto:{{ $agent->email }}"><button class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid #707070;"><i class="bi bi-envelope"></i> Create email alert</button></a>
                        </div> -->

                        @auth
                            @if($watch_list == null)
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#watch_list" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"><i style="margin-right:5px;" class="fas fa-eye"></i>Watch Listing</button>
                                </div> 
                            @else
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#watch_list_change" class="btn rounded-0 py-2 fw-bold fs-6 w-100 text-light" style="border: 1.5px solid; background-color:#28a3b3;"><i style="margin-right:5px;" class="fas fa-eye"></i>Watch Listing</button>
                                </div> 
                            @endif
                        @else
                            <div class="col-12 text-center mt-4">
                                <a href="{{route('frontend.auth.login')}}" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"><i style="margin-right:5px;" class="fas fa-eye"></i>Watch Listing</a>
                            </div>
                        @endauth


                            <div class="col-12 text-center mt-4">
                                <a  target="_blank" href="https://www.google.com/maps/dir/?api=1&destination={{$property_details->lat}}%2c{{$property_details->long}}" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"> <i style="margin-right:5px;" class="fas fa-directions"></i>Directions</a>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button class="btn rounded-0 py-2 fw-bold fs-6 w-100" onclick="window.print()" style="border: 1.5px solid"><i class="bi bi-printer me-1"></i>Print</button>
                            </div>


                        @auth
                            @if($favourite == null)

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
                                        <button type="submit" class="btn rounded-0 py-2 fw-bold fs-6 w-100 text-light" style="border: 1.5px solid; background-color:#F33A6A;"><i class="fas fa-heart me-1"></i> Unsave this Property</button>
                                    </div>
                                </form>
                            @endif

                        @else

                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="col-12 text-center mt-4">
                                    <input type="hidden" name="cookie_property_id" value="{{ $property_details->id }}" />
                                    <button type="submit" class="btn rounded-0 py-2 fw-bold fs-6 w-100" style="border: 1.5px solid"><i class="bi bi-heart me-1"></i> Save this Property</button>
                                </div>
                            </form>

                        @endauth



                        
                        <hr class="mt-5" style="border: 1px solid #707070;">
                    </div>

                    
                    @if(count($side_ads) > 0)
                        @foreach($side_ads as $side_ad)
                            <div class="row shadow mt-5">
                                <div class="col-12">
                                    <a href="{{ $side_ad->link }}" target="_blank"><img src="{{url('files/sidebar_ad', $side_ad->image)}}" alt="" class="img-fluid"></a>
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



    <!-- similar properties -->
    <section id="similar-properties">
        <div class="container" style="margin-top: 6rem; margin-bottom: 3rem;">
            <h6 class="fw-bold">Similar Properties</h6>

            <div class="row mt-4">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper justify-content-center">

                        <div class="swiper-slide row">
                            <!-- <div class="row px-5"> -->

                            @foreach($random as $ran)
                                <div class="col-3 full-size-width tab-width-p-card">
                                    <div class="card p-2 shadow border-0 tab-height-p-card" style="height: 400px">
                                        <a href="{{ url('individual-property',$ran->id) }}" class="text-decoration-none">
                                            <img src="{{url('image_assest',$ran->feature_image_id)}}" style="object-fit:cover; height:210px" class="card-img-top w-100" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <p class="text-danger fw-bold mb-0">{{get_currency(request(),$ran->price)}}</p>
                                            <h6 class="card-title">
                                                @if($ran->city !== null)
                                                    {{ $ran->city }}
                                                @endif, 
                                                @if($ran->country !== null)
                                                    {{ $ran->country }}
                                                @endif
                                            </h6>

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

                                            <!-- <p class="card-text mb-0 mt-1" style="font-size: 0.8rem;">Lancaster, claited Kingdom</p>
                                            <p class="card-text" style="font-size: 0.8rem;">0.7 miles St Thomas</p> -->
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                                
                            <!-- </div> -->
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>

            <div class="row text-end mt-2">
                <a href="{{ route('frontend.search_function', ['key_name', 'min_price', 'max_price', 'residential', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator', 'external_keyword'] )}}" class="text-decoration-none" style="color: #333232;">See all residential properties for sale in New homes <i class="bi bi-chevron-right"></i></a>
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


    <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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

                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time  <span style="color: red">*</span></label>
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">
                            <input type="hidden" class="form-control" name="book_a_viewing" value="No">

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

                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time  <span style="color: red">*</span></label>
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div>


                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">
                            <input type="hidden" class="form-control" name="book_a_viewing" value="No">

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







<!-- book a viewing modal -->
    @auth
        <div class="modal fade bd-example-modal-lg" id="bookaview" tabindex="-1" aria-labelledby="bookaviewModalLabel" aria-hidden="true">
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

                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time  <span style="color: red">*</span></label>
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">
                            <input type="hidden" class="form-control" name="book_a_viewing" value="Yes">

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
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    @else
    <div class="modal fade bd-example-modal-lg" id="bookaview" tabindex="-1" aria-labelledby="bookaviewModalLabel" aria-hidden="true">
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

                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time  <span style="color: red">*</span></label>
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div>

                                
                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property_details->id}}">
                            <input type="hidden" class="form-control" name="book_a_viewing" value="Yes">

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




<div class="modal fade" id="virtual_tour_modal" tabindex="-1" aria-labelledby="virtual_tour_modalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="virtual_tour_modalModalLabel">Virtal Tour</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
            {!!$property_details->virtual_tour!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

    
@if($watch_list == null)
              
    <div class="modal fade" id="watch_list" tabindex="-1" aria-labelledby="watch_listModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="watch_listModalLabel">Watch Listing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('frontend.watch_listing')}}" >
                        {{csrf_field()}}

                        <p>Watch this listing. Receive notification when it is sold.</p>

                        <div class="form-check mb-3">
                            <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing" id="watch_listing">
                            <label class="form-check-label" for="watch_listing">
                                Watch Listing
                            </label>
                        </div>

                        <p>Watch this community. Receive updates on Detached homes in {{$property_details->city}} - {{$property_details->country}}</p>
                        
                        <div class="form-check">
                            <input class="form-check-input" name="new_list" type="checkbox" value="{{$property_details->city}}" id="new_list">
                            <label class="form-check-label" for="new_list">
                                New Listing
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property_details->city}}" id="sold_list">
                            <label class="form-check-label" for="sold_list">
                                Sold Listing
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="de_list" type="checkbox" value="{{$property_details->city}}" id="de_list">
                            <label class="form-check-label" for="de_list">
                                Delisted Listing
                            </label>
                        </div>

                        <input type="hidden" name="pro_hidden_id" value="{{ $property_details->id }}" />

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@else


    <div class="modal fade" id="watch_list_change" tabindex="-1" aria-labelledby="watch_list_changeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="watch_list_changeModalLabel">Watch Listing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('frontend.change_watch_listing')}}" >
                        {{csrf_field()}}

                        <p>Watch this listing. Receive notification when it is sold.</p>

                        <div class="form-check mb-3">
                            @if($watch_list->watch_list == null)
                                <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing" id="watch_listing">
                            @else
                                <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing" id="watch_listing" checked>
                            @endif
                            <label class="form-check-label" for="watch_listing">
                                Watch Listing
                            </label>
                        </div>
                       
                        <p>Watch this listing. Receive notification when it is sold. Watch this community. Receive updates on Detached homes in {{$property_details->city}} - {{$property_details->country}}</p>


                        <div class="form-check">
                            @if($watch_list->new_list == null)
                                <input class="form-check-input" name="new_list" type="checkbox" value="{{$property_details->city}}" id="new_list">
                            @else
                                <input class="form-check-input" name="new_list" type="checkbox" value="{{$property_details->city}}" id="new_list" checked>
                            @endif
                            <label class="form-check-label" for="new_list">
                                New Listing
                            </label>
                        </div>
                        <div class="form-check">
                            @if($watch_list->sold_list == null)
                                <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property_details->city}}" id="sold_list">
                            @else
                                <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property_details->city}}" id="sold_list" checked>
                            @endif
                            <label class="form-check-label" for="sold_list">
                                Sold Listing
                            </label>
                        </div>
                        <div class="form-check">
                            @if($watch_list->de_list == null)
                                <input class="form-check-input" name="de_list" type="checkbox" value="{{$property_details->city}}" id="de_list">
                            @else
                                <input class="form-check-input" name="de_list" type="checkbox" value="{{$property_details->city}}" id="de_list" checked>
                            @endif
                            <label class="form-check-label" for="de_list">
                                Delisted Listing
                            </label>
                        </div>

                        <input type="hidden" name="pro_hidden_id" value="{{ $property_details->id }}" />
                        <input type="hidden" name="watch_list" value="{{ $watch_list->id }}" />

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endif





    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('frontend.auth.login.post')}}" class="needs-validation" novalidate>
                        {{csrf_field()}}
                        <div class="input-group has-validation mb-5">
                            <input type="email" name="email" class="form-control form-control-lg sign-in-box shadow-sm" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required>
                            <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="bi bi-envelope fs-5"></i></span>
                            <div class="invalid-feedback">
                                This is a mandatory field and enter email address correctly to continue.
                            </div>
                        </div>

                        <div class="input-group has-validation mb-5">
                            <input type="password" name="password" class="form-control form-control-lg sign-in-box shadow-sm" id="exampleInputPassword1" placeholder="Password" required>
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
                                        <label class="form-check-label" for="exampleCheck1" style="font-size: 0.9rem;">Remember me</label>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <a href="{{ route('frontend.auth.password.reset') }}" class="text-decoration-none" style="font-size: 0.9rem; color: #77CEEC;">Forgot Password</a>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="individual" value="true">

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Sign In</button>
                    </form>


                    <p class="text-end mt-3">Don't have an account? <a href="{{route('frontend.auth.register')}}" class="text-decoration-none" style="color: #77CEEC;">Sign Up</a></p>


                    <!-- <div class="follow" style="margin-top: 3rem;">
                        <h6 class="fw-bolder mb-5">With Social Media</h6>
                        <div class="row mb-5">
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

        initMaptwo();
    }
</script>

<script>

    function initMaptwo() {
        let lat = $('#lat2').val();
        let lng = $('#lng2').val();

        const myLatLng = { lat: parseFloat(lat), lng: parseFloat(lng) };

            let options = {
            zoom: 8,
            center: myLatLng
            };

            const map = new google.maps.Map(document.getElementById("map2"), options);


            let marker = new google.maps.Marker({
                position: myLatLng,
                map:map
            });

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

<script>
    // $('#neighbourhood-tab').hover(function() {
    //     $(this).find('img').addClass('high-opacity');
    // }, function() {
    //     $(this).find('img').removeClass('high-opacity');
    // });
    
    function count_views(property_id,file_id) {


        $.get("{{url('/')}}/api/property_view_calulaion/" + property_id + '/' + file_id + '/1', function(data, status){

        });
    }

    $('ul li button').on('click', function() {
        if($(this).attr('id') == 'neighbourhood-tab'){
            $(this).find('img').addClass('high-opacity');
        }
        else {
            $('#neighbourhood-tab').find('img').removeClass('high-opacity');
        }
    })
</script>

@endpush

@endif