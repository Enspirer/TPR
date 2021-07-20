<section id="index-navbar">
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light" style="background-color: #4195E1">
        <div class="container">
            <div class="row logo-flag">
                <div class="col-9">
                    <a href="{{route('frontend.home_page','sri-lanka')}}"><img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo img-fluid rounded" alt=""></a>
                </div>
                <div class="col-2">
                    <a href="#">
                        @if(isset($country_id))
                            <img src="https://www.countryflags.io/{{$country_id}}/flat/64.png" alt="" class="flag img-fluid"></a>
                        @else

                        @endif
                </div>
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav">
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500">
                        <a class="nav-link text-white fw-bold" href="map-search.html">Map Search</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a class="nav-link text-white fw-bold" href="find-agent.html">Find Agent</a>
                    </li>
                    <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
                        <a class="nav-link text-white fw-bold" href="#">Market Trends</a>
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
                                <a class="dropdown-item text-light" href="profile-settings.html">My Account</a>
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

    <div class="container-fluid p-0 second-nav bg-light">
        <nav class="container navbar navbar-expand-lg bg-light navbar-light">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav2">
                <ul class="navbar-nav">
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                        <a class="nav-link text-body fw-bold" href="residential.html">Residential</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">
                        <a class="nav-link text-body fw-bold" href="#">Commercial</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="600">
                        <a class="nav-link text-body fw-bold" href="#">New Homes</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="700">
                        <a class="nav-link text-body fw-bold" href="#">Text</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item contact" data-aos="fade-left" data-aos-duration="500" data-aos-delay="800" style="padding-left : 3rem">
                        <a class="nav-link text-body fw-bold" href="contact-us.html">Contact Us</a>
                        <div class="line"></div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>