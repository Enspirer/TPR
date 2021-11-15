@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/residential.css') }}">
@endpush


    <!--residential property search-->
    <section id="residential-property-search">
        <div class="container pe-0" style="margin-top:5rem">
            <h3 class="fw-bolder text-center">Interactive Property Search</h3>

            <div class="row mt-4">
                <div class="col-3">
                    <h5>Results: 159,728 Listings</h5>
                    <div class="row align-items-center">
                        <div class="col-5">
                            <!-- <p class="mb-0 text">Sort By</p> -->
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Newest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">Newest</a></li>
                                  <!-- <li><a class="dropdown-item" href="#">Oldest</a></li> -->
                                </ul>
                              </div>
                        </div>
                    </div>
                    <div class="properties">
                        <!-- <div class="row border align-items-center p-1">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/ps_1.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="row justify-content-between">
                                    <div class="col-3 small-num">
                                        <p class="mb-0" style="font-size: 0.7rem;">3051</p>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mb-0">$450, 000</p>
                                <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">Colombo, Sri Lanka</p>
                                <p class="mb-0"  style="font-size: 0.8rem;">3 <i class="fas fa-bed me-4"></i> 5 <i class="fas fa-bath"></i></p>
                            </div>
                        </div> -->
    
                        
                    </div>
                </div>
                <div class="col-9">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--residential search-->
    <section id="residential-search">
        <div class="container-md" style="margin-top:5rem">
            <button class="btn text-white rounded-0 py-3 px-5 fs-5 me-1" style="background-color : #83BC3E"><img src="{{ asset('tpr_templete/images/sale_icon.svg') }}" class="me-3" height="25rem" alt="">Residential</button>
            <button class="btn text-white rounded-0 py-3 px-5 fs-5" style="background-color : #75CFED"><img src="{{ asset('tpr_templete/images/commercial_icon.svg') }}" class="me-3" height="25rem" alt="">Commercial</button>

            <div class="input-group shadow-lg">
                <input type="text" class="form-control p-3 rounded-0" aria-label="search">
                <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button>
                <button class="btn rounded-0 text-white" style="background-color : #EB8EB0"><i class="bi bi-search"></i> Search</button>
            </div>
        </div>
    </section>


    <!--residential properties-->
    <section id="residential-properties">
        <div class="container" style="margin-top: 6rem">
            <h3 class="text-center fw-bolder">Topic</h3>

            <div class="row justify-content-between">
                <div class="col-3">
                    <h6>Property for Sale in Sri Lanka</h6>
                    <p class="text-secondary">10000+ results</p>
                </div>
                <div class="col-3">
                    <div class="clearfix">
                        <div class="float-start">
                            <button class="btn border-dark border-1 rounded-0 px-3 py-2">Filters <img src="{{ asset('tpr_templete/images/filter.svg') }}" alt="" class="ms-5"></button>
                        </div>
                        <div class="float-end">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle border-1 border-dark rounded-0 px-3 py-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Most recent
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">Recommended</a></li>
                                  <li><a class="dropdown-item" href="#">Most Oldest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-8">
                    @foreach($promo as $property)
                        @if($property->main_category == 'commercial' && $property->admin_approval == 'Approved' && $property->country_manager_approval == 'Approved')
                            <div class="property mb-5 p-3 shadow">
                                <div class="row">
                                    <div class="col-6">
                                        <a href=""><img src="{{url('images', App\Models\FileManager::where('id', $property->feature_image_id)->first()->file_name)}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="col-6 ps-4">
                                        <div class="row justify-content-between">
                                            <div class="col-9">
                                                <h5 class="property-price mb-0">$ {{ $property->price }}</h5>
                                                <h5 class="property-location">Colombo, {{ $property->country }}</h5>
                                            </div>
                                            <div class="col-3 small-heart">
                                                <i class="bi bi-heart" style="font-size: 1.5rem;"></i>
                                                <i class="bi bi-heart-fill" style="font-size: 1.5rem; display: none;"></i>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                        <p class="text-secondary mt-1">Lancaster, {{ $property->country }}</p>
                                        <div class="project-list">
                                            <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.4 miles from petta</p>
                                            <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.7 miles from petta</p>
                                        </div>
                                        <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> {{ $property->beds }} <i class="fas fa-bed ms-4 me-2"></i>{{ $property->baths }}</p>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <h6 class="text-secondary">Listed on 26th Jun 2021</h6>
                                    </div>
                                    <div class="col-6">
                                        <div class="row text-end justify-content-end">
                                            <div class="col-5">
                                                <p><i class="bi bi-telephone me-1"></i> {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p><i class="bi bi-envelope me-1"></i>{{ App\Models\AgentRequest::where('id', $property->user_id)->first()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!-- <div class="property mb-5 p-3 shadow">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/residential_2.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6 ps-4">
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <h5 class="property-price mb-0">$ 480, 000</h5>
                                        <h5 class="property-location">Colombo, Sri Lanka</h5>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 1.5rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 1.5rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                <p class="text-secondary mt-1">Lancaster, claited Kingdom</p>
                                <div class="project-list">
                                    <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.4 miles from petta</p>
                                    <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.7 miles from petta</p>
                                </div>
                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> 7 <i class="fas fa-bed ms-4 me-2"></i>2</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8">
                                <h6 class="text-secondary">Listed on 26th Jun 2021</h6>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p><i class="bi bi-telephone me-1"></i> 020 8014 123</p>
                                    </div>
                                    <div class="col-6">
                                        <p><i class="bi bi-envelope me-1"></i> Contact</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="property mb-5 p-3 shadow">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('tpr_templete/images/residential_3.svg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-6 ps-4">
                                <div class="row justify-content-between">
                                    <div class="col-9">
                                        <h5 class="property-price mb-0">$ 480, 000</h5>
                                        <h5 class="property-location">Colombo, Sri Lanka</h5>
                                    </div>
                                    <div class="col-3 small-heart">
                                        <i class="bi bi-heart" style="font-size: 1.5rem;"></i>
                                        <i class="bi bi-heart-fill" style="font-size: 1.5rem; display: none;"></i>
                                    </div>
                                </div>
                                
                                <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                <p class="text-secondary mt-1">Lancaster, claited Kingdom</p>
                                <div class="project-list">
                                    <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.4 miles from petta</p>
                                    <p class="text-secondary"><i class="bi bi-square-fill me-2"></i> 0.7 miles from petta</p>
                                </div>
                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> 7 <i class="fas fa-bed ms-4 me-2"></i>2</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8">
                                <h6 class="text-secondary">Listed on 26th Jun 2021</h6>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p><i class="bi bi-telephone me-1"></i> 020 8014 123</p>
                                    </div>
                                    <div class="col-6">
                                        <p><i class="bi bi-envelope me-1"></i> Contact</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-4">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <button class="btn border-dark border-1 rounded-0 py-2 fw-bold fs-5" style="padding: 0 4.7rem;"><i class="bi bi-envelope"></i> Create email alert</button>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn border-dark border-1 rounded-0 py-2 fw-bold fs-5" style="padding: 0 5rem;"><i class="bi bi-heart me-1"></i> Save this search</button>
                        </div>
                        <hr class="mt-5" style="border: 1px solid #686767;">
                        <h5 class="fw-bold mt-4 mb-3" style="margin-left: 10rem;">Sample Text</h5>
                        <h5 class="fw-bold" style="margin-left: 10rem;">Sample Text</h5>
                    </div>

                    <div class="row shadow mt-5">
                        <div class="col-12">
                            <img src="{{ asset('tpr_templete/images/rp_3.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 mt-3" style="text-align: justify;">
                            <p class="ns">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sint facilis dignissimos optio maiores eius nisi repellat aliquam amet quod voluptate delectus pariatur minima soluta maxime consequuntur, accusamus totam exercitationem?</p>
                        </div>
                    </div>

                    <div class="row shadow mt-5">
                        <div class="col-12">
                            <img src="{{ asset('tpr_templete/images/rp_1.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-12 mt-3" style="text-align: justify;">
                            <p class="ns">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sint facilis dignissimos optio maiores eius nisi repellat aliquam amet quod voluptate delectus pariatur minima soluta maxime consequuntur, accusamus totam exercitationem?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <section id="index-get-app">
        <div class="container-fluid p-0 get-app" style="margin-top: 10rem;">
            <div class="container">
                <div class="row py-5 align-items-center justify-content-center">
                    <div class="col-6 text-center">
                        <h2 class="text-white fw-bolder">Get The App Now!</h2>
                    </div>
                    <div class="col-6 text-center">
                        <img src="{{ asset('tpr_templete/images/appstore.svg') }}" alt="" height="50rem" class="me-3">
                        <img src="{{ asset('tpr_templete/images/playstore.svg') }}" alt="" height="50rem">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('before-scripts')
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 3,
                center: { lat: -28.024, lng: 140.887 },
            });
            // Create an array of alphabetical characters used to label the markers.
            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            // Add some markers to the map.
            // Note: The code uses the JavaScript Array.prototype.map() method to
            // create an array of markers based on a given "locations" array.
            // The map() method here has nothing to do with the Google Maps API.
            const markers = locations.map((location, i) => {
                    return new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });

        });

            // Add a marker clusterer to manage the markers.
            var markerCluster = new MarkerClusterer(map, markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

            google.maps.event.addListener(markerCluster, 'click', function(c) {
                // console.log('Number of managed markers in cluster: ' + c.getSize());
                var markers = c.getMarkers();

                // console.log('Number of managed markers in cluster: ' + c.getSize());
                var newArray = [];

                for (marker in markers) {
                    const cars = [];
                    cars['lat']= markers[marker].getPosition().lat();
                    cars['long']= markers[marker].getPosition().lng();
                    newArray.push(JSON.stringify(Object.assign({}, cars)));


//                    console.log(markers[marker].getLabel());
//                    console.log('lat : ' + markers[marker].getPosition().lat());
//                    console.log('lng : ' + markers[marker].getPosition().lng());
                }
                myArray = JSON.stringify(Object.assign({}, newArray));

                $.post("{{url('api/country_request')}}",
                    {
                        coordinate_data: myArray
                    },
                    function(data, status){

                        var obj = JSON.parse(data);

                        let template = '';
                        let info = [];

                        for(let i = 0; i < obj.length; i++) {

                            info[i] = [obj[i]['country'], obj[i]['long'], obj[i]['lat']];;
                        }


                        var infowindow = new google.maps.InfoWindow();


                        for(let i = 0; i < obj.length; i++) {
                            let details;
                            markers[i].addListener('click', function() {
                                if(info[i][1] == markers[i].getPosition().lng() && info[i][2] == markers[i].getPosition().lat()) {
                                    details = `  <div class="row align-items-center p-1" style="width: 500px;">
                                                    <div class="col-6">
                                                        <img src="/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Colombo, ${obj[i]['country']}</p>
                                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price']}</p>

                                                        <div class="text-end">
                                                            <a href="/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    
                                    infowindow.setContent(details);           
                                    infowindow.open(map, markers[i]);
                                }
                            });
                        }
                        

                        
                        

                        for(let i = 0; i < obj.length; i++) {
                            template += `
                                <div class="row border align-items-center p-1">
                                    <div class="col-6">
                                        <a href="/individual-property/${obj[i]['id']}"><img src="/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                    </div>
                                    <div class="col-6">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-3">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">3051</p>
                                            </div>
                                            <div class="col-3 small-heart">
                                                <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                                <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                        <p class="mb-0"  style="font-size: 0.8rem;">Colombo, ${obj[i]['country']}</p>
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price']}</p>
                                    </div>
                                </div>
                            `
                            // info[i] = [obj[i]['long'], obj[i]['lat']];

                            

                        };

                        // console.log(obj);

                        $(".properties").html(template);

                        // var infoWindow = new google.maps.InfoWindow({
                        //     content:'<h1>dfdf</h1>'
                        // });

                        // for (marker in markers) {
                        //     const cars = [];
                        //     cars['lat']= markers[marker].getPosition().lat();
                        //     cars['long']= markers[marker].getPosition().lng();
                        // }

                });
            });


        }
        const locations = [
            @foreach($promo as $prom)
                { lat: {{$prom->lat}}, lng: {{$prom->long}} },
            @endforeach
        ];
    </script>
    @endpush


@endsection


@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif


<!-- <script src="{{ asset('tpr_templete/scripts/map.js') }}"></script> -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

<script>
    $('.small-heart').on('click', function(){
        $(".small-heart bi-heart").hide();
        $(".small-heart bi-heart-fill").show();
        
        $("i", this).toggle();
    });
</script>

@endpush