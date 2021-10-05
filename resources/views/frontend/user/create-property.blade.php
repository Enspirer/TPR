@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush


@if ( session()->has('message') )

<div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between mt-4">

                    <div class="container-fluid jumbotron text-center" style="background-color: #c6e4ee; border-radius: 15px 50px;">
                    <h1 style="margin-top:60px;" class="display-5">Succesfully Created!</h1><br>
                        <!-- <p class="lead"><h3>Your request is sent. One of our member will get back in touch with you soon!<br><br> Have a great day!</h3></p> -->
                        <hr><br>    
                        <p class="lead">
                            <a class="btn btn-success btn-md" href="{{url('/')}}" role="button">Go Back to Home Page</a>
                        </p>
                        <br>
                    </div>

                </div>                
            </div>
        </div>
    </div>


@else

    <div class="container user-settings" style="margin-top:8rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4 class="fs-4 fw-bolder user-settings-head">Create Property</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">
                            <h4>About Property</h4>

                            <form action="{{route('frontend.user.create-property.createPropertyStore')}}" method="post" enctype="multipart/form-data" >
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="propertyType" class="form-label mb-0 required">Property Type</label>
                                            <select class="form-select" aria-label="propertyType" name="propertyType" id="propertyType" onChange="renderFields()"  required>
                                                <option selected disabled value="">Choose...</option>
                                            @foreach($property_type as $type)
                                                <option value="{{$type->id}}"> {{$type->property_type_name}} </option>
                                            @endforeach

                                            </select>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="map" class="form-label mb-2 mt-4 required">Location</label>
                                        <div id="map" style="width: 100%; height: 400px;"></div>
                                        <input type="hidden" name="lat" id="lat" class="mt-3" required>
                                        <input type="hidden" name="lng" id="lng" class="mt-3" required>
                                        <input type="hidden" name="country" id="country" class="mt-3" required>

                                        @error('lat')
                                            <div class="alert alert-danger">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <input id="search" class="form-control" type="text" placeholder="Search" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <label for="price" class="form-label mb-0 mt-4">Price</label>
                                            <input type="number" class="form-control" name="price" id="price" aria-describedby="price" required placeholder="$">
                                            <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                                Please enter property price in US currency
                                            </div>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="category" class="form-label mb-0 mt-4">Category</label>
                                            <select class="form-select" aria-label="category" id="category" name="category" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Residential">Residential</option>

                                                @if(is_country_manager(auth()->user()->id))
                                                <option value="TP_Developer">TP Developer</option>
                                                <option value="Investments">Investments</option>
                                                @endif


                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="city" class="form-label mb-0 mt-4">City</label>
                                            <input type="text" class="form-control" name="city" id="city" aria-describedby="city" required>
                                        </div>
                                    </div>
                                </div>
                            

                                <h4 class="mt-5 mb-1">More About Property</h4>
                                <h6 style="color: #5e6871">Tell us more about the agent</h6>


                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            @include('frontend.file_manager.file_manager_dialog',['file_caption' => 'Property Featured Image','file_input_name' => 'featured_image','multiple' => false, 'data' => null, 'id' => 'id-single', 'upload' => 'upload-single', 'title' => 'Upload Image'])
                                        </div>

                                        @error('featured_image')
                                            <div class="alert alert-danger">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div>
                                            @include('frontend.file_manager.file_manager_dialog',['file_caption' => 'Property Images','file_input_name' => 'property_images','multiple' => true, 'data' => null, 'id' => 'id-multiple', 'upload' => 'upload-multiple', 'title' => 'Upload Images' ])
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="meta-description" class="form-label mb-0 mt-4">Meta Description</label>
                                            <input type="text" class="form-control" name="meta_description" id="meta-description" aria-describedby="meta-description" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="slug" class="form-label mb-0 mt-4">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="transaction-type" class="form-label mb-0 mt-4">Transaction Type</label>
                                            <select class="form-select" aria-label="transaction_type" name="transaction_type" id="transaction_type" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="sale">For sale</option>
                                                <option value="rent">For rent</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6 first-incoming-field">
                                        
                                    </div>
                                </div>

                                <div class="row" id="incoming_fields">

                                </div>

                                <div class="mt-5 text-center">
                                    <input type="submit" value="Submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;" >
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('after-scripts')

<script>

        var marker = false;
                

        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: { lat: -28.024, lng: 140.887 },
            });

            const geocoder = new google.maps.Geocoder();
            const infowindow = new google.maps.InfoWindow();

            google.maps.event.addListener(map, 'click', function(event) {                
                
                var clickedLocation = event.latLng;
                

                

                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true 
                    });
   
                    google.maps.event.addListener(marker, 'dragend', function(event){
                    
                        geocodeLatLng(geocoder, map, infowindow);
                    });
                } else{

                    marker.setPosition(clickedLocation);
                }

                geocodeLatLng(geocoder, map, infowindow);
            });


            const input = document.getElementById("search");
            const search = new google.maps.places.SearchBox(input);
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            // map.addListener("bounds_changed", () => {
            //     input.setBounds(map.getBounds());
            // });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            search.addListener("places_changed", () => {
                const places = input.getPlaces();

                if (places.length == 0) {
                return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };
                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                    })
                );

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                });
                map.fitBounds(bounds);
            });
            
        }

        

        function markerLocation(){

            var currentLocation = marker.getPosition();

            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude 
        }


        function geocodeLatLng(geocoder, map, infowindow) {
            var clickedLocation = event.latLng;

            var currentLocation = marker.getPosition();

            geocoder
                .geocode({ location: currentLocation })
                .then((response) => {
                if (response.results[0]) {
                    // map.setZoom(5);
                    let marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true,
                    add : response.results[0].formatted_address
                    });
                    infowindow.setContent(response.results[0].formatted_address);
                    infowindow.open(map, marker);

                    var output = marker.add.split(/[,]+/).pop();
                    $('#country').val(output);

                    markerLocation();

                } else {
                    window.alert("No results found");
                }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
            }


        

        // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();


            let url = '{{url('/')}}/api/get_property_type_details/' + value;
            const res = await fetch(url);
            const data = await res.json();
            const fields = (data[0]['activated_fields']);
            let template = '';
            let first = '';

            for(let i = 0; i < fields.length; i++) {
                if(i == 0) {
                    let name = fields[i].split(' ').join('_').toLowerCase();
                    if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                        if(name == 'beds' || name == 'baths') {
                            first = `<div>
                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" required>
                            </div>`
                        }
                        else if (name == 'building_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                    <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                        <option value="">Select</option>
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
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" required>
                            </div>`
                        }
                }
                else {
                    let name = fields[i].split(' ').join('_').toLowerCase();
                    if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                        if(name == 'beds' || name == 'baths') {
                            template += `<div class="col-6">
                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" required>
                            </div>`
                        }
                        else if (name == 'building_type') {
                                    template += `<div class="col-6">
                                                    <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                    <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                        <option value="">Select</option>
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
                                    template += `<div class="col-6">
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                                    template += `<div class="col-6">
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                                    template += `<div class="col-6">
                                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                    <option value="">Select</option>
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
                        template += `<div class="col-6">
                            <div>
                                <label for="${name}" class="form-label mb-0 mt-4">${fields[i]}</label>
                                <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" required>
                            </div>
                        </div>`
                    }
                }
            }
            $('.first-incoming-field').html(first);
            $('#incoming_fields').html(template);
        }

        

        // window.addEventListener('DOMContentLoaded', () => renderFields());

        $('#propertyType').change(function() {
            renderFields();
        });


        $( "#name" ).change(function() {
            let name = $(this).val().split(' ').join('-').toLowerCase();
            

            $('#slug').val(name);
        });
        
                
        
        
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>


@endpush


@endif