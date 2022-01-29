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

    @stack('before-styles')
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/styles.css')}}"></link>
    <link rel="stylesheet" href="{{url('tpr_templete/stylesheets/landing.css')}}"></link>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

        <!-- <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

    @stack('after-styles')

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

      li.nav-item.nav1, li.nav-item.contact {
          opacity: 1;
      }

    </style>

</head>
<body onload="initialize()">

    <div id="app">
        <div class="">
            @include('includes.partials.messages')
            @include('frontend.includes.landing_nav')

            @yield('content')

            @include('frontend.includes.landing_footer')
        </div>
    </div>

<!-- ad popup -->
<div class="modal fade" id="adModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-body" style="position:relative;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:-10px;top:-10px;background:red;border:0;border-radius:50%;width:25px;">
          <span aria-hidden="true" style="color:#fff;">&times;</span>
        </button>
        <h2>Place your ad</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @auth
            @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('frontend.user.agent')}}'">Become a Agent</button>
            @else
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('frontend.user.properties')}}'">Add Property</button>
            @endif
        @else 
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('frontend.auth.register')}}'">Create Account</button>
        @endauth
      </div>
    </div>
  </div>
</div>

<!-- lang popup -->
<div class="modal fade" id="langModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-body" style="position:relative;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:-10px;top:-10px;background:red;border:0;border-radius:50%;width:25px;">
          <span aria-hidden="true" style="color:#fff;">&times;</span>
        </button>
        <div id="google_translate_element"></div>
      </div>
    </div>
  </div>
</div>

@stack('before-scripts')

    <!-- <script src="scripts/map.js"></script> -->
    <script src="{{url('tpr_templete/scripts/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
    type="text/javascript"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{url('js/ammap.js')}}" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>
    <script src="{{ url('js/custom.js') }}"></script>

    <script>
          $('.nav-item').on('mouseenter', function(){
              $(this).children('.line').css({'visibility' : 'visible', 'width' : '100%'});
                }).on('mouseleave', function() {
                      $(this).children('.line').css({'visibility' : 'hidden', 'width' : '0'});
                  });

                  
    </script>

@stack('after-scripts')

</body>
</html>