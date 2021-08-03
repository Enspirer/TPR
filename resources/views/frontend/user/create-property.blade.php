@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
@endpush

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
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="property_type" class="form-label mb-0 required">Property Type</label>
                                            <select class="form-select" aria-label="property_type" name="property_type" id="property_type" onChange="renderFields()">

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
                                        <input type="text" id="lat" class="mt-3 d-none">
                                        <input type="text" id="lng" class="mt-3 d-none">
                                        
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <input id="search" name="search" class="form-control" type="text" placeholder="Search" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="price" class="form-label mb-0 mt-4 required">Price</label>
                                            <input type="text" class="form-control" name="price" id="price" aria-describedby="price">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="category" class="form-label mb-0 mt-4 required">Category</label>
                                            <input type="text" class="form-control" name="category" id="category" aria-describedby="category">
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
                                            <label for="meta_description" class="form-label mb-0 mt-4 required">Meta Description</label>
                                            <input type="text" class="form-control" name="meta_description" id="meta_description" aria-describedby="meta_description">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="slug" class="form-label mb-0 mt-4 required">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="transaction_type" class="form-label mb-0 mt-4 required">Transaction Type</label>
                                            <select class="form-select" aria-label="transaction_type" id="transaction_type" name="transaction_type">
                                                <option value="sale" selected>For Sale</option>
                                                <option value="rent">For Rent</option>
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

        //Set up some of our variables.
        var marker = false; ////Has the user plotted their location marker? 
                
        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: { lat: -28.024, lng: 140.887 },
            });

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {                
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.

                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        markerLocation();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
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

        
//This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }


        

        // dropdown box changing field
        const renderFields = async () => {
            let value = $('#property_type').val();

            let url = 'http://127.0.0.1:8000/api/get_property_type_details/' + value;

            const res = await fetch(url);
            const data = await res.json();

            const fields = (data[0]['activated_fields']);


            let template = '';
            let first = '';

            // fields.forEach ((field) => {
            //     template += `<div class="col-6">
            //                     <div>
            //                         <label for="${field}" class="form-label mb-0 mt-4 required">${field}</label>
            //                         <input type="text" class="form-control" id="${field}" aria-describedby="${field}">
            //                     </div>
            //                 </div>`
            // });
            for(let i = 0; i < fields.length; i++) {
                if(i == 0) {
                    let name = fields[i].split(' ').join('_').toLowerCase();
                    if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                        if(name == 'beds' || name == 'baths') {
                            first = `<div>
                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100">
                            </div>`
                        }
                        else if (name == 'building_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                    <select class="form-select" aria-label="${name}" id="${name}">
                                                        <option value="any" selected>Any</option>
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                            </div>`
                        }
                }
                else {
                    let name = fields[i].split(' ').join('_').toLowerCase();

                    if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                        if(name == 'beds' || name == 'baths') {
                            template += `<div class="col-6">
                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100">
                            </div>`
                        }
                        else if (name == 'building_type') {
                                    template += `<div class="col-6">
                                                    <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                    <select class="form-select" aria-label="${name}" id="${name}">
                                                        <option value="any" selected>Any</option>
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}">
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
                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                            </div>
                        </div>`
                    }
                }
            }

            $('.first-incoming-field').html(first);
            $('#incoming_fields').html(template);


        }

        

        window.addEventListener('DOMContentLoaded', () => renderFields());
        
                
        
        
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>

@endpush