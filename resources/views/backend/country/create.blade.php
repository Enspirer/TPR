@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')



    <form action="{{route('admin.country.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Country Name</label>
                            <input type="text" id="country" class="form-control" name="country" readonly required>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="map" class="form-label mb-2 mt-3 required">Select a Country</label>
                                <div id="map" style="width: 100%; height: 400px;"></div>
                                <input type="hidden" name="lat" id="lat" class="mt-3" required>
                                <input type="hidden" name="lng" id="lng" class="mt-3" required>
                                <!-- <input type="hidden" name="country" id="country" class="mt-3" required> -->

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
                            <input type="text" id="slug" class="form-control" name="slug" required>
                        </div>

                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" class="form-control" name="currency" required>
                        </div>
                        <div class="form-group">
                            <label>Currency Rate</label>
                            <input type="number" class="form-control" name="currency_rate" step="any" required>
                        </div>
                        <div class="form-group">
                            <label>Country ID</label>
                            <input type="text" class="form-control" name="country_id" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="country_manager" class="form-label">Country Manager</label>
                            <select class="selectpicker form-select w-100" data-show-subtext="true" data-live-search="true" name="country_manager" id="country_manager" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
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
                            
                            <input class="form-control w-100" autoComplete="on" name="country_manager" list="country_manager" required/> 

                        </div>

                        <!-- <div>
                            <datalist id="suggestions">
                                <option>First option</option>
                                <option>Second Option</option>
                            </datalist>
                            <input  autoComplete="on" list="suggestions"/> 
                        </div> -->
                                                                        
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1">Enable</option>   
                                <option value="0">Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div><br>  
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Opening Hours</label>
                                <input type="text" class="form-control" name="opening_hours" required>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phone Numbers</label>

                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                            
                                            <input type="number" name="phone_numbers[]" class="form-control m-input" autocomplete="off" required>
                                            
                                            <div class="input-group-append">                
                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>

                                                            
                            </div> 

                            
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create New</button>
                </div>
            </div>

            
            
        </div>

    </form>

    

    <!-- <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script> -->

    <script type="text/javascript">
        
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="number" name="phone_numbers[]" class="form-control m-input" autocomplete="off" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

    
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>



    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap&libraries=places&v=weekly&channel=2"
    type="text/javascript"></script>

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

    </script>          


<script>

    $("#country").keyup(function(){
        var str = $(this).val();
        var trims = $.trim(str)
        var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
        $("#slug").val(slug.toLowerCase()) 
    });    

</script>


<br><br>
@endsection
