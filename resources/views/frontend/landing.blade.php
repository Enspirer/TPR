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

    <title>Tropical - Landing</title>
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
                        <a class="nav-link text-white fw-bold" href="#">TITLE</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a class="nav-link text-white fw-bold" href="#">TITLE</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
                        <a class="nav-link text-white fw-bold" href="#">TITLE</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                        <a class="nav-link text-white fw-bold" href="#">TITLE</a>
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



<!-- tabs -->
<sections id="tabs">
    <div class="container" style="margin-top: 7rem;">

        <ul class="nav mb-3" id="tab" role="tablist">
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link active border-0 bg-light" id="tabs-all-tab" data-bs-toggle="tab" data-bs-target="#tabs-all" type="button" role="tab" aria-controls="tabs-all" aria-selected="true"><img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-airlines-tab" data-bs-toggle="tab" data-bs-target="#tabs-airlines" type="button" role="tab" aria-controls="tabs-airlines" aria-selected="true"> <img src="{{url('tpr_templete/images/airlines_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>AIRLINES</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-fashion-tab" data-bs-toggle="tab" data-bs-target="#tabs-fashion" type="button" role="tab" aria-controls="tabs-fashion" aria-selected="true"> <img src="{{url('tpr_templete/images/fashion_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>FASHION</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-home-tab" data-bs-toggle="tab" data-bs-target="#tabs-home" type="button" role="tab" aria-controls="home" aria-selected="true"> <img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-home-tab" data-bs-toggle="tab" data-bs-target="#tabs-home" type="button" role="tab" aria-controls="home" aria-selected="true"> <img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-home-tab" data-bs-toggle="tab" data-bs-target="#tabs-home" type="button" role="tab" aria-controls="home" aria-selected="true"> <img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-home-tab" data-bs-toggle="tab" data-bs-target="#tabs-home" type="button" role="tab" aria-controls="home" aria-selected="true"> <img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
            <li class="nav-item text-center mx-3 shadow-sm" role="presentation">
                <button class="nav-link border-0 bg-light" id="tabs-home-tab" data-bs-toggle="tab" data-bs-target="#tabs-home" type="button" role="tab" aria-controls="home" aria-selected="true"> <img src="{{url('tpr_templete/images/hotel_icon.svg')}}" alt="" class="img-fluid"></button>
                <h5>HOTEL</h5>
            </li>
        </ul>

        <div class="tab-content mt-5" id="pills-tabContent">

            <div class="tab-pane fade show active" id="tabs-all" role="tabpanel" aria-labelledby="tabs-all-tab">
                <div class="row">
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_1.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_2.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_3.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_4.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_5.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tabs-airlines" role="tabpanel" aria-labelledby="tabs-airlines-tab">

                <div class="row">
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_3.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_4.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_5.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_1.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_2.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="tabs-fashion" role="tabpanel" aria-labelledby="tabs-fashion-tab">

                <div class="row">
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_1.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 p-1">
                        <img src="{{url('tpr_templete/images/landing_2.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_3.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_4.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 p-1">
                        <img src="{{url('tpr_templete/images/landing_5.png')}}" alt="" class="img-fluid">
                    </div>
                </div>

            </div>

        </div>

    </div>
</sections>



<!-- featured properties -->
<section id="featured-properties">
    <div class="container" style="margin-top: 6rem; margin-bottom: 10rem;">
        <h3 class="fw-bolder text-center">Featured Properties Around the world</h3>

        <div class="1strow mt-4">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="mb-0">Sri Lanka</h5>
                </div>
                <div class="col-6 text-end">
                    <img src="{{url('tpr_templete/images/sri_lanka_flag.svg')}}" alt="" style="height: 30px;">
                </div>
            </div>

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

        <div class="1strow" style="margin-top: 6rem;">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="mb-0">Malaysia</h5>
                </div>
                <div class="col-6 text-end">
                    <img src="{{url('tpr_templete/images/malaysia_flag.svg')}}" alt="" style="height: 30px;">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-4" data-aos="flip-right" data-aos-duration="500" data-aos-delay="200">
                    <div class="card p-4 shadow border-0">
                        <img src="{{url('tpr_templete/images/malaysia_1.svg')}}" class="card-img-top" alt="...">
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
                        <img src="{{url('tpr_templete/images/malaysia_2.svg')}}" class="card-img-top" alt="...">
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
                        <img src="{{url('tpr_templete/images/malaysia_3.svg')}}" class="card-img-top" alt="...">
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


<!--footer-->
<section id="footer">
    <div class="container" style="margin-top:6rem;">
        <div class="row">
            <div class="col-3" data-aos="fade-up" data-aos-duration="500">
                <img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-3 ps-5" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                <h5 class="fw-bolder mt-2">TITLES</h5>
                <p class="mt-4">About Us</p>
                <p>Contact Us</p>
                <p>Mobile Apps</p>
            </div>
            <div class="col-3 ps-5" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
                <h5 class="fw-bolder mt-2">MORE</h5>
                <p class="mt-4">Privacy Policy</p>
                <p>Terms of Use</p>
                <p>FAQ</p>
                <p>Sitemap</p>
            </div>
            <div class="col-3 ps-5" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
                <h5 class="fw-bolder mt-2">TOPICS</h5>
                <p class="mt-4">Tips for buyers</p>
                <p>Tips for sellers</p>
                <p>Commercial Resources</p>
                <p>Property for Sale</p>
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
                    <a href="#"><img src="images/fb.svg" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="images/twitter.svg" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="images/goolgle_plus.svg" alt="" class="img-fluid me-2"></a>
                    <a href="#"><img src="images/instagram.svg" alt="" class="img-fluid me-2"></a>
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




</body>
</html>