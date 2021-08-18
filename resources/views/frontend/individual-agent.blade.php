@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-agent.css') }}">
@endpush


    <!-- banner -->

    @if($agent_details->cover_photo == null)
        <section id="index-banner">
            <div class="container-fluid banner" style="background-image: url('{{ url('img/no_image_available.png') }}');">
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
            <img src="{{ url('img/no_image_available.png') }}" alt="" style="border-style: solid;border-width: 2px; border-color:black;" class="profile-picture">
        </div>
    </section>

    @else

    <section id="profile-picture">
        <div class="container position-relative" style="margin-top: 7rem;">
            <img src="{{ url('files/agent_request',$agent_details->photo) }}" alt="" style="border-style: solid;border-width: 2px; border-color:black; object-fit:cover; width:160px;" class="profile-picture">
        </div>
    </section>
    
    @endif

    <!-- about -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-2"> 
                </div> 
                <div class="col-10"> 
                    <div class="row">  
                        <div class="col-10"> 
                            <h3 class="fw-bolder mt-3">
                                @if($agent_details->company_name == null)
                                    {{ $agent_details->name }}
                                @else
                                    {{ $agent_details->company_name }}
                                @endif
                            </h3>
                        </div>
                        <div class="col-2">
                            <button class="btn rounded-0 text-light px-4 py-2 mt-3" style="background-color: #008080; margin: 8rem 34rem 0 0; cursor: default;">{{ $agent_details->agent_type }}</button>
                        </div>
                    </div>

                    <p class="mt-4" style="text-align: justify; ">{!! $agent_details->description_message !!}</p>

                    <!-- <p class="mt-4" style="text-align: justify;">Established in June 1980 by Rimza Zaveer, MENAVID (Pvt) Ltd was set up with the aim of offering superior and unparalleled real estate options via high-class properties to purchase, own, rent out, sell, lease and manage for both residential and commercial purposes. Our commercial projects in clude up-market business premises/buildings for office spaces, embassies and overseas/local companies in the BOI, NGOs, and expatriates on projects funded by international organisations.</p>

                    <p style="text-align: justify;">With over 3 decades of experience in the industry and continuous success in fulfilling the ever-changing needs of our clients, MENAVID (Pvt) Ltd has grown from strength-to-strength over the years. Our values are rooted in our foundations, allowing us to provide consistently professional, friendly, and unparalleled services when helping you develop concepts designs, market strategies, building solutions and frameworks as per your individual requirements.</p>

                    <p style="text-align: justify;">We offer peace of mind with our extensive knowledge of the city and suburbs, as well as diverse neighborhoods to walk our customers through their options thoroughly. This ensures hassle-free arrangements and the highest quality every step of the way, no matter whether you are after a house, apartment or any other form of building space.</p> -->

                    <br>
                    <div class="row">
                        <div class="clearfix">
                            <div class="col-7 float-end" >
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <a href="tel:{{ $agent_details->telephone }}" class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_phone_icon.svg') }}" alt="" class="img-fluid me-2"> Call</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="mailto:{{ $agent_details->email }}" class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_email_icon.svg') }}" alt="" class="img-fluid me-2"> Email</a>
                                    </div>
                                    <!-- <div class="col-3">
                                        <button class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_heart_icon.svg') }}" alt="" class="img-fluid me-2"> Save</button>
                                    </div> -->
                                    <div class="col-4">
                                        <a data-toggle="modal" data-target="#shareModal"><button class="btn w-100 rounded-0 individual-about-buttons fw-bolder"><img src="{{ asset('tpr_templete/images/individual_share_icon.svg') }}" alt="" class="img-fluid me-2"> Share</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>



    <!-- agent tabs -->
    <section id="agent-tabs">
        <div class="container" style="margin-top: 6rem;">
            <h4 class="fw-bold">All ads from {{ $agent_details->name }}</h4>

            @if(count($all_properties) == 0)
                <h2 align="center" style="margin-top:130px; color:#808080;">Properties Are Not Found</h2>
            @else

                <ul class="nav mb-3 mt-5" id="pills-tab" role="tablist">
                    <li class="nav-item me-3 all" role="presentation" style="border: 2px solid #4A4A4A;">
                    <a class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true" style="color: #4A4A4A;">ALL</a>
                    </li>
                    <li class="nav-item me-3 commercial" role="presentation" style="border: 2px solid #83BE43;">
                        <a class="nav-link" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="false" style="color: #83BE43;">COMMERCIAL</a>
                    </li>
                    <li class="nav-item me-3 residential" role="presentation" style="border: 2px solid #4195E1;">
                    <a class="nav-link" id="pills-residential-tab" data-bs-toggle="pill" data-bs-target="#pills-residential" type="button" role="tab" aria-controls="pills-residential" aria-selected="false" style="color: #4195E1;">RESIDENTIAL</a>
                    </li>
                </ul>

                <div class="tab-content mt-5" id="pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                        @foreach($all_properties as $key=> $prop)
                            @foreach(App\Models\FileManager::where('id',$prop->feature_image_id)->get() as $feature_image)
                            <div class="row border py-4 px-3 mb-4">
                                <div class="col-4">
                                    <img src="{{ url('images',$feature_image->file_name) }}" style="object-fit: cover; height:210px" width="100%" alt="" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <div class="ps-2">
                                        <div class="row">
                                            <h5 class="fw-bolder">{{$prop->name}}</h5>
                                        </div>
                                        <div class="row mt-3">

                                        @if($prop->main_category == 'Commercial')
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                                            </div>
                                        @else
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Residential</button>
                                            </div>
                                        @endif

                                            <div class="col-6">
                                                <p class="ns fw-bolder tab-price">Rs. {{number_format((float)$prop->price, 2)}} </p>
                                            </div>
                                        </div>
                                                    
                                                
                                        <p class="mt-4 mb-0" style="text-align: justify;"><b>{{$prop->name}}</b> - |

                                        @if($prop->baths == null) @else Baths : {{ $prop->baths }} | @endif
                                        @if($prop->beds == null) @else Beds : {{ $prop->beds }} | @endif
                                        @if($prop->parking_type == null) @else Parking Type : {{ $prop->parking_type }} | @endif
                                        @if($prop->building_type == null) @else Building Type : {{ $prop->building_type }} | @endif
                                        @if($prop->farm_type == null) @else Farm Type : {{ $prop->farm_type }} | @endif
                                        @if($prop->open_house_only == null) @else Open House Only : {{ $prop->open_house_only }} | @endif
                                        @if($prop->number_of_units == null) @else Number of Units : {{ $prop->number_of_units }} | @endif
                                        @if($prop->land_size == null) @else Land Size : {{ $prop->land_size }} | @endif
                                        @if($prop->zoning_type == null) @else Zoning Type : {{ $prop->zoning_type }} | @endif
                                        @if($prop->building_size == null) @else Building Size : {{ $prop->building_size }} | @endif                         
                                    
                                        </p>

                                        <div class="row mt-3 justify-content-between">
                                            <div class="col-8">
                                                <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                            </div>
                                            <div class="col-3 text-end">
                                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        @endforeach                        

                    </div>

                    <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">

                        @foreach($com_properties as $key=> $prop)
                            @foreach(App\Models\FileManager::where('id',$prop->feature_image_id)->get() as $feature_image)
                            <div class="row border py-4 px-3 mb-4">
                                <div class="col-4">
                                    <img src="{{ url('images',$feature_image->file_name) }}" style="object-fit: cover; height:210px" width="100%" alt="" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <div class="ps-2">
                                        <div class="row">
                                            <h5 class="fw-bolder">{{$prop->name}}</h5>
                                        </div>
                                        <div class="row mt-3">

                                        @if($prop->main_category == 'Commercial')
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                                            </div>
                                        @else
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Residential</button>
                                            </div>
                                        @endif

                                            <div class="col-6">
                                                <p class="ns fw-bolder tab-price">Rs. {{number_format((float)$prop->price, 2)}} </p>
                                            </div>
                                        </div>
                                                    
                                                
                                        <p class="mt-4 mb-0" style="text-align: justify;"><b>{{$prop->name}}</b> - |

                                        @if($prop->baths == null) @else Baths : {{ $prop->baths }} | @endif
                                        @if($prop->beds == null) @else Beds : {{ $prop->beds }} | @endif
                                        @if($prop->parking_type == null) @else Parking Type : {{ $prop->parking_type }} | @endif
                                        @if($prop->building_type == null) @else Building Type : {{ $prop->building_type }} | @endif
                                        @if($prop->farm_type == null) @else Farm Type : {{ $prop->farm_type }} | @endif
                                        @if($prop->open_house_only == null) @else Open House Only : {{ $prop->open_house_only }} | @endif
                                        @if($prop->number_of_units == null) @else Number of Units : {{ $prop->number_of_units }} | @endif
                                        @if($prop->land_size == null) @else Land Size : {{ $prop->land_size }} | @endif
                                        @if($prop->zoning_type == null) @else Zoning Type : {{ $prop->zoning_type }} | @endif
                                        @if($prop->building_size == null) @else Building Size : {{ $prop->building_size }} | @endif                         
                                    
                                        </p>

                                        <div class="row mt-3 justify-content-between">
                                            <div class="col-8">
                                                <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                            </div>
                                            <div class="col-3 text-end">
                                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        @endforeach

                    </div> 

                    <div class="tab-pane fade" id="pills-residential" role="tabpanel" aria-labelledby="pills-residential-tab">

                        @foreach($res_properties as $key=> $prop)
                            @foreach(App\Models\FileManager::where('id',$prop->feature_image_id)->get() as $feature_image)
                            <div class="row border py-4 px-3 mb-4">
                                <div class="col-4">
                                    <img src="{{ url('images',$feature_image->file_name) }}" style="object-fit: cover; height:210px" width="100%" alt="" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <div class="ps-2">
                                        <div class="row">
                                            <h5 class="fw-bolder">{{$prop->name}}</h5>
                                        </div>
                                        <div class="row mt-3">

                                        @if($prop->main_category == 'Commercial')
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #83BE43; border-radius: 0.7rem;">Commercial</button>
                                            </div>
                                        @else
                                            <div class="col-2 p-2">
                                                <button class="btn text-white w-100" style="background-color: #4195E1; border-radius: 0.7rem;">Residential</button>
                                            </div>
                                        @endif

                                            <div class="col-6">
                                                <p class="ns fw-bolder tab-price">Rs. {{number_format((float)$prop->price, 2)}} </p>
                                            </div>
                                        </div>
                                                    
                                                
                                        <p class="mt-4 mb-0" style="text-align: justify;"><b>{{$prop->name}}</b> - |

                                        @if($prop->baths == null) @else Baths : {{ $prop->baths }} | @endif
                                        @if($prop->beds == null) @else Beds : {{ $prop->beds }} | @endif
                                        @if($prop->parking_type == null) @else Parking Type : {{ $prop->parking_type }} | @endif
                                        @if($prop->building_type == null) @else Building Type : {{ $prop->building_type }} | @endif
                                        @if($prop->farm_type == null) @else Farm Type : {{ $prop->farm_type }} | @endif
                                        @if($prop->open_house_only == null) @else Open House Only : {{ $prop->open_house_only }} | @endif
                                        @if($prop->number_of_units == null) @else Number of Units : {{ $prop->number_of_units }} | @endif
                                        @if($prop->land_size == null) @else Land Size : {{ $prop->land_size }} | @endif
                                        @if($prop->zoning_type == null) @else Zoning Type : {{ $prop->zoning_type }} | @endif
                                        @if($prop->building_size == null) @else Building Size : {{ $prop->building_size }} | @endif                         
                                    
                                        </p>

                                        <div class="row mt-3 justify-content-between">
                                            <div class="col-8">
                                                <p class="mt-2" style="text-align: justify;">For Viewing And Other Further Information Of The Apartment, Pleas... </p>
                                            </div>
                                            <div class="col-3 text-end">
                                                <a href="{{ route('frontend.individual-property', $prop->id) }}"><button class="btn border-1 border-dark rounded-0">MORE <i class="bi bi-chevron-double-right ms-1"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        @endforeach

                    </div>

                </div>

                

                <div class="row">
                    <div class="clearfix">
                        <div class="float-start">
                            <!-- <p style="color: #EFCAD8;">Showing page <span style="font-weight: 1000; color: #E88EAF;">1</span> of 7</p> -->
                        </div>
                        <div class="float-end">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                <!-- <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-chevron-left" style="color: #E88EAF;"></i></span>
                                    </a>
                                </li> -->
                                <!-- <li class="page-item active shadow-sm me-2"><a class="page-link" href="">1</a></li>
                                <li class="page-item shadow-sm me-2"><a class="page-link" href="#">2</a></li>
                                <li class="page-item shadow-sm me-2"><a class="page-link" href="">3</a></li> -->
                                {{ $all_properties->render() }}
                                <!-- <li class="page-item shadow-sm me-2">
                                    <a class="page-link" href="" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-chevron-right" style="color: #E88EAF;"></i></span>
                                    </a>
                                </li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('individual-agent') }}&quote=Check%20this%20agent%20:{{ url('individual-agent',$agent_details->id) }}" class="p-4 fs-3" style="color: #79CEEB; border: 2px solid #79CEEB;"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="col-3">
                    <a href="http://twitter.com/home?status=Check%20this%20agent%20{{ url('individual-agent',$agent_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="bi bi-twitter"></i></a>
                </div>
                <div class="col-3">
                    <a href="whatsapp://send?text=Check%20this%20agent%20:{{ url('individual-agent',$agent_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="bi bi-whatsapp"></i></a>
                </div>
                <div class="col-3">
                    <a href="sms:?body=Check%20this%20agent%20:%20{{ url('individual-agent',$agent_details->id) }}" class="p-4 fs-3" style="color: #7CCCD3; border: 2px solid #7CCCD3;"><i class="fas fa-sms"></i></a>
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