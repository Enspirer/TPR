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
                        <div class="row px-2 py-3 align-items-center justify-content-between" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <div class="col-4">
                                <a class="row align-items-center mb-2 text-decoration-none text-dark">
                                    <div class="col-4">
                                        <img src="{{ asset('tpr_templete/images/users/user-1.png') }}" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-8">
                                        <h6 class="mb-0">Emma Newman</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 text-end">
                                <p class="mb-0">2021-08-02</p>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-11">
                                <div class="row align-items-center justify-content-between p-2 border rounded">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates, ut! Doloribus sapiente nam quod hic id quae fuga corporis aut veniam minima ducimus vel, sed autem? Voluptatem dignissimos, vel laudantium aperiam a maiores corrupti nihil distinctio illo dolorem veniam quidem itaque. Accusamus explicabo quo eum doloremque officia atque nulla, eos in saepe voluptates iure quasi voluptas est incidunt cupiditate nisi sint perspiciatis ipsum, doloribus totam iusto soluta distinctio? Voluptates nihil placeat, aperiam cumque corporis dolores obcaecati eveniet nisi ea inventore, assumenda omnis alias, vero modi ullam velit doloribus sit cupiditate. Sed omnis ullam, corporis eius eveniet officia laboriosam numquam. Architecto.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center mb-5">
                            <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #4195E1;">Approve</button>
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #FF2C4B;">Disapprove</button>
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


