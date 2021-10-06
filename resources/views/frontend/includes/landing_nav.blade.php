<section id="index-navbar">
    <nav class="navbar fixed-top first-nav navbar-expand-lg navbar-light landing_nav" style="background-color: #4195E1">
        <div class="container">
            <a href="{{ route('frontend.landing') }}"><img src="{{url('tpr_templete/images/tropical_logo.svg')}}" class="logo-landing img-fluid rounded" alt=""></a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav1">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item nav1 mx-2" data-aos="fade-left" data-aos-duration="500">
                        <a class="nav-link text-white fw-bold p-0" href="{{ route('frontend.landing') }}">Home</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav1 mx-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="100">
                        <a class="nav-link text-white fw-bold p-0" href="{{ route('frontend.about-us') }}">About Us</a>
                        <div class="line"></div>
                    </li>
                    <li class="nav-item nav1 mx-2" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200">
                        <a class="nav-link text-white fw-bold p-0" href="{{ route('frontend.landing_contact') }}">Contact Us</a>
                        <div class="line"></div>
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