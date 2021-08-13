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
                    <div class="col-12 p-0">
                        <div class="row align-items-center">
                            <div class="col-6 ps-4">
                                <h4 class="fs-4 fw-bolder user-settings-head">My Bookings</h4>
                            </div>
                        </div>
                    </div>
                </div>


                @if(count($bookings) == 0)

                    @include('frontend.includes.not_found',[
                    'not_found_title' => 'My Booking item Not Found',
                    'not_found_description' => 'My booking item not found.please book agent for get the property',
                    'not_found_button_caption' => 'Explorer Property',
                    'not_found_link' => 'hellow rod'

                     ])

                @else
                    @foreach($bookings as $booking)
                        <div class="row">
                            <div class="col-12">
                                <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">
                                    <div class="row align-items-center justify-content-between mb-4 border py-3">
                                        <div class="col-4">
                                            <img src="{{url('tpr_templete/images/fp_fm_1.svg')}}" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="card-title">Jaffna, Sri Lanka</h5>
                                            <p class="card-text mt-3 mb-1">4 Bed Semidetached honse</p>
                                            <p class="card-text">Lancaster, claited Kingdom</p>
                                            <p class="mt-1 text-info">$ 480,000</p>

                                            <div class="row justify-content-between">
                                                <div class="col-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-4">
                                                            <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">Open</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                        <!-- <img src="{{ url('tpr_templete/images/users/user-2.png') }}" class="img-fluid border border-2" style="object-fit:cover; width:180px;" alt="..."> -->
                                            <div class="card">
                                                <div class="text-center">
                                                    <img src="{{ asset('tpr_templete/images/users/user-2.png') }}" class="rounded-circle card-img-top border border-2 img-fluid" alt="..." style="height: 7rem; width: 60%">
                                                </div>

                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-center">Zajjith Vedha</h5>
                                                    <p class="card-text mb-0">zajjith@gmail.com</p>
                                                    <p class="card-text mb-0">0758121616</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif







            </div>
        </div>
    </div>
@endsection


@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush
