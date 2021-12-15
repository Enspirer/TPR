<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <!-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js" integrity="sha512-4p9OjnfBk18Aavg91853yEZCA7ywJYcZpFt+YB+p+gLNPFIAlt2zMBGzTxREYh+sHFsttK0CTYephWaY7I3Wbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>

    @stack('before-styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/styles.css')}}"></link>
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/index.css')}}"></link>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{url('tpr_templete/stylesheets/bootstrap-combobox.css')}}" rel="stylesheet">
    <link href="{{url('tpr_templete/stylesheets/rebon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    @stack('after-styles')

    <title>Tropical - Home</title>

    <style>      

      

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        /* background: #fff; */

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
        height: 230px;
        object-fit: cover;
      }
    </style>

</head>
<body>

@include('includes.partials.read-only')

    <div id="app">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        <div class="">
            @include('includes.partials.messages')
            @include('frontend.includes.nav')

            @yield('content')
        </div><!-- container -->
    </div><!-- #app -->

    

    <!--footer-->
    <section class="container-fluid pt-5 pb-3 text-white" id="footer" style="background-color: #1B1B3A;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid mb-4" alt="" style="height: 4rem;">
                    <div id="google_translate_element"></div>
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">PAGES</h5>
                    <a href="{{ route('frontend.about-us') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">About Us</a>
                    @if(isset(get_country_cookie(request())->country_id))
                        <a href="{{ route('frontend.contact', get_country_cookie(request())->country_id) }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Contact Us</a>
                    @endif
                    <!-- <a href="{{ route('frontend.mobile-apps') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Mobile Apps</a> -->
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">MORE</h5>
                    <a href="{{ route('frontend.privacy-policy') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Privacy Policy</a>
                    <a href="{{ route('frontend.cookie-policy') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Cookie Policy</a>
                    <a href="{{ route('frontend.terms-of-use') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Terms of Use</a>
                    <!-- <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">FAQ</a>
                    <a href="#" class="mb-3 d-block text-decoration-none no-result-list text-white">Sitemap</a> -->
                </div>
                <div class="col-12 col-md-3 ps-md-5 mb-4 mb-md-0">
                    <h5 class="fw-bolder mt-md-2">TOPICS</h5>
                    <a href="{{ route('frontend.tips-for-buyers') }}" class="mt-3 mt-md-4 mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Tips for buyers</a>
                    <a href="{{ route('frontend.tips-for-sellers') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Tips for sellers</a>
                    <!-- <a href="{{ route('frontend.commercial-resources') }}" class="mb-3 d-block text-decoration-none no-result-list text-white ps-3 ps-md-0">Commercial Resources</a> -->

                    <a href="#"><img src="{{ asset('tpr_templete/images/fb.svg') }}" alt="" class="img-fluid me-2 ps-3 ps-md-0" style="height:1.4rem;"></a>
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
                        <p class="text-white mb-0">&copy; All Rights Reserved</p>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-white mb-0">Powered by <a href="https://www.enspirer.com" class="text-white text-decoration-none">Enspirer</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stack('dialog_modal')

<!-- Scripts -->


@stack('before-scripts')

<script src="{{ asset('tpr_templete/scripts/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>



<script>
    AOS.init();
</script>
<script src="{{ asset('tpr_templete/scripts/bootstrap-combobox.js') }}"></script>


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


@stack('after-scripts')

</body>
</html>
