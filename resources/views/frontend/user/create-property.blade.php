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
                    
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="name" class="form-label mb-0 required">Name</label>
                                            <input type="text" class="form-control" id="name" aria-describedby="name">
                                        </div> 
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="agentType" class="form-label mb-0 required">Property Type</label>
                                            <select class="form-select" aria-label="agentType" id="agentType">
                                                <option selected>Sales</option>
                                                <option value="rentals">Rentals</option>
                                                <option value="commercial">Commercial</option>
                                                <option value="property-land">Property Land</option>
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
                                                <input id="search" class="form-control" type="text" placeholder="Search" />
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="price" class="form-label mb-0 mt-4 required">Price</label>
                                            <input type="text" class="form-control" id="price" aria-describedby="price">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="category" class="form-label mb-0 mt-4 required">Category</label>
                                            <input type="text" class="form-control" id="category" aria-describedby="category">
                                        </div>  
                                    </div>
                                </div>
                            

                                <h4 class="mt-5 mb-1">More About Property</h4>
                                <h6 style="color: #5e6871">Tell us more about the agent</h6>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            @include('frontend.file_manager.file_manager_dialog',['file_caption' => 'Property Images','file_input_name' => 'images','multiple' => true, 'data' =>[31] ])
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="meta-description" class="form-label mb-0 mt-4 required">Meta Description</label>
                                            <input type="text" class="form-control" id="meta-description" aria-describedby="meta-description">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="slug" class="form-label mb-0 mt-4 required">Slug</label>
                                            <input type="text" class="form-control" id="slug" aria-describedby="slug">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="transaction-type" class="form-label mb-0 mt-4 required">Transaction Type</label>
                                            <input type="text" class="form-control" id="transaction-type" aria-describedby="transaction-type">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">Submit</button>
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
                
        
        
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>

@endpush