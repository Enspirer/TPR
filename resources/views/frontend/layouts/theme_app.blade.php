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
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/index.css')}}"></link>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Tropical - Home</title>
</head>
<body>

@include('includes.partials.read-only')

    <div id="app">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        <div class="">
            @include('includes.partials.messages')
            @yield('content')
        </div><!-- container -->
    </div><!-- #app -->

    <!-- Scripts -->

<!--copyright-->
<div id="copyright" style="margin-top:4rem;">
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="row py-3 align-items-center">
                <div class="col-6">
                    <p class="text-white mb-0">Created by Enspirer &copy; All Rights Reserved.</p>
                </div>
                <div class="col-6 text-white text-end">
                    <a href="#">
                        <img src="images/fb.svg" alt="" class="img-fluid me-2">
                    </a>
                    <a href="#">
                        <img src="images/twitter.svg" alt="" class="img-fluid me-2">
                    </a>
                    <a href="#">
                        <img src="images/goolgle_plus.svg" alt="" class="img-fluid me-2">
                    </a>
                    <a href="#">
                        <img src="images/instagram.svg" alt="" class="img-fluid me-2">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{url('tpr_templete/scripts/map.js')}}"></script>
<script src="{{url('tpr_templete/scripts/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
        type="text/javascript"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>