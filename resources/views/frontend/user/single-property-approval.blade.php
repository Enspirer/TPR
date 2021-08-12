@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}"> -->
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
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $single_approval->property_type }}</h5>
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
                                                    <td>Colombo, {{ $single_approval->country }}</td>
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
                                    </div>
                                </div>

                                <div class="row mt-5 pe-0 align-items-center">
                                    <div class="col-6">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Transaction Type</td>
                                                    <td>{{ $single_approval->transaction_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Zoning Type</td>
                                                    <td>{{ $single_approval->zoning_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Building Type</td>
                                                    <td>{{ $single_approval->building_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Building Size</td>
                                                    <td>{{ $single_approval->building_size }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Farm Type</td>
                                                    <td>{{ $single_approval->farm_type }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-6 pe-0">
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                                <div class="card">
                                                    <div class="text-center mt-2">
                                                            <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 7rem; width: 40%">
                                                        </div>

                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->name }}</h5>
                                                        <p class="card-text mb-0">Email : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->email }}</p>
                                                        <p class="card-text mb-0">Phone : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->telephone }}</p>
                                                    </div>
                                                </div>
                                            </div>
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
    function initMap() {
  const myLatLng = { lat: 6.932821354043672, lng: 79.84476998314739 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
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


