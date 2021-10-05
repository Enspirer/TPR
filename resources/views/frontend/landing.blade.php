<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/styles.css')}}"></link>
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/landing.css')}}"></link>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <title>Tropical - Landing</title>

    <style>
  
      .swiper-container {
        width: 80%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>

</head>
<body>

<!-- navbar -->
<section id="index-navbar">
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light" style="background-color: #4195E1">
        <div class="container">
            <a href="#"><img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo-landing img-fluid rounded" alt=""></a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500">
                        <a class="nav-link text-white fw-bold" href="#">Home</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a class="nav-link text-white fw-bold" href="{{ route('frontend.about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
                        <a class="nav-link text-white fw-bold" href="{{ route('frontend.contact') }}">Contact Us</a>
                    </li>
                    @auth
                        <!-- <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                            <a class="nav-link text-white fw-bold" href="{{route('frontend.auth.login')}}">{{auth()->user()->first_name}} <i class="bi bi-person-check"></i></a>
                        </li> -->
                        <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                            <a class="nav-link dropdown-toggle" href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30" class="rounded-circle me-2"> <span class="text-white fw-bold user-name">{{auth()->user()->first_name}}</span>
                              </a>
                              <div class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink" style="background-color: #4195E1">
                                <a class="dropdown-item text-light" href="{{ route('frontend.user.dashboard') }}">My Account</a>
                                <a class="dropdown-item text-light" href="#">My Settings</a>
                                <a class="dropdown-item text-light" href="#">My Notification Settings</a>
                                <a class="dropdown-item text-light" href="{{route('frontend.auth.logout')}}">Log Out</a>
                              </div>
                        </li>
                    @else
                        <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                            <a class="nav-link text-white fw-bold" href="{{route('frontend.auth.login')}}">Login <i class="bi bi-person-check"></i></a>
                        </li>
                        <li class="nav-item join" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400" style="padding-left : 2rem">
                            <a class="nav-link text-white fw-bold" href="{{route('frontend.auth.register')}}">Join <i class="bi bi-person-plus"></i></a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</section>



<!-- map -->
<section id="map-section" class="map-banner">
    <div class="container" style="margin-top: 7rem;">
        <div class="row justify-content-between">
            
            
            <div class="col-3 position-relative">
                <div class="p-3" style="background: rgb(0,0,0, 0.6)">
                    <h5 class="fw-bold text-white mb-0">Tropical Regions</h5>
                </div>
                <div class="map-ban"></div>
                <div class="map-ban1"></div>
                <div class="countries position-absolute" style="top: 75px; left: 30px;">
                    
                    @foreach($countries_data as $countryq)
                        <h6>
                            <a href="country/{{$countryq->country_id}}">{{$countryq->country_name}} </a>
                        </h6>
                    @endforeach
                </div>
            </div>

            <div class="col-9 position-relative">
                <div class="map-large-ban"></div>
                <div class="map-large-ban1"></div>
                <h5 class="text-center text-white" style="width: 100%; height: 400px; position: absolute; top: 15px;">Select your preferred Tropical Region to view Properties</h5>
                <div id="mapdiv" style="width: 97.3%; height: 394px; position: absolute; top: 55px;"></div>
            </div>
        </div>
    </div>
</section>



@if(count($global_advertisement) !== 0)

    <ul class="nav mb-3 justify-content-center mt-5" id="projects-tab" role="tablist">
        <li class="nav-item landing-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
            <a class="nav-link active tabs" id="all-tab" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true">ALL</a>
        </li> 

        @foreach($global_categories as $key => $global_category)

            @if(App\Models\GlobalAdvertisement::where('global_category',$global_category->id)->first() == null)

            @else

                <li class="nav-item landing-item" role="presentation" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                    <a class="nav-link tabs text-uppercase" id="tab-id{{ $global_category->id }}" data-bs-toggle="tab" data-bs-target="#tab{{ $global_category->id }}" type="button" role="tab" aria-controls="tab-{{ $global_category->id }}" aria-selected="false">{{ $global_category->name }}</a>
                </li>   

            @endif
                    
        @endforeach
        

    </ul>

    <div class="tab-content mt-2 py-4" id="tabs-tabContent">

        <div class="tab-pane fade show active position-relative" id="tab-all" role="tabpanel" aria-labelledby="all-tab">
            <div class="swiper container mySwiper">
                <div class="swiper-wrapper">
                    @foreach($global_advertisement as $key => $advertisement)
                    
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 p-1 text-center">
                                @if($advertisement->image !== null)
                                    <img src="{{url('files/global_advertisement/',$advertisement->image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                    <input type="hidden" value="{{$advertisement->link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif
                                </div>
                                <div class="col-6 p-1">
                                @if($advertisement->large_right_image !== null)
                                    <img src="{{url('files/global_advertisement/',$advertisement->large_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                    <input type="hidden" value="{{$advertisement->large_right_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->large_right_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                </div> 
                                @endif
                                </div>                  
                            </div>
                            <div class="row">
                                <div class="col-4 p-1">
                                @if($advertisement->small_left_image !== null)
                                    <img src="{{url('files/global_advertisement/',$advertisement->small_left_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                    <input type="hidden" value="{{$advertisement->small_left_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_left_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>
                                <div class="col-4 p-1">
                                @if($advertisement->small_middle_image !== null)
                                    <img src="{{url('files/global_advertisement/',$advertisement->small_middle_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                    <input type="hidden" value="{{$advertisement->small_middle_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_middle_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>  
                                <div class="col-4 p-1">
                                @if($advertisement->small_right_image !== null)
                                    <img src="{{url('files/global_advertisement/',$advertisement->small_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                    <input type="hidden" value="{{$advertisement->small_right_link}}" class="ad-link">
                                    <input type="hidden" value="{{$advertisement->small_right_description}}" class="ad-description">
                                @else
                                <div style="border-style: dashed;border-width: 1px; height:100%;">
                                    <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                </div>  
                                @endif 
                                </div>                   
                            </div>
                        </div>
                        
                        <!-- <a href="{{ $advertisement->link }}" style="text-decoration:none" target="_blank" class="w-100">
                            <img src="{{url('files/global_advertisement/',$advertisement->image)}}" alt="...">
                        </a>  -->
                    </div>

                    @endforeach
                </div>
                
            </div>
            <div class="swiper-pagination sp-1" style="bottom: -30px;"></div>
        </div>
    
        

        @foreach($global_categories as $key => $global_category)
            <div class="tab-pane fade" id="tab{{ $global_category->id }}" role="tabpanel" aria-labelledby="tab-id{{ $global_category->id }}">
                <div class="swiper container mySwiper2 position-relative">
                    <div class="swiper-wrapper">                                     
                    
                        @foreach(App\Models\GlobalAdvertisement::where('global_category', $global_category->id)->where('status','=','1')->orderBy('order','ASC')->get() as $data)

                            <div class="swiper-slide">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 p-1  text-center">
                                        @if($advertisement->image !== null)
                                            <img src="{{url('files/global_advertisement/', $data->image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                            <input type="hidden" value="{{$advertisement->link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif
                                        </div>
                                        <div class="col-6 p-1">
                                        @if($advertisement->large_right_image !== null)
                                            <img src="{{url('files/global_advertisement/',$data->large_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                            <input type="hidden" value="{{$advertisement->large_right_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->large_right_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div> 
                                        @endif
                                        </div>                  
                                    </div>
                                    <div class="row">
                                        <div class="col-4 p-1">
                                        @if($advertisement->small_left_image !== null)
                                            <img src="{{url('files/global_advertisement/',$data->small_left_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                            <input type="hidden" value="{{$advertisement->small_left_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_left_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>
                                        <div class="col-4 p-1">
                                        @if($advertisement->small_middle_image !== null)
                                            <img src="{{url('files/global_advertisement/',$data->small_middle_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                            <input type="hidden" value="{{$advertisement->small_middle_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_middle_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>  
                                        <div class="col-4 p-1">
                                        @if($advertisement->small_right_image !== null)
                                            <img src="{{url('files/global_advertisement/',$data->small_right_image)}}" alt="..." data-bs-toggle="modal" data-bs-target="#ad-modal">
                                            <input type="hidden" value="{{$advertisement->small_right_link}}" class="ad-link">
                                            <input type="hidden" value="{{$advertisement->small_right_description}}" class="ad-description">
                                        @else
                                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                                        </div>  
                                        @endif 
                                        </div>                   
                                    </div>
                                </div>
                            </div>  

                        @endforeach                                                                        
                        
                    </div>
                </div>
                <div class="swiper-pagination sp-2" style=""></div>
            </div>
        @endforeach
    </div>
@endif   



<!-- Ad Modal -->
<div class="modal fade" id="ad-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <img src="" alt="" id="modal-ad-img" class="img-fluid w-100" style="object-fit: cover; height: 20rem">
                <!-- <input name="description" id="modal-ad-description" class="form-control mt-3"></input> -->
                <p class="mt-3" id="modal-ad-description" style="text-align: justify;"></p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="" type="button" class="btn btn-primary" id="modal-ad-link" target="_blank">More Details</a>
      </div>
    </div>
  </div>
</div>




<!-- featured properties -->
<section id="featured-properties">
    <div class="container" style="margin-top: 6rem;">
        
        @if(($country_list1 && $country_list2) == null)
        @else
        <h3 class="fw-bolder text-center">
            Featured Properties Around the world
        </h3> 
        @endif
        
            @if($country_list1 != null)
                @if(json_decode($country_list1->features_manager)[0]->properties != null)
                    <div class="1strow mt-4">
                        <div class="row align-items-center">
                            <div class="col-1 pe-0">
                                <img src="{{url('https://www.countryflags.io/'.$country_list1->country_id.'/flat/64.png')}}" alt="" style="height: 50px;">
                            </div>
                            <div class="col-2 ps-0">
                                <h5 class="mb-0">{{$country_list1->country_name}}</h5>
                            </div>
                        </div>                        

                        <div class="row mt-3">

                            @foreach(json_decode($country_list1->features_manager)[0]->properties as $key=> $prop)   
                                @if($key <= 2 )
                                    <div class="col-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                        <div class="card p-4 border-0 custom-shadow">
                                            <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top" alt="..." style="object-fit:cover; height: 210px;"></a>
                                            <div class="card-body mt-4">
                                                <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->city }}, {{ App\Models\Properties::where('id', $prop)->first()->country }}</h5>                                   
                                                <p class="mt-1 text-info">$ {{ App\Models\Properties::where('id', $prop)->first()->price }}</p>
                                            </div>
                                        </div>
                                    </div>                            
                                @else
                                @endif                                
                            @endforeach

                        </div>                        
                    </div>
                @endif  
            @endif               

            @if($country_list2 != null)
                @if(json_decode($country_list2->features_manager)[0]->properties != null)
                    <div class="1strow" style="margin-top: 6rem;">
                        <div class="row align-items-center">
                            <div class="col-1 pe-0">
                                <img src="{{url('https://www.countryflags.io/'.$country_list2->country_id.'/flat/64.png')}}" alt="" style="height: 50px;">
                            </div>
                            <div class="col-2 ps-0">
                                <h5 class="mb-0">{{$country_list2->country_name}}</h5>
                            </div>
                        </div>                        

                        <div class="row mt-3">

                            @foreach(json_decode($country_list2->features_manager)[0]->properties as $key=> $prop)
                                @if($key <= 2 )
                                <div class="col-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                    <div class="card p-4 border-0 custom-shadow">
                                        <a href="{{ route('frontend.individual-property', $prop) }}"><img src="{{url('image_assest', App\Models\Properties::where('id', $prop)->first()->feature_image_id)}}" class="card-img-top" alt="..." style="object-fit:cover; height: 210px;"></a>
                                        <div class="card-body mt-4">
                                            <h5 class="card-title">{{ App\Models\Properties::where('id', $prop)->first()->city }}, {{ App\Models\Properties::where('id', $prop)->first()->country }}</h5>                                   
                                            <p class="mt-1 text-info">$ {{ App\Models\Properties::where('id', $prop)->first()->price }}</p>
                                        </div>
                                    </div>
                                </div> 
                                @else
                                @endif                             
                            @endforeach

                        </div>                        
                    </div>
                @endif
            @endif



    </div>
</section>


<!--footer-->
<section class="container-fluid pt-5 pb-3 text-white" id="footer" style="background-color: #1B1B3A; margin-top:7rem;">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid" alt="" style="height: 4rem;">
            </div>
            <div class="col-3 ps-5">
                <h5 class="fw-bolder mt-2">TITLES</h5>
                <a href="{{ route('frontend.about-us') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list text-white">About Us</a>
                <a href="{{ route('frontend.contact') }}" class="mb-3 d-block text-decoration-none no-result-list text-white">Contact Us</a>
                <a href="{{ route('frontend.mobile-apps') }}" class="mb-3 d-block text-decoration-none no-result-list text-white">Mobile Apps</a>
            </div>
            <div class="col-3 ps-5">
                <h5 class="fw-bolder mt-2">MORE</h5>
                <a href="{{ route('frontend.privacy-policy') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list text-white">Privacy Policy</a>
                <a href="{{ route('frontend.terms-of-use') }}" class="mb-3 d-block text-decoration-none no-result-list text-white">Terms of Use</a>
                <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">FAQ</a>
                <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">Sitemap</a>
            </div>
            <div class="col-3 ps-5">
                <h5 class="fw-bolder mt-2">TOPICS</h5>
                <a href="{{ route('frontend.tips-for-buyers') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list text-white">Tips for buyers</a>
                <a href="{{ route('frontend.tips-for-sellers') }}" class="mb-3 d-block text-decoration-none no-result-list text-white">Tips for sellers</a>
                <a href="{{ route('frontend.commercial-resources') }}" class="mb-3 d-block text-decoration-none no-result-list text-white">Commercial Resources</a>
                <a href="#"><img src="{{ asset('tpr_templete/images/fb.svg') }}" alt="" class="img-fluid me-2" style="height:1.4rem;"></a>
                <a href="#"><img src="{{ asset('tpr_templete/images/twitter.svg') }}" alt="" class="img-fluid me-2" style="height:1.4rem;"></a>
                <a href="#"><img src="{{ asset('tpr_templete/images/google_plus.svg') }}" alt="" class="img-fluid me-2" style="height:1.4rem;"></a>
                <a href="#"><img src="{{ asset('tpr_templete/images/instagram.svg') }}" alt="" class="img-fluid me-2" style="height:1.4rem;"></a>
                
            </div>
        </div>
    </div>
</section>


<!--copyright-->
<div id="copyright">
    <div class="container-fluid" style="background-color: #E293AC;">
        <div class="container">
            <div class="row py-3 align-items-center">
                <div class="col-6">
                    <p class="text-white mb-0">All Rights Reserved</p>
                </div>
                <div class="col-6 text-end">
                    <p class="text-white mb-0">Powered by <a href="https://www.enspirer.com" class="text-white text-decoration-none">Enspirer</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script src="scripts/map.js"></script> -->
<script src="{{url('tpr_templete/scripts/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script> -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="{{url('js/ammap.js')}}" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>

<script>
    var map = AmCharts.makeChart("mapdiv",{
        type: "map",
        theme: "dark",
        projection: "mercator",
        panEventsEnabled : true,
        backgroundColor : "#ff000000",
        backgroundAlpha : 1,
        zoomControl: {
            zoomControlEnabled : true,
        },
        dataProvider : {
            map : "worldHigh",
            getAreasFromMap : true,
            areas :
                [
                    @foreach($countries_data as $countryq)
                    {
                        "id" : "{{$countryq->country_id}}",
                        "url" : "country/{{$countryq->country_id}}",
                        "title" : "{{$countryq->country_name}} - 0 properties",
                        "color" : "#009933",
                        "rollOverColor" : "#75CFED"
                    },
                    @endforeach
                ]
        },
        areasSettings : {
            autoZoom : true,
            selectedColor : "#B4B4B7",
            color : "#FFFFFF",
            colorSolid : "#84ADE9",
            outlineColor : "#707070",
            rollOverColor : "#B4B4B7",
            rollOverOutlineColor : "#B4B4B7",
        },
        "mouseWheelZoomEnabled": true
    });
</script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        // loop: true,
        pagination: {
          el: ".sp-1",
          clickable: true,
        },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
      });
    </script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 30,
        // loop: true,
        pagination: {
          el: ".sp-2",
          clickable: true,
        },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
      });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        setTimeout(function(){

            $('.amcharts-chart-div').find('a').addClass('hide-map-text');

        }, 2000);
        
    });
</script>


<script>
    $('.nav-item').on('mouseenter', function(){
            $(this).children('.nav-link').addClass('nav-hover');
        }).on('mouseleave', function() {
            $(this).children('.nav-link').removeClass('nav-hover');
        });
</script>


        <script>
            $('.swiper-slide img').on('click', function() {
                let img = $(this).attr('src');
                let link = $(this).next().val();
                let description = $(this).siblings('.ad-description').val();

                $('#modal-ad-img').attr('src', img);
                $('#modal-ad-link').attr('href', link);
                $('#modal-ad-description').text(description);

                
            });
        </script>
</body>
</html>