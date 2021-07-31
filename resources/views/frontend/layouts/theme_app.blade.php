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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @stack('after-styles')

    <title>Tropical - Home</title>
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
    <section id="footer">
        <div class="container" style="margin-top:6rem;">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('tpr_templete/images/tropical_logo.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-3 ps-5">
                    <h5 class="fw-bolder mt-2">TITLES</h5>
                    <p class="mt-4">About Us</p>
                    <p>Contact Us</p>
                    <p>Mobile Apps</p>
                </div>
                <div class="col-3 ps-5">
                    <h5 class="fw-bolder mt-2">MORE</h5>
                    <p class="mt-4">Privacy Policy</p>
                    <p>Terms of Use</p>
                    <p>FAQ</p>
                    <p>Sitemap</p>
                </div>
                <div class="col-3 ps-5">
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
                        <a href="#"><img src="{{ asset('tpr_templete/images/fb.svg') }}" alt="" class="img-fluid me-2"></a>
                        <a href="#"><img src="{{ asset('tpr_templete/images/twitter.svg') }}" alt="" class="img-fluid me-2"></a>
                        <a href="#"><img src="{{ asset('tpr_templete/images/google_plus.svg') }}" alt="" class="img-fluid me-2"></a>
                        <a href="#"><img src="{{ asset('tpr_templete/images/instagram.svg') }}" alt="" class="img-fluid me-2"></a>
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
@stack('after-scripts')

</body>
</html>
