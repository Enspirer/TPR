@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}">
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
                            <p class="mb-0 text">Sort By</p>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Newest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">Newest</a></li>
                                  <li><a class="dropdown-item" href="#">Oldest</a></li>
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
                        </div>-->
                    </div>
                </div>
                <div class="col-9">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <section id="get-app">
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
                                    details = `  <div class="row align-items-center p-1">
                                                    <div class="col-6">
                                                        <img src="/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="max-width: 100%!important">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Colombo, ${obj[i]['country']}</p>
                                                        <p class="mb-0" style="font-size: 0.8rem;"> ${obj[i]['beds']} <i class="fas fa-bed me-4"></i> ${obj[i]['baths']} <i class="fas fa-bath"></i></p>
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
                                        <img src="/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-6">
                                        <div class="row justify-content-between">
                                            <div class="col-3">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">3051</p>
                                            </div>
                                            <div class="col-3 small-heart">
                                                <i class="bi bi-heart" style="font-size: 0.9rem;"></i>
                                                <i class="bi bi-heart-fill" style="font-size: 0.9rem; display: none;"></i>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mb-0">${obj[i]['price']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">541, Rosewood Place</p>
                                        <p class="mb-0"  style="font-size: 0.8rem;">Colombo, ${obj[i]['country']}</p>
                                        <p class="mb-0"  style="font-size: 0.8rem;"> ${obj[i]['beds']} <i class="fas fa-bed me-4"></i> ${obj[i]['baths']} <i class="fas fa-bath"></i></p>
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
