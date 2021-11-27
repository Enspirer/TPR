@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}"> -->
@endpush

    <div class="container user-settings" style="margin-top:8rem; margin-bottom: 5rem;">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row">
                    <div class="col-12 border">
                        <div class="row px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="col-12">
                                <div class="carousel">
                                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @if($images != NULL)
                                                @foreach($images as $index => $image)
                                                    
                                                    @if($index == 0)
                                                        <div class="carousel-item active">
                                                            <img src="{{url('image_assest', $image)}}" class="d-block w-100" alt="..." style="height: 500px; object-fit:cover;">
                                                        </div>
                                                    @else
                                                        <div class="carousel-item">
                                                            <img src="{{url('image_assest', $image)}}" class="d-block w-100" alt="..." style="height: 500px; object-fit:cover;">
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
                            
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h4 class="mb-0">{{ $single_approval->name }}</h4>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $property_type->property_type_name }}</h5>
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
                                                    <td>{{ $single_approval->city }}, {{ $single_approval->country }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Price</td>
                                                    <td>{{ $single_approval->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Category</td>
                                                    <td>{{ $single_approval->main_category }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Meta Description</td>
                                                    <td>{{ $single_approval->meta_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Slug</td>
                                                    <td>{{ $single_approval->slug }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="col-6 pe-0">
                                        <div id="map" style="height: 300px; width: 100%;"></div>
                                        <input type="hidden" name="lat" id="lat" class="mt-3" value="{{ $single_approval->lat }}">
                                        <input type="hidden" name="lng" id="lng" class="mt-3" value="{{ $single_approval->long }}">
                                        <input type="hidden" name="country" id="country" class="mt-3" value="{{ $single_approval->country }}">
                                    </div>
                                </div>

                                <div class="row mt-5 pe-0 align-items-center">
                                    <div class="col-6">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                @if($single_approval->transaction_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Transaction Type</td>
                                                        <td>{{ $single_approval->transaction_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->zoning_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Zoning Type</td>
                                                        <td>{{ $single_approval->zoning_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->building_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Type</td>
                                                        <td>{{ $single_approval->building_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->building_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Size</td>
                                                        <td>{{ $single_approval->building_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->farm_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Farm Type</td>
                                                        <td>{{ $single_approval->farm_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->beds == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Beds</td>
                                                        <td>{{ $single_approval->beds }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->baths == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Baths</td>
                                                        <td>{{ $single_approval->baths }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->land_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Land Size</td>
                                                        <td>{{ $single_approval->land_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->number_of_units == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Number Of Units</td>
                                                        <td>{{ $single_approval->number_of_units }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->open_house_only == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Open House Only</td>
                                                        <td>{{ $single_approval->open_house_only }}</td>
                                                    </tr>
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-6 pe-0">
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                            @if($agent_details == null)
                                                <div class="text-center mt-2" style="color:grey">
                                                    <h3>Agent details not found</h3>
                                                </div>
                                            @else
                                                <div class="card">                                                    
                                                        <div class="text-center mt-2">
                                                            <img src="{{ url('files/agent_request',$agent_details->photo) }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 7rem; width: 40%; object-fit:cover">
                                                        </div>

                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->name }}</h5>
                                                        <p class="card-text mb-0 text-center">Email : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->email }}</p>
                                                        <p class="card-text mb-0 text-center">Phone : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->telephone }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if($external_parameter != null)
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <h6 style="font-weight: 600;" class="mb-3 ms-2">External Features:</h6>
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
                                    @endif

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h6 style="font-weight: 600;" class="mb-3 ms-2">Description:</h6>
                                            <table class="table table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $single_approval->description}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('frontend.user.single-property-approved') }}" method="POST">
                                {{csrf_field()}}

                                <div class="mt-5 text-center">
                                    <input type="hidden" class="form-control action_value" value="" name="action">
                                    <input type="hidden" class="form-control" value="{{ $single_approval->id }}" name="hid_id">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 approve" style="background-color: #4195E1;">Approve</button>
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 disapprove" style="background-color: #FF2C4B;">Disapprove</button>
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

    }
</script>

<script>
    $('.approve').click(function() {
        $('.action_value').val('Approved');
    })

    $('.disapprove').click(function() {
        $('.action_value').val('Disapproved');
    })
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

@endpush


