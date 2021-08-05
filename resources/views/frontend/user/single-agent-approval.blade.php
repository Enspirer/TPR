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
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" class="img-fluid border border-2" alt="...">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h4 class="mb-0">Zajjith Vedha</h4>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #94ca60;">Sri Lanka</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 pe-0">
                                    <div class="col-6">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Agent Type</td>
                                                    <td>Individual</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Company Name</td>
                                                    <td>Enspirer</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Company Reg Number</td>
                                                    <td>007</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Email</td>
                                                    <td>zajjith@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Request</td>
                                                    <td>Lorem, ipsum.</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Description</td>
                                                    <td>You know who am I!</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="col-6 pe-0">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Tax Number</td>
                                                    <td>100</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Validation</td>
                                                    <td>NIC</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Validation No</td>
                                                    <td>964552365V</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Telephone</td>
                                                    <td>0758121616</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Address</td>
                                                    <td>Colombo, Sri Lanka</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script>

@endpush


