@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.country.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Country Name</label>
                            <input type="text" name="country" id="country" class="form-control" value="{{ $country->country_name }}" readonly required>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="map" class="form-label mb-2 mt-4 required">Location</label>
                                <div id="map" style="width: 100%; height: 400px;"></div>
                                <input type="hidden" name="lat" id="lat" class="mt-3" value="{{ $country->latitude }}">
                                <input type="hidden" name="lng" id="lng" class="mt-3" value="{{ $country->longitude }}">

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

                        <div class="form-group mt-4">
                            <label>SLUG</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $country->slug }}" required>
                        </div>

                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" class="form-control" name="currency" value="{{ $country->currency }}" required>
                        </div>
                        <div class="form-group">
                            <label>Currency Rate</label>
                            <input type="text" class="form-control" name="currency_rate" value="{{ $country->currency_rate }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID</label>
                            <input type="text" class="form-control" name="country_id" value="{{ $country->country_id }}" required>
                        </div>


                        <!-- <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <select class="form-select w-100 p-1" aria-label="Default select example" name="country_manager" id="country_manager" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $country->country_manager == $user->id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>  -->

                        
                        <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <br>
                              
                            <datalist class="form-group w-100" name="country_manager" id="country_manager" >
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </datalist>   
                            
                            <input class="form-control w-100" value="{{  App\Models\Auth\User::where('id', $country->country_manager)->first()->email }}" autoComplete="on" name="country_manager" list="country_manager" required/> 

                        </div>



                        <div class="form-group">
                            <label>Features Flag</label>
                            <input type="text" class="form-control" name="features_flag" value="{{ $country->features_flag }}" required>
                        </div>  
                        <!-- <div class="form-group">
                            <label>Features Manager</label>
                            <input type="text" class="form-control" name="features_manager" value="{{ $country->features_manager }}">
                        </div>                       -->
                        
                        <!-- <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="8" required></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" {{ $country->status == '1' ? "selected" : "" }}>Enable</option>   
                                <option value="0" {{ $country->status == '0' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $country->id }}"/>
                <a href="{{route('admin.country.index')}}" class="btn btn-info pull-right ml-4">Back</a>&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            

        </div>

    </form>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap&libraries=places&v=weekly&channel=2"
    type="text/javascript"></script>

    <script>

        var marker = false;

        let lat = $('#lat').val();
        let lng = $('#lng').val();


        // console.log(lat, lng)
                

        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            });

            const geocoder = new google.maps.Geocoder();
            const infowindow = new google.maps.InfoWindow();


            google.maps.event.addDomListener(map, 'click', function(event) {                
                
                var clickedLocation = event.latLng;
                

                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: { lat: parseFloat(lat), lng: parseFloat(lng) },
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

    </script> 


<script>

$("#country").keyup(function(){
    var str = $(this).val();
    var trims = $.trim(str)
    var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $("#slug").val(slug.toLowerCase()) 
})

</script>


<br><br>
@endsection
