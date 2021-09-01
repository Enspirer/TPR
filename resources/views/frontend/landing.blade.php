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
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light" style="background-color: #2B3026">
        <div class="container">
            <a href="#"><img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo img-fluid rounded" alt=""></a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
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
<section id="map-section">
    <div class="container" style="margin-top: 7rem;">
        <div class="row justify-content-between">
            <h4 class="text-center mb-4 fw-bolder" style="color: #75CFED;">Select your preferred Tropical Region to view Properties</h4>
            <div class="col-3">
                <div class="countries">
                    @foreach($countries_data as $countryq)
                        <h6>
                            <a href="country/{{$countryq->country_id}}">{{$countryq->country_name}} </a>
                        </h6>
                    @endforeach
                </div>
            </div>

            <div class="col-9">
                <div id="mapdiv" style="width: 100%; height: 450px;"></div>
            </div>
        </div>
    </div>
</section>


<br><br><br><br>


@if(count($global_advertisement) !== 0)
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">
            @foreach($global_advertisement as $key => $advertisement)
            
            <div class="swiper-slide">
                <div class="container">
                    <div class="row">
                        <div class="col-6 p-1  text-center">
                        @if($advertisement->image !== null)
                            <a href="{{ $advertisement->link }}" style="text-decoration:none" target="_blank" >
                            <img src="{{url('files/global_advertisement/',$advertisement->image)}}" alt="...">
                            </a> 
                        @else
                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                            <h6 style="margin-top:130px; color:#808080;">Advertisement Are Not Found</h6>
                        </div>  
                        @endif
                        </div>
                        <div class="col-6 p-1">
                        @if($advertisement->large_right_image !== null)
                            <a href="{{ $advertisement->large_right_link }}" style="text-decoration:none" target="_blank">
                            <img src="{{url('files/global_advertisement/',$advertisement->large_right_image)}}" alt="...">
                            </a> 
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
                            <a href="{{ $advertisement->small_left_link }}" style="text-decoration:none" target="_blank" >
                            <img src="{{url('files/global_advertisement/',$advertisement->small_left_image)}}" alt="...">
                            </a>
                        @else
                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                        </div>  
                        @endif 
                        </div>
                        <div class="col-4 p-1">
                        @if($advertisement->small_middle_image !== null)
                            <a href="{{ $advertisement->small_middle_link }}" style="text-decoration:none" target="_blank">
                            <img src="{{url('files/global_advertisement/',$advertisement->small_middle_image)}}" alt="...">
                            </a> 
                        @else
                        <div style="border-style: dashed;border-width: 1px; height:100%;">
                            <h6 style="margin-top:80px; color:#808080;">Advertisement Are Not Found</h6>
                        </div>  
                        @endif 
                        </div>  
                        <div class="col-4 p-1">
                        @if($advertisement->small_right_image !== null)
                            <a href="{{ $advertisement->small_right_link }}" style="text-decoration:none" target="_blank">
                            <img src="{{url('files/global_advertisement/',$advertisement->small_right_image)}}" alt="...">
                            </a> 
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

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        
        <!-- <div class="swiper-pagination"></div> -->

    </div>

@endif    




<!-- featured properties -->
<section id="featured-properties">
    <div class="container" style="margin-top: 6rem; margin-bottom: 10rem;">
        
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
                            <div class="col-6">
                                <h5 class="mb-0">{{$country_list1->country_name}}</h5>
                            </div>
                            <div class="col-6 text-end">
                                <img src="{{url('https://www.countryflags.io/'.$country_list1->country_id.'/flat/64.png')}}" alt="" style="height: 50px;">
                            </div>
                        </div>                        

                        <div class="row mt-4">

                            @foreach(json_decode($country_list1->features_manager)[0]->properties as $key=> $prop)   
                                @if($key <= 2 )
                                    <div class="col-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                        <div class="card p-4 shadow border-0">
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
                            <div class="col-6">
                                <h5 class="mb-0">{{$country_list2->country_name}}</h5>
                            </div>
                            <div class="col-6 text-end">
                                <img src="{{url('https://www.countryflags.io/'.$country_list2->country_id.'/flat/64.png')}}" alt="" style="height: 50px;">
                            </div>
                        </div>                        

                        <div class="row mt-4">

                            @foreach(json_decode($country_list2->features_manager)[0]->properties as $key=> $prop)
                                @if($key <= 2 )
                                <div class="col-4 mt-3" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                                    <div class="card p-4 shadow border-0">
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
<section id="footer">
        <div class="container" style="margin-top:6rem;">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-3 ps-5">
                    <h5 class="fw-bolder mt-2">TITLES</h5>
                    <a href="{{ route('frontend.about-us') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list">About Us</a>
                    <a href="{{ route('frontend.contact') }}" class="mb-3 d-block text-decoration-none no-result-list">Contact Us</a>
                    <a href="{{ route('frontend.mobile-apps') }}" class="mb-3 d-block text-decoration-none no-result-list">Mobile Apps</a>
                </div>
                <div class="col-3 ps-5">
                    <h5 class="fw-bolder mt-2">MORE</h5>
                    <a href="{{ route('frontend.privacy-policy') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list">Privacy Policy</a>
                    <a href="{{ route('frontend.terms-of-use') }}" class="mb-3 d-block text-decoration-none no-result-list">Terms of Use</a>
                    <a href="#" class="mb-3 d-block text-decoration-none no-result-list">FAQ</a>
                    <a href="#" class="mb-3 d-block text-decoration-none no-result-list">Sitemap</a>
                </div>
                <div class="col-3 ps-5">
                    <h5 class="fw-bolder mt-2">TOPICS</h5>
                    <a href="{{ route('frontend.tips-for-buyers') }}" class="mt-4 mb-3 d-block text-decoration-none no-result-list">Tips for buyers</a>
                    <a href="{{ route('frontend.tips-for-sellers') }}" class="mb-3 d-block text-decoration-none no-result-list">Tips for sellers</a>
                    <a href="{{ route('frontend.commercial-resources') }}" class="mb-3 d-block text-decoration-none no-result-list">Commercial Resources</a>
                    
                </div>
            </div>
        </div>
    </section>


<!--copyright-->
<div id="copyright" style="margin-top:4rem;">
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="row py-3 align-items-center">
                <div class="col-6">
                    <p class="text-white mb-0">Created by Enspirer &copy; All Rights Reserved.</p>
                </div>
                <div class="col-6 text-white text-end">
                    <a href="#"><img src="{{ asset('tpr_templete/images/fb.svg') }}" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="{{ asset('tpr_templete/images/twitter.svg') }}" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="{{ asset('tpr_templete/images/google_plus.svg') }}" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="{{ asset('tpr_templete/images/instagram.svg') }}" alt="" class="img-fluid me-2"></a>
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
<script src="https://www.amcharts.com/lib/3/ammap.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>

<script>
    var map = AmCharts.makeChart("mapdiv",{
        type: "map",
        theme: "dark",
        projection: "mercator",
        panEventsEnabled : true,
        backgroundColor : "#FFFFFF",
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
            color : "#B4B4B7",
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
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>




</body>
</html>