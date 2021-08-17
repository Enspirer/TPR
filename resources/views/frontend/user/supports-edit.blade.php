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
                                    @if($user_details->photo == null)
                                    <div class="col-4">
                                        <img src="{{ url('images/no_image_available.png') }}" alt="" class="img-fluid rounded-circle" style="object-fit:cover; height:60px" width="100%">
                                    </div>
                                    @else
                                    <div class="col-4">
                                        <img src="{{ url('files/agent_request',$user_details->photo) }}" alt="" class="img-fluid rounded-circle" style="object-fit:cover; height:60px" width="100%">
                                    </div>
                                    @endif
                                    

                                    <div class="col-8">
                                        <h6 class="mb-0">{{ $supports->name }}</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 text-end">
                                <p class="mb-0">{{ $supports->created_at->toDateString() }}</p>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-11">
                                <div class="row align-items-center justify-content-between p-2 border rounded">
                                    <p>{{ $supports->message }}</p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('frontend.user.supports.update') }}" method="POST">
                        {{csrf_field()}}

                            <div class="mt-5 text-center mb-5">
                                <input type="hidden" class="form-control action_value" value="" name="action">
                                <input type="hidden" class="form-control" value="{{ $supports->id }}" name="hid_id">
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success Solved">Solved</button>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-danger Not_Solved">Not Solved</button>
                            </div>
                        </form>

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
    $('.Solved').click(function() {
    $('.action_value').val('Solved');
    })

    $('.Not_Solved').click(function() {
    $('.action_value').val('Not Solved');
    })
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArF7tuecnSc3AvTh5V_mabinQqE6TuiYM&callback=initMap"
type="text/javascript"></script>

@endpush


