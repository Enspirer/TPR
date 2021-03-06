@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/map-search.css') }}">
@endpush


    <!--residential property search-->
    <section id="residential-property-search">
        <div class="container-fluid" style="margin-top:5rem; margin-bottom:5rem;">
            <h3 class="fw-bolder text-center">Interactive Property Search</h3>

            <div class="row mt-4">
            @if(count($promo) > 0)
                <div class="col-3 full-size-width tab-full-width" style="background-color: #F3F3F3">
                    <h5>Results: {{ count($promo) }} Listings</h5>
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
                        @foreach($promo as $property)
                            <div class="row border align-items-center p-1">
                                <div class="col-6">
                                    <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{url('image_assest', $property->feature_image_id)}}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9">
                                            <p class="mb-0 small-num" style="font-size: 0.7rem;">{{ $property->created_at->toDateString() }}</p>
                                        </div>
                                    </div>
                                    
                                    <p class="fw-bold mb-0">{{ $property->name }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${{ $property->transaction_type }}</p>
                                    <p class="mb-0" style="font-size: 0.8rem;">Country: {{ $property->country }}</p>
                                    @if(get_country_cookie(request()))
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), get_country_cookie(request())->country_id, $property->price) }}</p>

                                    @else
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(request(), 1, $property->price) }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-3 full-size-width tab-full-width">
                        <div class="">
                            <div class="no-result border py-2 px-3">
                                <h4 class="text-center">No Results</h4>
                                <p class="ns mb-1">Please refine your search criteria.</p>
                                <p class="ns">Suggestions:</p>

                                <ul>
                                    <li class="no-result-list">Modify your search criteria</li>
                                    <li class="no-result-list">Update your search location</li>
                                    <li class="no-result-list">Broaden your map area</li>
                                    <li class="no-result-list">Modify your keywords</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-9 p-0 full-size-width tab-full-width map-mobile-container">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--get app-->
    <!-- <section id="get-app">
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
    </section> -->


@push('before-scripts')

    @if(isset(get_country_cookie(request())->country_id))
        @if(get_country_cookie(request())->country_id)

        <script>

            let lat = <?php echo json_encode(App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->latitude); ?>;
            let lng = <?php echo json_encode(App\Models\Country::where('country_id', get_country_cookie(request())->country_id)->first()->longitude); ?>;

            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,
                    center: { lat: parseInt(lat), lng: parseInt(lng) },
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

                    @if(get_country_cookie(request()))
                        let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                    @else
                        let country_id = 1;
                    @endif



                    for (marker in markers) {
                        const cars = [];
                        cars['lat']= markers[marker].getPosition().lat();
                        cars['long']= markers[marker].getPosition().lng();
                        newArray.push(JSON.stringify(Object.assign({}, cars)));
                    }
                    myArray = JSON.stringify(Object.assign({}, newArray));

                    $.post("{{url('/')}}/api/country_request",
                        {
                            coordinate_data: myArray,
                            country_id : country_id
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
                                                            <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                            <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                                            <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>

                                                            <div class="text-end mt-2">
                                                                <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                            </div>
                                                        </div>
                                                    </div>`;
                                        
                                        infowindow.setContent(details);           
                                        infowindow.open(map, markers[i]);
                                    }
                                });
                            }
                            

                            
                            

                            for(let i = 0; i < obj.length; i++) {

                                let date = obj[i]['created_at'].split(' ')[0];

                                template += `
                                    <div class="row border align-items-center p-1">
                                        <div class="col-6">
                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}"><img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                        </div>
                                        <div class="col-6">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-9">
                                                    <p class="mb-0 small-num" style="font-size: 0.7rem;">${date}</p>
                                                </div>
                                            </div>
                                            
                                            <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                            <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                            <p class="mb-0" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">${obj[i]['price_currency']}</p>
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
        @else

        @endif
    @else
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

                @if(get_country_cookie(request()))
                    let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                @else
                    let country_id = 1;
                @endif



                for (marker in markers) {
                    const cars = [];
                    cars['lat']= markers[marker].getPosition().lat();
                    cars['long']= markers[marker].getPosition().lng();
                    newArray.push(JSON.stringify(Object.assign({}, cars)));
                }
                myArray = JSON.stringify(Object.assign({}, newArray));

                $.post("{{url('/')}}/api/country_request",
                    {
                        coordinate_data: myArray,
                        country_id : country_id
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
                                                        <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>

                                                        <div class="text-end mt-2">
                                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    
                                    infowindow.setContent(details);           
                                    infowindow.open(map, markers[i]);
                                }
                            });
                        }
                        

                        
                        

                        for(let i = 0; i < obj.length; i++) {

                            let date = obj[i]['created_at'].split(' ')[0];

                            template += `
                                <div class="row border align-items-center p-1">
                                    <div class="col-6">
                                        <a href="{{url('/')}}/individual-property/${obj[i]['id']}"><img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                    </div>
                                    <div class="col-6">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-9">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">${date}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">${obj[i]['price_currency']}</p>
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

    @endif
    <!-- <script>
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

                @if(get_country_cookie(request()))
                    let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
                @else
                    let country_id = 1;
                @endif



                for (marker in markers) {
                    const cars = [];
                    cars['lat']= markers[marker].getPosition().lat();
                    cars['long']= markers[marker].getPosition().lng();
                    newArray.push(JSON.stringify(Object.assign({}, cars)));
                }
                myArray = JSON.stringify(Object.assign({}, newArray));

                $.post("{{url('/')}}/api/country_request",
                    {
                        coordinate_data: myArray,
                        country_id : country_id
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
                                                        <img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 150px!important; object-fit: cover!important; width: 100%";>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2">${obj[i]['name']}</h5>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                                        <p class="mb-1" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">Price : ${obj[i]['price_currency']}</p>

                                                        <div class="text-end mt-2">
                                                            <a href="{{url('/')}}/individual-property/${obj[i]['id']}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">VIEW</a>
                                                        </div>
                                                    </div>
                                                </div>`;
                                    
                                    infowindow.setContent(details);           
                                    infowindow.open(map, markers[i]);
                                }
                            });
                        }
                        

                        
                        

                        for(let i = 0; i < obj.length; i++) {

                            let date = obj[i]['created_at'].split(' ')[0];

                            template += `
                                <div class="row border align-items-center p-1">
                                    <div class="col-6">
                                        <a href="{{url('/')}}/individual-property/${obj[i]['id']}"><img src="{{url('/')}}/image_assest/${obj[i]['feature_image_id']}" alt="" class="img-fluid" style="height: 90px!important; object-fit: cover!important; width: 100%";></a>
                                    </div>
                                    <div class="col-6">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-9">
                                                <p class="mb-0 small-num" style="font-size: 0.7rem;">${date}</p>
                                            </div>
                                        </div>
                                        
                                        <p class="fw-bold mb-0">${obj[i]['name']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Transaction Type: ${obj[i]['transaction_type']}</p>
                                        <p class="mb-0" style="font-size: 0.8rem;">Country: ${obj[i]['country']}</p>
                                        <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">${obj[i]['price_currency']}</p>
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
    </script> -->
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
