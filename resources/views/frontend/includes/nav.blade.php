<section id="index-navbar">
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light" style="background-color: #4195E1">
        <div class="container">
            <div class="row logo-flag">
                <div class="col-9">

                    @if(get_country_cookie(request()))
                    <a href="{{route('frontend.home_page',get_country_cookie(request())->country_id)}}"><img
                            src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo img-fluid rounded"
                            alt=""></a>

                    @else

                    <img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo img-fluid rounded" alt=""
                        data-bs-toggle="modal" data-bs-target="#countrySelection" style="cursor:pointer;">

                    @endif

                </div>
                <div class="col-3">
                    <a href="{{ route('frontend.landing') }}">
                        <div class="globe row align-items-center">
                            <div class="col-4 p-0">
                                <i class="bi bi-arrow-left me-1" style="font-size: 0.7rem;"></i>
                                <img src="{{ url('img/globe.png') }}" alt="" style="height: 1.3rem;">
                            </div>
                            <div class="col-8 p-0">
                                <p class="mb-0" style="font-size: 0.8rem; color: #0071BC;">Tropical World</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500">
                        <a class="nav-link text-white fw-bold {{ Request::segment(1) == 'map-search' ? 'active' : null }}"
                            href="{{ route('frontend.map-search' )}}">Find a Home</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a class="nav-link text-white fw-bold {{ Request::segment(1) == 'find-agent' ? 'active' : null }}"
                            href="{{ route('frontend.find-agent', ['area', 'agent_type', 'agent_name'] )}}">Find
                            Agent</a>

                        <div class="line"></div>
                    </li>



                    <li class="nav-item contact" data-aos="fade-left" data-aos-duration="500" data-aos-delay="800">

                        <div class="dropdown">
                            <a class="btn dropdown-toggle text-light fw-bold" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Idea & How To
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{route('frontend.blog')}}">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                Living Room Blog
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('frontend.tips-for-buyers')}}">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                Tips for Buyers
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('frontend.tips-for-sellers')}}">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                Tips for Sellers
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    @auth
                    <!-- <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                            <a class="nav-link text-white fw-bold" href="{{route('frontend.auth.login')}}">{{auth()->user()->first_name}} <i class="bi bi-person-check"></i></a>
                        </li> -->
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                        <a class="nav-link dropdown-toggle" href="{{route('frontend.auth.login')}}"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                width="30" height="30" class="rounded-circle me-2"> <span
                                class="text-white fw-bold user-name">{{auth()->user()->first_name}}</span>
                        </a>
                        <div class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink"
                            style="background-color: #4195E1">
                            <a class="dropdown-item text-light" href="{{ route('frontend.user.dashboard') }}">My
                                Account</a>
                            <a class="dropdown-item text-light" href="{{ route('frontend.user.account-dashboard') }}">My
                                Settings</a>
                            <a class="dropdown-item text-light" href="{{route('frontend.auth.logout')}}">Log Out</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                        <a class="nav-link text-white fw-bold {{ Request::segment(1) == 'login' ? 'active' : null }}"
                            href="{{route('frontend.auth.login')}}">Login <i class="bi bi-person-check"></i></a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item join" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400"
                        >
                        <a class="nav-link text-white fw-bold {{ Request::segment(1) == 'register' ? 'active' : null }}"
                            href="{{route('frontend.auth.register')}}">Join <i class="bi bi-person-plus"></i></a>
                           
                        <div class="line"></div>
                    </li>
                    @endauth
                   
                </ul>
            </div>

                <!-- post ad -->
                <a class="post-ad-btn" href="" data-toggle="modal" data-target="#adModal">Post Ad</a>

                <!-- language bar -->
                <a href="" style="width:max-content;display:flex;flex-direction:column;text-decoration:none;justify-content:center;align-items:center;"data-toggle="modal" data-target="#langModal">
                <i style="font-size:20px;color:#fff;padding:0 !important;" class="fas fa-language"></i>
                <span style="display:inline-flex;font-size:12px;color:#fff;">Translate</span>
                </a>
            

        </div>
    </nav>

    <div class="container-fluid p-0 second-nav bg-light">
        <nav class="container navbar navbar-expand-lg bg-light navbar-light">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav2">
                <ul class="navbar-nav align-items-center" style="align-items:center;">
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                        <a class="nav-link text-body fw-bold {{ Request::segment(5) == 'residential' ? 'active' : null }}"
                            href="{{ route('frontend.search_function', ['key_name', 'min_price', 'max_price', 'residential', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">Residential</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">
                        <a class="nav-link text-body fw-bold {{ Request::segment(5) == 'commercial' ? 'active' : null }}"
                            href="{{ route('frontend.search_function', ['key_name', 'min_price', 'max_price', 'commercial', 'transaction_type', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">Commercial</a>
                        <div class="line"></div>
                    </li>
                    <!-- <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="600">
                        <a class="nav-link text-body fw-bold" href="#">New Homes</a>
                        <div class="line"></div>
                    </li> -->
                    <li class="nav-item nav2 contact" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                        @if(isset(get_country_cookie(request())->country_id))
                        @if(isset(get_country_cookie(request())->country_id))
                        <a class="nav-link text-body fw-bold {{ Request::segment(3) == 'contact' ? 'active' : null }}"
                            href="{{ route('frontend.contact', get_country_cookie(request())->country_id) }}">Contact
                            Us</a>
                        <div class="line"></div>
                        @endif
                        @endif
                    </li>
                    <li class="nav-item contact" data-aos="fade-left" data-aos-duration="500" data-aos-delay="800">
                        <!-- @if(isset(get_country_cookie(request())->country_id))
                            @if(get_country_cookie(request())->country_id)
                                <p class="mb-0 nav-link text-body fw-bold" data-bs-toggle="modal" data-bs-target="#countrySelection" title="{{ App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->country_name }}" style="cursor: pointer;">{{ App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->country_name }}
                                    
                                    <img src="https://www.countryflags.io/{{get_country_cookie(request())->country_id}}/flat/64.png" alt="" class="flag img-fluid">

                                </p>

                                <p class="d-none">{{get_country_cookie(request())->country_id}}</p>
                            @else

                            @endif
                        @else

                        @endif -->
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if(isset(get_country_cookie(request())->country_id))
                                @if(get_country_cookie(request())->country_id)

                                {{ App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->country_name }}

                                <img src="https://flagcdn.com/w40/{{strtolower(get_country_cookie(request())->country_id)}}.png"
                                    alt="">

                                <p class="d-none">{{get_country_cookie(request())->country_id}}</p>
                                @else

                                @endif
                                @else
                                <button class="btn">Select Country</button>

                                @endif
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                @foreach($tpr_countries as $tpr_country)
                                <li>
                                    @if(isset(get_country_cookie(request())->country_id))
                                    <a class="dropdown-item"
                                        href="{{ route('frontend.home_page', $tpr_country->country_id) }}">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                {{ $tpr_country->country_name }}
                                            </div>
                                            <div class="col-6 text-end">
                                                <img src="https://flagcdn.com/w40/{{strtolower($tpr_country->country_id)}}.png"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </a>

                                    @else

                                    <a class="dropdown-item"
                                        href="{{ route('frontend.country_change', $tpr_country->country_id) }}">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                {{ $tpr_country->country_name }}
                                            </div>
                                            <div class="col-6 text-end">
                                                <img src="https://flagcdn.com/w40/{{strtolower($tpr_country->country_id)}}.png"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </a>

                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <!-- icons bar -->
                    <div class="icons-bar">
                        <div class="icon-wrapper">
                            <i class="fas fa-bell" style="color:#82bf3e;"></i>
                        </div>
                        <div class="icon-wrapper heart-wrapper">
                            @if(!empty( auth()->user()->id) === true)
                                <a href="{{route('frontend.user.search_history')}}">
                                <i class="fas fa-bookmark" style="color:#4195e1;"></i>                         
                                    <div class="counter-wrapper">
                                        <p id="heartCounter">                                        
                                            {{App\Models\UserSearch::where('user_id',auth()->user()->id)->get()->count()}}
                                        </p>
                                    </div>
                                </a>
                            @else
                                <a href="{{route('frontend.auth.login')}}">
                                <i class="fas fa-bookmark" style="color:#4195e1;"></i>      
                                </a>
                            @endif
                        </div>
                        <div class="icon-wrapper heart-wrapper">
                            @if(!empty( auth()->user()->id) === true)
                            <a href="{{route('frontend.user.favourites')}}">
                                <i class="fas fa-heart" style="color:red;"></i>
                                <div class="counter-wrapper">
                                    <p id="heartCounter">
                                        {{App\Models\Favorite::where('user_id',auth()->user()->id)->get()->count()}}
                                    </p>
                                </div>
                            </a>
                            @else
                            <a href="{{route('frontend.auth.login')}}">
                                <i class="fas fa-heart" style="color:red;"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</section>




<!-- country selection model -->

<!-- Modal -->
<div class="modal fade nav-modal" id="countrySelection" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                <div>
                    @foreach($tpr_countries as $tpr_country)
                    <a href="{{ route('frontend.country_change', $tpr_country->country_id) }}"
                        class="text-decoration-none h6 text-dark">
                        <div class="row align-items-center mb-3">
                            <div class="col-6">
                                {{ $tpr_country->country_name }}
                            </div>
                            <div class="col-6 text-end">
                                <img src="https://flagcdn.com/w40/{{strtolower($tpr_country->country_id)}}.png" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>



@push('after-scripts')
<script>
// $('.first-nav .nav-item').on('mouseenter', function(){
//     $(this).children('.nav-link').addClass('nav-hover');
// }).on('mouseleave', function() {
//     $(this).children('.nav-link').removeClass('nav-hover');
// });


$('.nav-item').on('mouseenter', function() {
    $(this).children('.line').css({
        'visibility': 'visible',
        'width': '100%'
    });
}).on('mouseleave', function() {
    $(this).children('.line').css({
        'visibility': 'hidden',
        'width': '0'
    });
});
</script>
<script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }

    </script>

<script>
    
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 


@endpush