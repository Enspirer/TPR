@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
<form action="{{route('admin.property.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="carousel">
                                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                        @if($images != NULL)
                                            @foreach($images as $index => $image)
                                                
                                                @if($index == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{url('images', App\Models\FileManager::where('id', $image)->first()->file_name)}}" class="d-block w-100" style="height:370px; object-fit:cover;" alt="...">
                                                    </div>
                                                @else
                                                    <div class="carousel-item">
                                                        <img src="{{url('images', App\Models\FileManager::where('id', $image)->first()->file_name)}}" class="d-block w-100" style="height:370px; object-fit:cover;" alt="...">
                                                    </div>
                                                @endif

                                            @endforeach
                                        @endif
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4 class="mb-0">{{ $property->name}}</h4>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $property_type->property_type_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 pe-0 align-items-center">
                                <div class="col-6">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Location</td>
                                                <td>{{ $property->city}}, {{ $property->country}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Price</td>
                                                <td>{{ $property->price}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Category</td>
                                                <td>{{ $property->main_category}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Meta Description</td>
                                                <td>{{ $property->meta_description}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Slug</td>
                                                <td>{{ $property->slug}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-6 pe-0">
                                    <div id="map" style="height: 300px; width: 100%;"></div>
                                    <input type="hidden" name="lat" id="lat" class="mt-3" value="{{ $property->lat }}">
                                    <input type="hidden" name="lng" id="lng" class="mt-3" value="{{ $property->long }}">
                                    <input type="hidden" name="country" id="country" class="mt-3" value="{{ $property->country }}">
                                </div>
                            </div>

                            <div class="row mt-5 pe-0 align-items-center">
                                <div class="col-6">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                                @if($property->transaction_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Transaction Type</td>
                                                        <td>{{ $property->transaction_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->zoning_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Zoning Type</td>
                                                        <td>{{ $property->zoning_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->building_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Type</td>
                                                        <td>{{ $property->building_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->building_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Size</td>
                                                        <td>{{ $property->building_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->farm_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Farm Type</td>
                                                        <td>{{ $property->farm_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->beds == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Beds</td>
                                                        <td>{{ $property->beds }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->baths == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Baths</td>
                                                        <td>{{ $property->baths }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->land_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Land Size</td>
                                                        <td>{{ $property->land_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->number_of_units == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Number Of Units</td>
                                                        <td>{{ $property->number_of_units }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->open_house_only == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Open House Only</td>
                                                        <td>{{ $property->open_house_only }}</td>
                                                    </tr>
                                                @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-6 pe-0">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="card">
                                                <div class="text-center mt-2">
                                                    <img src="{{ url('files/agent_request',$agent_details->photo) }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 120px; width: 50%; object-fit:cover">
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->name }}</h5>
                                                    <p class="card-text mb-0">Email : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                    <p class="card-text mb-0">Phone : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" >
                            <div class="form-group">
                                <label style="font-weight: 600;" class="ml-2">Description:</label>
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>{{ $property->description}}</td>
                                        </tr>
                                        @if($property->sold_request == 'Sold')
                                            <tr>
                                                <td style="font-weight: 600;">Property Sold Status :</td>
                                                <td>{{ $property->sold_request}}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if($external_parameter != null)
                    <div class="card">
                        <div class="card-body">
                            <div class="" >
                                <div class="form-group">
                                    <label style="font-weight: 600;" class="ml-2">External Features:</label>
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            @foreach($external_parameter as $external)
                                                <tr>
                                                    <td>{{$external->label}} : {{$external->userData[0]}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Admin Approval</label>
                                <select class="form-control" name="admin_approval" required>
                                    <option value="Approved" {{ $property->admin_approval == 'Approved' ? "selected" : "" }}>Approve</option>   
                                    <option value="Disapproved" {{ $property->admin_approval == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                    <option value="Pending" {{ $property->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <!-- <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                                <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="form-group mb-5">
                                <label class="mb-4"><b>Listning History</b></label>
                                    <div class="row mb-4">
                                        <div class="col-2 ml-3">Start Date</div>
                                        <div class="col-2 ml-3">End Date</div>
                                        <div class="col-2 ml-3">Price</div>
                                        <div class="col-2 ml-3">Event</div>
                                        <div class="col-2 ml-3">Listing ID</div>
                                    </div>

                                @if(count($listing_history) == 0)

                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                                                                        
                                            <input type="text" name="start_date[]" onfocus="(this.type='date')" class="form-control m-input" placeholder="Start Date" autocomplete="off" required>
                                            <input type="text" name="end_date[]" onfocus="(this.type='date')" class="form-control m-input" placeholder="End Date" autocomplete="off" required>
                                            <input type="text" name="price[]" class="form-control m-input" placeholder="Price" autocomplete="off" required>
                                            <input type="text" name="event[]" class="form-control m-input" placeholder="Event" autocomplete="off" required>
                                            <input type="text" name="listing_id[]" class="form-control m-input" placeholder="Listing ID" autocomplete="off" required>

                                            <div class="input-group-append">                
                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                
                                @else

                                    <div id="inputFormRow">
                                        @foreach($listing_history as $key => $listing)
                                            <div class="input-group mb-3">
                                                
                                                <input type="text" name="start_date[]" value="{{ $listing->date_start }}" onfocus="(this.type='date')" class="form-control m-input" placeholder="Start Date" autocomplete="off" required>
                                                <input type="text" name="end_date[]" value="{{ $listing->date_end }}" onfocus="(this.type='date')" class="form-control m-input" placeholder="End Date" autocomplete="off" required>
                                                <input type="text" name="price[]" value="{{ $listing->price }}" class="form-control m-input" placeholder="Price" autocomplete="off" required>
                                                <input type="text" name="event[]" value="{{ $listing->event }}" class="form-control m-input" placeholder="Event" autocomplete="off" required>
                                                <input type="text" name="listing_id[]" value="{{ $listing->listing_id }}" class="form-control m-input" placeholder="Listing ID" autocomplete="off" required>

                                                <div class="input-group-append">                
                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>



                                @endif   
                                                            
                            </div> 

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                                <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('after-scripts')

<script>

    let lat = $('#lat').val();  
    let lng = $('#lng').val();

    function initMap() {

        const myLatLng = { lat: parseFloat(lat), lng: parseFloat(lng) };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });

        //   console.log(myLatLng)
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>


    <script type="text/javascript">        
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="date" name="start_date[]" class="form-control m-input" placeholder="Start Date" autocomplete="off" required>';
            html += '<input type="date" name="end_date[]" class="form-control m-input" placeholder="End Date" autocomplete="off" required>';
            html += '<input type="text" name="price[]" class="form-control m-input" placeholder="Price" autocomplete="off" required>';
            html += '<input type="text" name="event[]" class="form-control m-input" placeholder="Event" autocomplete="off" required>';
            html += '<input type="text" name="listing_id[]" class="form-control m-input" placeholder="Listing ID" autocomplete="off" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

    
        $(document).on('click', '#removeRow', function () {
            // $(this).closest('#inputFormRow').remove();
            $(this).parents('.input-group').remove();
        });
    </script>

@endpush
