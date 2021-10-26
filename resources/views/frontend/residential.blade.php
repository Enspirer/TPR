@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
    
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/residential.css') }}">
@endpush


    <!--residential property search-->
    <section id="residential-property-search">
        <div class="container-fluid" style="margin-top:5rem">
            <h3 class="fw-bolder text-center">Interactive Property Search</h3>

            <div class="row mt-4">
                @if(count($filteredProperty) > 0)
                    <div class="col-3" style="background-color: #F3F3F3">
                        <h5>Results: {{ count($filteredProperty) }} Listings</h5>
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
                            @foreach($filteredProperty as $property)
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
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(get_country_cookie(request())->country_id, $property->price) }}</p>
                                        @else
                                            <p class="mb-0 d-inline-block px-2 py-1 mt-2 text-light mb-1" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ current_price(1, $property->price) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-3">
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
                <div class="col-9 p-0">
                    <div id="map" style="height: 600px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>


    <!--search-->
    <section id="index-search" class="container-fluid filter-search" style="margin-top: 5rem;">
        @include('frontend.includes.search_bar')
    </section>


    <!--residential properties-->

    @if(count($filteredProperty) > 0)
        <section id="residential-properties">
            <div class="container" style="margin-top: 4rem; margin-bottom: 5rem;">
                @if(get_country_cookie(request()))
                    <h3 class="text-center fw-bolder">
                        {{ ucfirst($category_type) }} Properties in {{ get_country_cookie(request())->country_name }}
                    </h3>
                @endif

                <div class="row mt-5">
                    <div class="col-8">
                        
                            @foreach($filteredProperty as $property)
                                <div class="property mb-5 p-3 custom-shadow">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('frontend.individual-property', $property->id) }}"><img src="{{ route('frontend.image_assets', $property->feature_image_id) }}" alt="" class="img-fluid w-100" style="object-fit:cover; height:240px;"></a>
                                        </div>
                                        <div class="col-6 ps-4">
                                            <div class="row justify-content-between">
                                                <div class="col-9">
                                                    <h5 class="property-price mb-0">{{ $property->name }}</h5>
                                                    <h5 class="property-location">{{ get_currency(request() ,$property->price)}}</h5>
                                                </div>
                                        
                                                @auth
                                                    @if(is_favorite($property->id, auth()->user()->id))
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="favourite">
                                                                <button class="bi bi-heart-fill border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @else
                                                    <div class="col-3 small-heart">
                                                        <form action="{{ route('frontend.favourite_heart') }}" method="POST">
                                                            {{csrf_field()}}
                                                                <input type="hidden" class="property_id" name='hid_id' value="{{ $property->id }}">
                                                                <input type="hidden" class="favourite" name='favourite' value="non-favourite">
                                                                <button class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF; background-color: transparent;"></button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                @else
                                                    <div class="col-3 small-heart">
                                                        <a href="{{ route('frontend.auth.login') }}" class="bi bi-heart border-0" type="submit" style="font-size: 1.5rem; display: block; color: #E88DAF"></a>
                                                    </div>
                                                @endauth
                                            </div>
                                            
                                            <p class="fw-bold mt-2 mb-0 property-spec text-body">2 bed semi-detached house</p>
                                            <p class="text-secondary mt-1">{{ $property->country }}</p>
                                            <div class="project-list">
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Transaction Type : {{ $property->transaction_type }}</p>
                                                <p class="text-secondary"><i class="bi bi-square-fill me-2"></i>Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                            </div>

                                            @if($property->baths != null && $property->beds != null)
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i> {{ $property->baths }} <i class="fas fa-bed ms-4 me-2"></i>{{ $property->beds }}</p>
                                            @else
                                                <p class="text-secondary ms-4"><i class="fas fa-bath me-2"></i>Not available<i class="fas fa-bed ms-4 me-2"></i>Not available</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <h6 class="text-secondary mb-0">Listed on {{ $property->created_at->toDateString() }}</h6>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="mb-0"><i class="bi bi-telephone me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                                <div class="col-6" >
                                                    <p class="mb-0" id="ppp" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><i class="bi bi-envelope me-1"></i>{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>

                    <div class="col-4">
                        @if(count($side_ads) > 0)
                            @foreach($side_ads as $side_ad)
                                <div class="row custom-shadow mb-4">
                                    <div class="col-12">
                                        <a href="{{ $side_ad->link }}"><img src="{{url('files/sidebar_ad', $side_ad->image)}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <div class="col-12 mt-3" style="text-align: justify;">
                                        <p class="ns" style="height:140px; overflow:hidden !important; text-overflow: ellipsis;">{{ $side_ad->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>

    @else
        <section id="residential-properties">
            <div class="container text-center" style="margin-top: 10rem">
                <p class="display-3 text-secondary">RESULTS NOT FOUND!</p>
            </div>
        </section>
    @endif


    <!-- Filter Modal -->
    @include('frontend.includes.search_filter_modal')


    <!--get app-->
    <!-- <section id="index-get-app">
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
                            @foreach($filteredProperty as $property)
                                { lat: {{$property->lat}}, lng: {{$property->long}} },
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
                    @foreach($filteredProperty as $property)
                        { lat: {{$property->lat}}, lng: {{$property->long}} },
                    @endforeach
                ];
        </script>
    @endif
@endpush

    

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif


<!-- <script src="{{ asset('tpr_templete/scripts/map.js') }}"></script> -->

<script>
    // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();

            if(value == '') {
                

            } 
            else {
                let url = '{{url('/')}}/api/get_property_type_details/' + value;

                const res = await fetch(url);
                const data = await res.json();
                const fields = (data[0]['activated_fields']);
                let template = '';
                let first = '';
                let second = '';

                for(let i = 0; i < fields.length; i++) {
                    if(i == 0) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                first = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                            first = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    } 

                    else if(i == 1) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                second = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        second = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }
                    else {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                template += `<div class="col-3">
                                            <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                            <select class="form-select" name="${name}" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        template += `<div class="col-3">
                                                        <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                        else {
                            template += `<div class="col-3">
                                <div>
                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>
                            </div>`
                        }
                    }
                }
                $('.first-incoming-field').html(first);
                $('.second-incoming-field').html(second);
                $('#incoming_fields').html(template);
            }
        }

        // window.addEventListener('DOMContentLoaded', () => renderFields());

    $('.filter-button').on('click', function(){
            renderFields();
    })

    $('.filter-reset').click(function(){
        $('#filter-form')[0].reset();
    });
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

<script>
    $('.small-heart').on('click', function(){

        let status = $(this).find('.favourite').val();

        if(status == 'non-favourite') {
            $(this).find('button').removeClass('bi-heart');
            $(this).find('button').addClass('bi-heart-fill');
            $(this).find('.favourite').val('favourite');
        }
        else {
            $(this).find('button').removeClass('bi-heart-fill');
            $(this).find('button').addClass('bi-heart');
            $(this).find('.favourite').val('non-favourite');
        }
    });
</script>


<script>
    const renderCity = async () => {
            
        @if(get_country_cookie(request()))
            let country_id = <?php echo json_encode(get_country_cookie(request())->country_id); ?>;
        @else
            let country_id = 1;
        @endif

        let countries = <?php echo json_encode($countries); ?>;

        let name;
        let countryName;
        let template;

        for(let i = 0; i < countries.length; i++) {
            if(countries[i]['country_id'] == country_id) {
                name = countries[i]['slug'];
            }
        }

        if(name.includes('-')){
            countryName = name.replace("-", " ");
        } else {
            countryName = name;
        }


        $.ajax({
            "type": "POST",
            "url": "https://countriesnow.space/api/v0.1/countries/cities",
            "data": {
                "country": countryName
            }
        }).done(function (d) {

            for(let i = 0; i < d['data'].length; i++) {
                template+= `
                    <option value="${d['data'][i]}">${d['data'][i]}</option>
                `
            }

            $(".areas").append(template);
        });
    }

        window.addEventListener('DOMContentLoaded', () => renderCity());
</script>
@endpush