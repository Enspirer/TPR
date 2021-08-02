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
                                            <label for="propertyType" class="form-label mb-0 required">Property Type</label>
                                            <select class="form-select" aria-label="agentType" name="propertyType" id="propertyType" onChange="renderFields()">

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
                                            <label for="meta-description" class="form-label mb-0 mt-4 required">Meta Description</label>
                                            <input type="text" class="form-control" name="meta-description" id="meta-description" aria-describedby="meta-description">
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
                                            <label for="transaction-type" class="form-label mb-0 mt-4 required">Transaction Type</label>
                                            <input type="text" class="form-control" name="transaction-type" id="transaction-type" aria-describedby="transaction-type">
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
            let value = $('#propertyType').val();

            let url = 'http://127.0.0.1:8000/api/get_property_type_details/' + value;
            console.log(url);

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
                    first = `<div>
                                <label for="${fields[i]}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                <input type="text" class="form-control" name="protypesvalue[]" id="${fields[i]}" aria-describedby="${fields[i]}">
                            </div>`
                }
                else {
                    template += `<div class="col-6">
                                <div>
                                    <label for="${fields[i]}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                    <input type="text" class="form-control" name="protypesvalue[]" id="${fields[i]}" aria-describedby="${fields[i]}">
                                </div>
                            </div>`
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