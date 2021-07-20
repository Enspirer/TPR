<section id="index-navbar">
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light" style="background-color: #4195E1">
        <div class="container">
            <div class="row logo-flag">
                <div class="col-9">
                    <a href="{{route('frontend.home_page',['sri-lanka','LKR'])}}"><img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo img-fluid rounded" alt=""></a>
                </div>
                <div class="col-2">
                    <a href="#">
                        <img src="{{url('tpr_templete/images/sri_lanka_flag.svg')}}" alt="" class="flag img-fluid"></a>
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
                        <li class="nav-item nav1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                            <a class="nav-link text-white fw-bold" href="{{route('frontend.auth.login')}}">{{auth()->user()->first_name}} <i class="bi bi-person-check"></i></a>
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