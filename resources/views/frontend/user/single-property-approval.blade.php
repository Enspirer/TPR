@extends('frontend.layouts.theme_app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/profile-settings.css') }}">
    <link rel="stylesheet" href="{{ asset('tpr_templete/stylesheets/individual-property.css') }}">
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
                <!-- <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Hilton Hotel</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12 border">
                        <div class="row px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="col-12">
                                <div class="carousel">
                                    <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('tpr_templete/images/individual_property_1.svg') }}" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('tpr_templete/images/individual_property_1.svg') }}" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('tpr_templete/images/individual_property_1.svg') }}" class="d-block w-100" alt="...">
                                            </div>
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
                                            <h4 class="mb-0">Hilton Hotel</h4>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">Restaurant</h5>
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
                                                    <td>Colombo, Sri Lanka</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Price</td>
                                                    <td>200,000,000</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Category</td>
                                                    <td>Lorem, ipsum.</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Meta Description</td>
                                                    <td>All facilities available!</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Slug</td>
                                                    <td>Lorem, ipsum.</td>
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
                                                    <td>Sale</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Zoning Type</td>
                                                    <td>Commercial Retail</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Building Type</td>
                                                    <td>Fourplex</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Building Size</td>
                                                    <td>500 sq</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Farm Type</td>
                                                    <td>Mixed</td>
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
                                                        <h5 class="card-title text-center">Zajjith Vedha</h5>
                                                        <p class="card-text mb-0">Email : zajjith@gmail.com</p>
                                                        <p class="card-text mb-0">Phone : 0758121616</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #4195E1;">Approve</button>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #FF2C4B;">Disapprove</button>
                            </div>
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

//   console.log(myLatLng)
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
type="text/javascript"></script>

@endpush


